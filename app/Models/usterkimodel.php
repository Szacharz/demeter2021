<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usterkimodel;
use Kyslik\ColumnSortable\Sortable;

class usterkimodel extends Model
{
    use Sortable;
    public $timestamps=false;
    protected $primaryKey ='id_usterki';
    protected $table="usterki";
    protected $fillable= ["tresc", "place", "data", "deadline", "autor", "status"];
}
