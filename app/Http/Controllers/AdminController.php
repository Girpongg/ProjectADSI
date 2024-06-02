<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\RuangKelas;
use App\Models\JadwalKelas;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
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
            ];
        }
        $data = [
            'title' => 'Jadwal Kelas',
            'matapelajaran' => $matapelajaran,
            'guru' => $guru,
            'ruangkelas' => $ruangkelas,
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
        $data = $request->only(['hari', 'id_pelajaran', 'id_ruangkelas', 'id_guru', 'jam_mulai']);
        $valid = validator::make(
            $data,
            [
                'hari' => 'required',
                'id_pelajaran' => 'required | exists:mata_pelajarans,id',
                'id_ruangkelas' => 'required | exists:ruang_kelas,id',
                'id_guru' => 'required | exists:gurus,id',
                'jam_mulai' => 'nullable',
            ],
            [
                'hari.required' => 'Hari harus diisi',
                'id_pelajaran.required' => 'Mata Pelajaran harus diisi',
                'id_guru.required' => 'Guru harus diisi',
                'id_guru.exists' => 'Guru tidak valid',
                'id_pelajaran.exists' => 'Mata Pelajaran tidak valid',
                'id_ruangkelas.required' => 'Ruang Kelas harus diisi',
                'id_ruangkelas.exists' => 'Ruang Kelas tidak valid',
            ],
        );
        // BR1: Guru tidak boleh mengajar lebih dari 1 kelas pada hari yang sama
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
            $jadwal->delete();
            return redirect()->route('JadwalKelas')->with('success', 'Jadwal berhasil dihapus');
        } else {
            return redirect()->route('JadwalKelas')->with('error', 'Jadwal tidak ditemukan');
        }
    }
    public function detail($id)
    {
        $jadwal = JadwalKelas::find($id);
        if ($jadwal) {
            $data = [
                'title' => 'Detail Jadwal',
                'jadwal' => $jadwal,
            ];
            return view('detail', $data);
        } else {
            return redirect()->route('JadwalKelas')->with('error', 'Jadwal tidak ditemukan');
        }
    }
}
