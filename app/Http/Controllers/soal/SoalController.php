<?php

namespace App\Http\Controllers\soal;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

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
            $soals = Pertanyaan::where('idmapel', $mapel)->get();
            return response()->json($soals);
        }
        $soals = $soals = Pertanyaan::get();
        return view('soal.index', [
            'soals' => $soals
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id, request()->all());
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
