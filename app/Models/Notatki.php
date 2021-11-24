<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notatki extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'notatki';
    protected $primaryKey='id_usterki';
    public $timestamps=false;
}
