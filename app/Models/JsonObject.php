<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonObject extends Model
{
    use HasFactory;

    protected $guarded = ['user_token'];
    protected $fillable = ['data', 'user_id'];
}
