<?php

namespace App\Http\Controllers\soal;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ini cek ada filter mapel nda
        if(request() -> has('mapel')){
            $mapel = request()->mapel;
            if($mapel == '0'){
                $mapels = MataPelajaran::get();
                $soals = Pertanyaan::get();
                return response()->json($soals);
            }
            $soals = Pertanyaan::where('idmapel', $mapel)->get();
            return response()->json($soals);
        }

        // ini nda ada filter
        $mapels = DB::table('mata_pelajarans')->get();
        $soals = Pertanyaan::get();
        return view('soal.index', [
            'soals' => $soals,
            'mapels' => $mapels
        ]);
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'id' => 'required',
            'jawaban' => 'required|mimes:pdf|max:10000'
        ]);
        
        $file = $request->jawaban;
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $originalName . '.' . $extension;
        $filePath = $file->storeAs('JawabanFiles', $fileNameToStore, 'public');

        $updatedjawaban = Pertanyaan::find($request->id);
        $updatedjawaban->jawaban = $filePath;
        $updatedjawaban->save();
        return redirect()->route('soal.index')->with( ['message' => 'Data has been saved!'] );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function edit2(string $id)
    {
        $soalnya = Pertanyaan::find($id);
        return view('soal.uploadjawaban', [
            'pertanyaan' => $soalnya,
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
