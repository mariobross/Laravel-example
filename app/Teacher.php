<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nama', 'nik', 'email', 'alamat'];
}
