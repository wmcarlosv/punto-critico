<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'values';
    protected $fillable = ['user_id','key','label','type','value'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
