<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usterkimodel;


class usterkimodel extends Model
{
    public $timestamps=false;
    protected $primaryKey ='id_usterki';
    protected $table="usterki";
}
