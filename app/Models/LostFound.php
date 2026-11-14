<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostFound extends Model
{
    use HasFactory;
    protected $table = 'lost_founds';

    protected $fillable = [
        'type',
        'description',
        'localisation',
        'contact',
        'photo',
        'user_id'
    ];

    // relation avec user
    public function user(){
        return $this->belongsTo(User::class);
    }
}

