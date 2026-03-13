<?php

namespace App\Models;

use App\Events\postcreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => Postcreated::class

    ];
    protected $fillable = [
        'title',
        'content',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
