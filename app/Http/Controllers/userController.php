<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Exception;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = DB::table('user')
            ->join('role', 'user.id_role', '=', 'role.id_role')
            ->select('user.*', 'role.*')
            ->paginate(6);
        // dd($role);
        return view('user.index', compact('role'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $role = DB::table('user')
            ->Where('username', 'like', "%" . $search . "%")
            ->paginate(6);
        return view('user.index', compact('role'));
    }
    // public function search(Request $request)
    // {
    // $katakunci = $request->katakunci;
    // $jumlahbaris = 4;
    // if(strlen($katakunci)){
    //     $search = User::where('nama_role','like',"%katakunci%")
    //     ->orwhere('username','like',"%katakunci%")
    //     ->orWhere('email','like',"%katakunci%")
    //     ->orWhere('password','like',"%katakunci%")
    //     ->paginate($jumlahbaris);
    // } else {
    //     $search= User::orderBy('id_role', 'desc')->paginate($jumlahbaris);
    // };
    // return view('mahasiswa.index')->with('data1', $search);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = DB::table('role')->get();

        return view('user.create', compact('role'));
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
            'id_role' => 'required',
            'username' => 'required|unique:user,username',
            'email' => 'required',
            'password' => 'required|min:5',
        ], [
            'id_role.required' => 'role wajib diplih',
            'username.required' => 'username wajib diisi',
            'username.unique' => 'username sudah ada',
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 5 karakter',
        ]);
        $Array = DB::select('SELECT new_id_user() AS id_user');
        $kode_baru = $Array[0]->id_user;
        User::insert([
            'id_user' => $kode_baru,
            'id_role' => $request->id_role,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password

            // 'password' => Hash::make($request->password)
        ]);

        return redirect()->to('user')->with('success', 'berhasil tambah data');
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

    public function edit($id = null)
    {
        $user = User::where('id_user', $id)->join('role', 'user.id_role', '=', 'role.id_role')->first();
        $role = DB::table('role')->get();


        return view('user.edit', ['user' => $user], compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        User::where('id_user', $request->input('id_user'))->update([
            'id_role' => $request->input('id_role'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id_user', $id)->delete();

        return back();
    }
}
