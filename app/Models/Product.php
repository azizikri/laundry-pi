<?php

namespace App\Models;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Slugable;

    protected $guarded = ['id'];

    public function image()
    {
        return Storage::url($this->image);
    }
}
