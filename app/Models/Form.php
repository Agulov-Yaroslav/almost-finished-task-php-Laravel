<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Form extends Model
{
    public function user(){
        return $this -> hasOne(User::class, 'id', 'user_id');
    }
    protected $fillable = ['id', 'title', 'body', 'file', 'user_id', 'status'];
    use HasFactory;
}
