<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Collection;
use Exception;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;

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
        ->join('role','user.id_role','=', 'role.id_role')
        ->select('user.*','role.*')
        ->paginate(4);

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
    // public function index()
    // {
    //     $role = DB::table('user')
    //         ->join('role','user.id_user','=', 'role.id_role')
    //         ->select('user.*','role.*')
    //         ->get();
        
    //         return view('user.index', compact('role') );
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = DB::table('role') ->get();

        return view('user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password)
    // }

    public function store(Request $request)
    {
        FacadesSession::flash('username', $request->username);
        FacadesSession::flash('email', $request->email);
        FacadesSession::flash('password', $request->email);

        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],[
            'username.unique'=>'username sudah ada',
            'email.required'=>'email wajib diisi',
            'password.required'=>'password wajib diisi',
        ]);

        User::insert([
            'id_role' => $request->id_role,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password

            // 'password' => Hash::make($request->password)
        ]);
    
            return redirect()->to('user')->with('success', 'berhasil tambah data');

        // try {
        //     $data = [
        //         'id_role' => $request->input('id_role'),
        //         'username' => $request->input('username'),
        //         'email' => $request->input('email'),
        //         'password' => $request->input('password'),
        //     ];
        //     // //substr(hexdec(random_int(0,9999908)),4,-4);
        //     $insert = $this->user->create($data);
        //     //Promise 
        //     if ($insert) {
        //         return redirect('user');
        //     } else {
        //         return "input data gagal";
        //     }
        // } catch (Exception $e) {
        //     return $e->getMessage();
        // }
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
    public function edit($id = null)
    {
        $user = User::where('id_user', $id)->first();
        $role = DB::table('role') ->get();
       
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