<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSearch extends Model
{
    use HasFactory;
    protected $table = 'custom_search';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable = [
        'user_id',
        'private',
        'groups'
    ];    
}
