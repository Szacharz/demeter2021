<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\usterkimodel;
use Kyslik\ColumnSortable\Sortable;
use DataTables;

class usterkimodel extends Model
{
    use Sortable;
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey ='id_usterki';
    protected $table="usterki";
    protected $sortable= ["id_usterki","tresc", "data", "deadline","autor", "place", "status", "department_id"];
    protected $fillable = [
        'id_usterki',
        'tresc',
        'data',
        'deadline',
        'autor',
        'place',
        'status',
        'department_id'
        ];
}
