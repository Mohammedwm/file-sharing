<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'path', 'size', 'link_share','file_name'];

    public function visits()
    {
        return $this->hasMany(Visits::class,'file_id','id');
    }
}
