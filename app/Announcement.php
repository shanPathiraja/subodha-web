<?php

namespace App;

use App\Traits\Publishable;
use App\Traits\Recordable;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{   
    use Recordable;
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
