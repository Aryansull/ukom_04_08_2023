<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class join_user extends Model
{
    use HasFactory;
    protected $table = 'join_user';
    public $timestamps = false;
    protected $fillable = ['id_user', 'id_role', 'username', 'email', 'password', 'nama_role'];
    protected $guarded = [];
}
