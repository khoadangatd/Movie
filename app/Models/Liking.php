<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liking extends Model
{
    use HasFactory;
    protected $table="likings";
    protected $fillable=["iduser,poster,idmovie,title"];
}
