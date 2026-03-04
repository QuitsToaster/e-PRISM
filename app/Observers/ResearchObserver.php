<?php

namespace App\Observers;

use App\Models\Research;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ResearchObserver
{
    public function created(Research $research)
    {
        ActivityLog::log('submitted', "Created new research: {$research->title}");
    }

    public function updated(Research $research)
    {
        ActivityLog::log('updated', "Updated research: {$research->title}");
    }

    public function deleted(Research $research)
    {
        ActivityLog::log('deleted', "Deleted research: {$research->title}");
    }
}