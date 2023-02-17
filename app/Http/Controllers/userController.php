<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $role = DB::table('user')
            ->join('role', 'user.id_role', '=', 'role.id_role')
            ->select('user.*', 'role.*')
            ->paginate(5);

        if (strlen($katakunci)) {
            $data = user::where('username', 'like', "%$katakunci%")
                ->orWhere('email', 'like', "%$katakunci%");
        } else {
            $data = user::orderBy('id_user', 'desc');
        }
        return view('user.index', compact('role'))->with('user', $data);
        // dd($role);
    }

    // public function searchuser(Request $request)
    // {

    //     $katakunci = $request->katakunci;
    //     $role = DB::table('user')
    //         ->select('id_user', 'id_role', 'username', 'email', 'password')
    //         ->where('username', 'like', "%$katakunci%")
    //         ->orWhere('email', 'like', "%$katakunci%")
    //         ->orderBy('username', 'asc')
    //         ->get();

    //     return view('user.index', compact('role'));
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
        Session::flash('id_role', $request->id_role);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

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
        $user = User::where('id_user', $id)->first();
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
        $request->validate([
            'id_role' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:5',
        ], [
            'id_role.required' => 'role wajib diplih',
            'username.required' => 'username wajib diisi',
            'username.unique' => 'username wajib diisi',
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 5 karakter',
        ]);

        // dd($request->all());
        User::where('id_user', $request->input('id_user'))->update([
            'id_role' => $request->input('id_role'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect()->to('user')->with('success', 'berhasil update data');
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
