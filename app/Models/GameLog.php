<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameLog extends Model
{
    use HasFactory;
    protected $table    ='game_log';
    protected $fillable = ['user_id','word_id','result'];
}
