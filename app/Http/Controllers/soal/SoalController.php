<?php

namespace App\Http\Controllers\soal;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index2($id)
    {
        //
        // dd("tes soal");
        // dd($id,request()->all());
        // $soals = Soal::
        // where('user_id', request()->user->id)
        // ->get();

        // return view('soal.index', [
        //     'soals' => $soals
        // ]);
    }
    public function index()
    {
        // dd(request()->all());
        // $soals = Pertanyaan::where(true);
        // join('jawaban', 'soal.id', '=', 'jawaban.soal_id')
        // ->where('user_id', auth()->user()->id);
        if(request() -> has('mapel')){
            // dd(request()->all());
            $mapel = request()->mapel;
            if($mapel == '0'){
                $mapels = DB::table('mata_pelajarans')->get();
                $soals = $soals = Pertanyaan::get();
                return response()->json($soals);
            }
            $soals = Pertanyaan::where('idmapel', $mapel)->get();
            return response()->json($soals);
        }

        $mapels = DB::table('mata_pelajarans')->get();
        $soals = $soals = Pertanyaan::get();
        return view('soal.index', [
            'soals' => $soals,
            'mapels' => $mapels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'id' => 'required',
            'jawaban' => 'required|mimes:pdf|max:10000'
        ]);

        // $file = $request->file('file');
        // $filename = time() . '.' . $file->getClientOriginalExtension();
        // $file->move('uploads', $filename);
        
        $file = $request->jawaban;
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $originalName . '.' . $extension;
        $filePath = $file->storeAs('JawabanFiles', $fileNameToStore, 'public');
        // $request->jawaban = $filePath;

        $updatedjawaban = Pertanyaan::find($request->id);
        $updatedjawaban->jawaban = $filePath;
        $updatedjawaban->save();
        // return response()->json(['success' => true, 'message' => 'Data has been saved', 'data' => $updatedjawaban]);
        return redirect()->route('soal.index')->with( ['message' => 'Data has been saved!'] );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id, request()->all());
        $soals = Pertanyaan::
        join('jawaban', 'soal.id', '=', 'jawaban.soal_id')
        ->where('user_id', auth()->user()->id)
        ->get();
        return view('soal.index', [
            'soals' => $soals
        ]);
        //
        // dd($id,request()->all());
        // $soals = Soal::
        // where('user_id', request()->user->id)
        // ->get();
        // return view('soal.index', [
        //     'soals' => $soals
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // dd($id, request()->all());
        return view('soal.index');
    }
    public function edit2(string $id)
    {
        //
        // dd($id, request()->all());
        $soalnya = Pertanyaan::find($id);
        return view('soal.uploadjawaban', [
            'pertanyaan' => $soalnya,
            'id' => $id
        ]);
        return view('soal.uploadjawaban');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        dd($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
