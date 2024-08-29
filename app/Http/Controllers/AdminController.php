<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\Iuran;
use App\Models\Murid;
use App\Models\Pertanyaan;
use App\Models\RuangKelas;
use App\Models\DetailKelas;
use App\Models\JadwalKelas;
use App\Models\UploadModul;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\TahunAngkatan;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function login()
    {
        return view('login');
    }

    function postlogin()
    {
        $data = request()->only(['email', 'password']);
        $valid = validator::make(
            $data,
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email harus diisi',
                'password.required' => 'Password harus diisi',
            ],
        );
        if ($valid->fails()) {
            $errors = $valid->errors()->all();
            return response()->json(['success' => false, 'message' => implode(', ', $errors)]);
        }
        $user = User::where('email', $data['email'])->first();
        if ($user && $user->password == $data['password']) {
            return redirect()->route('home');
        }
        return back()->with('error', 'Email atau Password salah');
    }
    function jadwalKelas()
    {
        $matapelajaran = MataPelajaran::all(['id', 'nama'])
            ->sortBy('nama')
            ->toArray();
        $guru = Guru::all(['id', 'nama'])
            ->sortBy('nama')
            ->toArray();
        $ruangkelas = RuangKelas::orderBy('nama')
            ->get(['id', 'nama'])
            ->toArray();
        $angkatan = TahunAngkatan::all(['id', 'tahun_angkatan'])
            ->sortBy('tahun_angkatan')
            ->toArray();
        $jadwal = JadwalKelas::with(['mataPelajaran', 'guru', 'ruangkelas'])->get();
        $datajadwal = [];
        foreach ($jadwal as $j) {
            $datajadwal[] = [
                'id' => $j->id,
                'hari' => $j->hari,
                'jam_mulai' => Carbon::parse($j->jam_mulai)->format('H:i A'),
                'pelajaran' => $j->mataPelajaran->nama,
                'guru' => $j->guru->nama,
                'ruangkelas' => $j->ruangkelas->nama,
                'angkatan' => $j->angkatan->tahun_angkatan,
            ];
        }

        $data = [
            'title' => 'Jadwal Kelas',
            'matapelajaran' => $matapelajaran,
            'guru' => $guru,
            'ruangkelas' => $ruangkelas,
            'angkatan' => $angkatan,
        ];

        $data['datajson'] = $datajadwal;
        return view('JadwalKelas', $data);
    }
    function home()
    {
        return view('welcome');
    }
    function store(Request $request)
    {
        $data = $request->only(['hari', 'id_pelajaran', 'id_ruangkelas', 'id_guru', 'jam_mulai', 'id_angkatan']);
        $valid = validator::make(
            $data,
            [
                'hari' => 'required',
                'id_pelajaran' => 'required | exists:mata_pelajarans,id',
                'id_ruangkelas' => 'required | exists:ruang_kelas,id',
                'id_guru' => 'required | exists:gurus,id',
                'jam_mulai' => 'nullable',
                'id_angkatan' => 'required | exists:tahun_angkatans,id',
            ],
            [
                'hari.required' => 'Hari harus diisi',
                'id_pelajaran.required' => 'Mata Pelajaran harus diisi',
                'id_guru.required' => 'Guru harus diisi',
                'id_guru.exists' => 'Guru tidak valid',
                'id_pelajaran.exists' => 'Mata Pelajaran tidak valid',
                'id_ruangkelas.required' => 'Ruang Kelas harus diisi',
                'id_ruangkelas.exists' => 'Ruang Kelas tidak valid',
                'id_angkatan.required' => 'Angkatan harus diisi',
            ],
        );
        if ($valid->fails()) {
            $errors = $valid->errors()->all();
            return response()->json(['success' => false, 'message' => implode(', ', $errors)]);
        }
        // BR2: Ruangan tidak boleh digunakan untuk dua kelas yang berbeda pada waktu yang sama
        $roomConflict = JadwalKelas::where('hari', $data['hari'])
            ->where('id_ruangkelas', $data['id_ruangkelas'])
            ->where('jam_mulai', $data['jam_mulai'])
            ->exists();
        if ($roomConflict) {
            return response()->json(['success' => false, 'message' => 'Ruangan sudah terisi pada waktu tersebut']);
        }
        // BR3: Guru tidak boleh mengajar dua kelas yang berbeda pada waktu yang sama
        $teacherConflict = JadwalKelas::where('hari', $data['hari'])
            ->where('id_guru', $data['id_guru'])
            ->where('jam_mulai', $data['jam_mulai'])
            ->exists();
        if ($teacherConflict) {
            return response()->json(['success' => false, 'message' => 'Guru sudah mengajar kelas lain pada waktu tersebut']);
        }
        $s = JadwalKelas::create($data);
        return response()->json(['success' => true, 'message' => 'Data has been saved', 'data' => $s]);
    }
    public function delete($id)
    {
        $jadwal = JadwalKelas::find($id);
        if ($jadwal) {
            $s = $jadwal->delete();
            return response()->json(['success' => true, 'message' => 'Data has been deleted', 'data' => $s]);
        }
    }
    public function detail($id)
    {
        $data = JadwalKelas::with(['mataPelajaran', 'guru', 'ruangkelas', 'angkatan'])->find($id);
        $matapelajaran = MataPelajaran::all(['id', 'nama'])
            ->sortBy('nama')
            ->toArray();
        $guru = Guru::all(['id', 'nama'])
            ->sortBy('nama')
            ->toArray();
        $ruangkelas = RuangKelas::orderBy('nama')
            ->get(['id', 'nama'])
            ->toArray();
        $angkatan = TahunAngkatan::all(['id', 'tahun_angkatan'])
            ->sortBy('tahun_angkatan')
            ->toArray();
        $detail_kelas = DetailKelas::where('kelas_id', $data->id)->get();
        $registeredStudentIds = DetailKelas::whereIn('kelas_id', function ($query) use ($data) {
            $query
                ->select('id')
                ->from('jadwal_kelas')
                ->where('id_pelajaran', $data->id_pelajaran);
        })
            ->pluck('murid_id')
            ->toArray();

        $unregisteredStudents = Murid::with('tahunAngkatan')
            ->whereNotIn('id', $registeredStudentIds)
            ->where('id_angkatan', $data->id_angkatan)
            ->where('status', 1)
            ->get();
        return view('DetailKelas', [
            'event' => $data,
            'title' => 'Event Detail',
            'matapelajaran' => $matapelajaran,
            'guru' => $guru,
            'ruangkelas' => $ruangkelas,
            'angkatan' => $angkatan,
            'murid' => $unregisteredStudents,
            'detail_kelas' => $detail_kelas,
        ]);
    }
    public function update($id)
    {
        $data = request()->only(['hari', 'id_pelajaran', 'id_ruangkelas', 'id_guru', 'jam_mulai', 'id_angkatan']);
        $valid = validator::make(
            $data,
            [
                'hari' => 'required',
                'id_pelajaran' => 'required | exists:mata_pelajarans,id',
                'id_ruangkelas' => 'required | exists:ruang_kelas,id',
                'id_guru' => 'required | exists:gurus,id',
                'jam_mulai' => 'nullable',
                'id_angkatan' => 'required | exists:tahun_angkatans,id',
            ],
            [
                'hari.required' => 'Hari harus diisi',
                'id_pelajaran.required' => 'Mata Pelajaran harus diisi',
                'id_guru.required' => 'Guru harus diisi',
                'id_guru.exists' => 'Guru tidak valid',
                'id_pelajaran.exists' => 'Mata Pelajaran tidak valid',
                'id_ruangkelas.required' => 'Ruang Kelas harus diisi',
                'id_ruangkelas.exists' => 'Ruang Kelas tidak valid',
                'id_angkatan.required' => 'Angkatan harus diisi',
            ],
        );
        if ($valid->fails()) {
            $errors = $valid->errors()->all();
            return response()->json(['success' => false, 'message' => implode(', ', $errors)]);
        }
        $s = JadwalKelas::find($id);
        $s->update($data);
        return response()->json(['success' => true, 'message' => 'Data has been updated', 'data' => $s]);
    }

    public function postmurid(Request $request, $id)
    {
        foreach ($request->user_id as $murid_id) {
            DetailKelas::create([
                'kelas_id' => $id,
                'murid_id' => $murid_id,
            ]);
        }
        return back()->with('success', 'Berhasil menambahkan murid ke kelas!');
    }

    public function deletemurid($id)
    {
        $detail_kelas = DetailKelas::find($id);
        $detail_kelas->delete();
        return back()->with('success', 'Berhasil menghapus murid dari kelas');
    }

    public function upload()
    {
        $matapelajaran = MataPelajaran::all(['id', 'nama'])
            ->sortBy('nama')
            ->toArray();
        $angkatan = TahunAngkatan::all(['id', 'tahun_angkatan'])
            ->sortBy('tahun_angkatan')
            ->toArray();

        $upload = UploadModul::with(['pelajaran', 'kelas'])->get();
        $data = [
            'title' => 'Upload Latihan Soal',
            'matapelajaran' => $matapelajaran,
            'angkatan' => $angkatan,
            'upload' => $upload,
        ];
        return view('UploadLatihanSoal', $data);
    }

    public function uploadPost()
    {
        $data = request()->only(['id_pelajaran', 'id_angkatan', 'materipelajaran', 'file']);
        $valid = Validator::make(
            $data,
            [
                'id_pelajaran' => 'required|exists:mata_pelajarans,id',
                'id_angkatan' => 'required|exists:tahun_angkatans,id',
                'materipelajaran' => 'required',
                'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            ],
            [
                'id_pelajaran.required' => 'Mata Pelajaran harus diisi',
                'id_angkatan.required' => 'Kelas harus diisi',
                'materipelajaran.required' => 'Materi Pelajaran harus diisi',
                'file.required' => 'File harus diisi',
            ],
        );

        if ($valid->fails()) {
            $errors = $valid->errors()->all();
            return response()->json(['success' => false, 'message' => implode(', ', $errors)]);
        }

        $file = $data['file'];
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $originalName . '.' . $extension;
        $filePath = $file->storeAs('MateriPelajaranFiles', $fileNameToStore, 'public');
        $data['file'] = $filePath;

        $s = UploadModul::create($data);
        return response()->json(['success' => true, 'message' => 'Data has been saved', 'data' => $s]);
    }
    public function deleteModul($id)
    {
        $upload = UploadModul::find($id);
        if ($upload) {
            $s = $upload->delete();
            return redirect()->route('upload')->with('success', 'Data has been deleted');
        }
    }

    public function pertanyaan()
    {
        $pertanyaan = Pertanyaan::with('murid')->get();
        $data = [
            'title' => 'Pertanyaan',
            'pertanyaan' => $pertanyaan,
        ];
        return view('pertanyaan', $data);
    }

    public function detailpertanyaan($id)
    {
        $pertanyaan = Pertanyaan::with('murid')->find($id);
        $data = [
            'title' => 'Detail Pertanyaan',
            'pertanyaan' => $pertanyaan,
        ];
        return view('detailpertanyaan', $data);
    }

    public function jawaban($id)
    {
        $file = request()->file('jawaban');
        $data = ['jawaban' => $file];
        $valid = Validator::make(
            $data,
            [
                'jawaban' => 'required|file|mimes:pdf,doc,docx|max:10240',
            ],
            [
                'jawaban.required' => 'Jawaban harus diisi',
                'jawaban.file' => 'Jawaban harus berupa file',
                'jawaban.mimes' => 'Jawaban harus berupa file pdf, doc, docx',
            ],
        );
        if ($valid->fails()) {
            $errors = $valid->errors()->all();
            return response()->json(['success' => false, 'message' => implode(', ', $errors)]);
        }
        $file = $data['jawaban'];
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $originalName . '.' . $extension;
        $filePath = $file->storeAs('Jawaban', $fileNameToStore, 'public');
        $data['jawaban'] = $filePath;
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->update($data);
        return redirect()->route('pertanyaan')->with('success', 'Jawaban berhasil diupload');
    }

    public function iuran()
    {
        $iuran = Iuran::with('murid')->where('status', 0)->get();
        $iuran->each(function ($item) {
            $item->tanggal = Carbon::parse($item->tanggal)->format('M Y');
        });
        $data = [
            'murid' => $iuran,
        ];
        return view('iuran', $data);
    }

    public function postIuran(Request $request)
{
    $userIds = $request->input('user_id');
        foreach ($userIds as $id) {
            $iuran = Iuran::find($id);
            if ($iuran) {
                $iuran->status = 1; 
                $iuran->save();
            }
        }
    

    return redirect()->back()->with('success', 'Selected iuran status updated successfully.');
}

}
