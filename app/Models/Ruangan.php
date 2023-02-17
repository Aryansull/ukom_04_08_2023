<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['id_ruangan', 'nama_ruangan', 'foto_ruangan'];
    protected $table = 'Ruangan';
    public $timestamps  = ' false';
    protected $guarded = [];
}
