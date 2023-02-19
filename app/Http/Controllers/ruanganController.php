<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;


class ruanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getSpesifik($id)
    {
        return collect(
            DB::select('
            SELECT ruangan.*
            FROM ruangan
            WHERE ruangan.id_ruangan = ?', [$id])
        )->firstOrFail();
    }


    public function index(Request $request, $id = null)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = Ruangan::where('id_ruangan', 'like', "%katakunci%")
                ->paginate(5);
        } else {
            $data = Ruangan::orderBy('id_ruangan', 'desc')->paginate(5);
        };

        return view('ruangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruangan = DB::table('ruangan')->get();

        return view('ruangan.create', compact('ruangan'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FacadesSession::flash('nama_ruangan', $request->nama_ruangan);

        $request->validate([
            'nama_ruangan' => 'required',
            'foto_ruangan' => 'required|mimes:jpeg,png,jpg'
        ], [
            'nama_ruangan.required' => 'nama_ruangan wajib diisi',
            'foto_ruangan.required' => 'foto_ruangan wajib diisi',
            'foto_ruangan.mimes' => 'foto_ruanngan hanya boleh jpeg,png,jpg ',
        ]);

        $image = $request->file('foto_ruangan')->store('ruangan');


        $Array = DB::select('SELECT new_id_ruangan() AS id_ruangan');
        $kode_baru = $Array[0]->id_ruangan;

        Ruangan::insert([
            'id_ruangan' => $kode_baru,
            'nama_ruangan' => $request->nama_ruangan,
            'foto_ruangan' => $image
        ]);
        return redirect()->to('ruangan')->with('success', 'berhasil tambah data');
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
        $data = ruangan::where('id_ruangan', $id)->first();
        return view('ruangan.edit')->with('data', $data);
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
        $request->validate([
            'nama_ruangan' => 'required',
            'foto_ruangan' => 'required',
        ], [
            'nama_ruangan.required' => 'nama_ruangan wajib diisi',
            'foto_ruangan.required' => 'foto_ruangan wajib diisi',
        ]);

        $data = [
            'nama_ruangan' => $request->nama_ruangan,
            'foto_ruangan' => $request->foto_ruangan,
        ];
        ruangan::where('id_ruangan', $id)->update($data);
        return redirect()->to('ruangan')->with('success', 'berhasil update data');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ruangan::where('id_ruangan', $id)->delete();
        return redirect()->to('ruangan')->with('success', 'berhasil hapus data');
    }
}
