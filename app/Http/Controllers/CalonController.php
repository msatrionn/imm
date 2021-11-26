<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pemilihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Prophecy\Call\Call;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calon = Calon::all();
        return view('admin.calon.index', compact('calon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/calon/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ambil = count($request->nama);
        for ($i = 0; $i < $ambil; $i++) {
            $file = $request->file('foto')[$i];
            $nama_file = 'foto_' . Str::random(20) . '.jpg';
            $file->move('img', $nama_file);
            Calon::insert([
                'nama_calon' => $request->nama[$i],
                'asal_delegasi' => $request->nomor[$i],
                'foto' => $nama_file,
            ]);
        }
        return redirect('calon');
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
        $calon = Calon::where('id_calon', $id)->first();
        return view('admin/calon/edit', compact('calon'));
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
        $calon = Calon::where('id_calon', $id);
        $nama_file = 'foto_' . Str::random(20) . '.jpg';
        if ($request->foto == null) {
            $calon->update([
                'nama_calon' => $request->nama,
                'asal_delegasi' => $request->nomor,
            ]);
        } else {
            $calons = Calon::where('id_calon', $id)->first();
            File::delete('img/' . $calons->foto);
            $request->file('foto')->move('img', $nama_file);
            $calon->update([
                'nama_calon' => $request->nama,
                'asal_delegasi' => $request->nomor,
                'foto' => $nama_file,
            ]);
        }
        return redirect('calon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemilihan = Pemilihan::join('calon', 'calon.id_calon', 'pemilihan.calon_id')->where('id_calon', $id);
        $calon = Calon::where('id_calon', $id);
        $calons = Calon::where('id_calon', $id)->first();
        File::delete('img/' . $calons->foto);
        $pemilihan->delete();
        $calon->delete();
        return back();
    }
}
