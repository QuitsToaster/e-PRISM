<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchChapterTableRow extends Model
{
    protected $fillable = ['research_chapter_table_id', 'cells', 'row_total'];

    protected $casts = ['cells' => 'array'];
}
