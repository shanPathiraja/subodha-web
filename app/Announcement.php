<?php

namespace App;

use App\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{   

    use Publishable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 
        'description',
        'published',
    ];
}
