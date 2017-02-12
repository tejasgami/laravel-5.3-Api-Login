<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    public $timestamps = false;

    protected $fillable = ['name', 'description'];
}
