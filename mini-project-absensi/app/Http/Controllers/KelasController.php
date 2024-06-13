<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = Kelas::All();
        return view('admin.data-kelas', compact('kelass'));
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
        $kelass = Kelas::All();
        $validated = $request->validate([
            'nama_kelas' => ['required', 'string']
        ]);
        $asisten = new Kelas();
        $asisten -> nama_kelas = $validated['nama_kelas'];
        $asisten -> save();

        return view('admin.data-kelas', ['kelass' => $kelass]);//tambah
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
        $kelass = Kelas::All();
        $asisten = Kelas::findOrFail($id);
        $validated = $request->validate([
            'nama_kelas' => ['required', 'string']
        ]);
        $asisten -> nama_kelas = $validated['nama_kelas'];
        $asisten -> save();
        return view('admin.data-kelas', ['kelass' => $kelass]);//tambah
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Kelas::findOrFail($id);
        $materi->delete();
        return redirect()->back();
    }
}
