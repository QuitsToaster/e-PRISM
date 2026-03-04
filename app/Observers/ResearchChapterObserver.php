<?php

namespace App\Observers;

use App\Models\ResearchChapter;
use App\Models\ActivityLog;

class ResearchChapterObserver
{
    public function created(ResearchChapter $chapter)
    {
        ActivityLog::log('created', "Created chapter: {$chapter->title} in research ID {$chapter->research_id}");
    }

    public function updated(ResearchChapter $chapter)
    {
        ActivityLog::log('updated', "Updated chapter: {$chapter->title} in research ID {$chapter->research_id}");
    }

    public function deleted(ResearchChapter $chapter)
    {
        ActivityLog::log('deleted', "Deleted chapter: {$chapter->title} in research ID {$chapter->research_id}");
    }
}