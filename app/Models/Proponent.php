<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proponent extends Model
{
    use HasFactory;

    protected $fillable = ['research_id', 'name', 'position', 'photo'];

    public function research() {
        return $this->belongsTo(Research::class);
    }
}