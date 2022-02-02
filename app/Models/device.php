<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class device extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'devices';
    protected $primaryKey='id';
    public $timestamps=false;
}