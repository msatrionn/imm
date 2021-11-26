<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pemilihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pilih = DB::table('pemilihan')
            ->select('nama_calon', 'asal_delegasi', 'foto', DB::raw('count(*) as total'))
            ->groupBy('nama_calon', 'asal_delegasi', 'foto')
            ->join('calon', 'calon.id_calon', 'pemilihan.calon_id')
            ->get();
        $pilih_table = DB::table('pemilihan')
            ->select('nama_calon', 'asal_delegasi', 'foto', DB::raw('count(*) as total'))
            ->groupBy('nama_calon', 'asal_delegasi', 'foto')
            ->join('calon', 'calon.id_calon', 'pemilihan.calon_id')
            ->paginate(10);
        $calon = Calon::count('id_calon');
        $user = User::where('level', 'biasa')->count('id');
        $belum = User::where('pilihan', 'belum')->count('pilihan');
        $sudah = User::where('pilihan', 'sudah')->count('pilihan');
        return view('admin.index', compact('calon', 'belum', 'sudah', 'user', 'pilih'));
    }
    public function chart()
    {
        $pilih = DB::table('pemilihan')
            ->select('nama_calon', 'asal_delegasi', 'foto', DB::raw('count(*) as total'))
            ->groupBy('nama_calon', 'asal_delegasi', 'foto')
            ->join('calon', 'calon.id_calon', 'pemilihan.calon_id')
            ->get();
        $pilih_table = DB::table('pemilihan')
            ->select('nama_calon', 'asal_delegasi', 'foto', DB::raw('count(*) as total'))
            ->groupBy('nama_calon', 'asal_delegasi', 'foto')
            ->join('calon', 'calon.id_calon', 'pemilihan.calon_id')
            ->paginate(10);
        $calon = Calon::count('id_calon');
        $user = User::where('level', 'biasa')->count('id');
        return view('admin.chart', compact('calon', 'user', 'pilih'));
    }

    public function home()
    {
        if (auth()->user()->level == 'admin') {
            $calon = Pemilihan::join('calon', 'calon.id_calon', 'pemilihan.calon_id')->get();
        } else
            $calon = Pemilihan::join('calon', 'calon.id_calon', 'pemilihan.calon_id')
                ->where('pemilihan.user_id', auth()->user()->id)
                ->get();
        return view('client.index', compact('calon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->level == 'admin') {
            return redirect('home');
        }
        $user = User::where('id', auth()->user()->id)
            ->where('pilihan', 'belum')->get();
        if (count($user) == null) {
            return redirect('home');
        } else
            $calon = Calon::all();
        return view('client.pilih', compact('calon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $jml_calon = count($request->calon_id);
        $user = auth()->user()->id;
        for ($i = 0; $i < $jml_calon; $i++) {

            $data = [
                'calon_id' => $request->calon_id[$i],
                'user_id' => $user,
            ];
            Pemilihan::insert($data);
        }
        $users = User::where('id', $user);
        $users->update([
            'pilihan' => 'sudah'
        ]);
        return redirect('home');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
