<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchChapter extends Model
{
    protected $fillable = [
        'research_id', 'chapter_number', 'title', 'content'
    ];

    public function research() {
        return $this->belongsTo(Research::class);
    }

    // Change this to hasMany and plural name
    public function tables() {
        return $this->hasMany(ResearchChapterTable::class);
    }
}