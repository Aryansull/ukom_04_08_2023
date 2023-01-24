<?php

namespace App\Http\Controllers;
use App\Models\role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $role;
    public function __construct()
    {
        $this->role = new Role();
    }
    public function index()
    {
        //menampilkan seluruh role
        $data = [
            'title' => 'Daftar role',
            'role' => $this->role->all()
        ];
        return view('role.index', $data);
    }
}