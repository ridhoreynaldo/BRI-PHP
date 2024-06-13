<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class MateriController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materis = Materi::All();
        return view('admin.data-materi', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materis = Materi::All();
        $validated = $request->validate([
            'nama_materi' => ['required', 'string']
        ]);
        $asisten = new Materi();
        $asisten -> nama_materi = $validated['nama_materi'];
        $asisten -> save();

        return view('admin.data-materi', ['materis' => $materis]);//tambah
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materis = Materi::All();
        $asisten = Materi::findOrFail($id);
        $validated = $request->validate([
            'nama_materi' => ['required', 'string']
        ]);
        $asisten -> nama_materi = $validated['nama_materi'];
        $asisten -> save();
        return view('admin.data-materi', ['materis' => $materis]);//tambah

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return redirect()->back();
    }
}
