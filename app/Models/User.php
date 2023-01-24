<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'User';
    // protected $softDelete = false;
    public $timestamps = false;
    // protected $primaryKey = 'id_user';
    // public $incrementing = false;
    // public $keyType = 'string';
    // protected $fillable = ['id_user','id_role','username','email','password'];
    protected $guarded = [];
}
