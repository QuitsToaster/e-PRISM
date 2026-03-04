<?php

namespace App\Observers;

use App\Models\ResearchChapterTable;
use App\Models\ActivityLog;

class ResearchChapterTableObserver
{
    public function created(ResearchChapterTable $table)
    {
        ActivityLog::log('created', "Created table ID {$table->id} in chapter ID {$table->research_chapter_id}");
    }

    public function updated(ResearchChapterTable $table)
    {
        ActivityLog::log('updated', "Updated table ID {$table->id} in chapter ID {$table->research_chapter_id}");
    }

    public function deleted(ResearchChapterTable $table)
    {
        ActivityLog::log('deleted', "Deleted table ID {$table->id} in chapter ID {$table->research_chapter_id}");
    }
}