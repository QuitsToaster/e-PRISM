<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    // Explicitly set table name
    protected $table = 'researches';

    protected $fillable = [
        'user_id', 'classification', 'research_type',
        'school', 'school_id', 'title', 'chapters', 'status'
    ];

    protected $casts = [
        'chapters' => 'array'
    ];

    public function proponents() {
        return $this->hasMany(Proponent::class);
    }

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }
}