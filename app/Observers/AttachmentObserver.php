<?php

namespace App\Observers;

use App\Models\Attachment;
use App\Models\ActivityLog;

class AttachmentObserver
{
    public function created(Attachment $attachment)
    {
        ActivityLog::log('created', "Added attachment: {$attachment->filename} in research ID {$attachment->research_id}");
    }

    public function updated(Attachment $attachment)
    {
        ActivityLog::log('updated', "Updated attachment: {$attachment->filename} in research ID {$attachment->research_id}");
    }

    public function deleted(Attachment $attachment)
    {
        ActivityLog::log('deleted', "Deleted attachment: {$attachment->filename} in research ID {$attachment->research_id}");
    }
}