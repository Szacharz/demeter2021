<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    protected $table='images';
    protected $fillable = [
        'img_code',
    ];
    public function usterki()
    {
        return $this->belongsTo(usterkimodel::class);
    }
    public function notatki()
    {
        return $this->belongsTo(Notatki::class);
    }
    public $timestamps=false;

}
