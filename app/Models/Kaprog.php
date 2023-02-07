<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaprog extends Model
{
    use HasFactory;
    protected $table = 'Kaprog';
    public $timestamps = false;
    protected $fillable = ['id_kaprog', 'id_user', 'nama_kaprog', 'foto'];
    protected $guarded = [];
}
