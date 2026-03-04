<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchChapterTable extends Model
{
    protected $fillable = [
    'research_chapter_id',
    'headers',
    'has_total',
    'admin_feedback',
    'review_status'
];

    protected $casts = ['headers' => 'array'];

    public function rows() {
        return $this->hasMany(ResearchChapterTableRow::class);
    }
}
