<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;//bijzetten als je nieuw model aanmaakt
    //
    protected $fillable = [
        'title',
        'description',
        'user_id', //dit is de kolom die de foreignId aanmaakt
        'photo_id',
        'created_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
