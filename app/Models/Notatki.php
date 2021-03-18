<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notatki extends Model
{
    use HasFactory;
    protected $table = 'notatki';
    protected $primaryKey='id_usterki';
}
