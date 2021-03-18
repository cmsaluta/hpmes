<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'system_about';

    protected $fillable = [
        'title',
        'value'               
    ];  
}
