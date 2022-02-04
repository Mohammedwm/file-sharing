<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    public function file()
    {
        return $this->belongsTo(File::class,'file_id','id');
    }
}
