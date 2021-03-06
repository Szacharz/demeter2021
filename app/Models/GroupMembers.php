<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model
{
    use HasFactory;
    protected $table = 'group_members';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable = [
        'user_id'
    ];    
}
