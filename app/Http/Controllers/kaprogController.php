<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Kaprog;

use Illuminate\Http\Request;

class kaprogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $user = DB::table('kaprog')
            ->join('user', 'kaprog.id_user', '=', 'user.id_user')
            ->select('kaprog.*', 'user.*')
            ->paginate(6);
        return view('kaprog.index', compact('user'))->with('kaprog');
        // dd($role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('user')->get();

        return view('kaprog.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'nama_kaprog' => 'required',
            'foto' => 'required'
        ], [
            'id_user.required' => 'user wajib diplih',
            'nama_kaprog.required' => 'nama_kaprog wajib diisi',
            'foto.required' => 'foto wajib diisi'
        ]);

        $Array = DB::select('SELECT new_id_kaprog() AS id_kaprog');
        $kode_baru = $Array[0]->id_kaprog;
        Kaprog::insert([
            'id_kaprog' => $kode_baru,
            'id_user' => $request->id_user,
            'nama_kaprog' => $request->nama_kaprog,
            'foto' => $request->foto
        ]);

        return redirect()->to('kaprog')->with('success', 'berhasil tambah data');
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
        Kaprog::where('id_kaprog', $id)->delete();

        return back();
    }
}
