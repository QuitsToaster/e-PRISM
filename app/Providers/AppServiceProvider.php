<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Research;
use App\Models\ResearchChapter;
use App\Models\ResearchChapterTable;
use App\Models\Attachment;

use App\Observers\ResearchObserver;
use App\Observers\ResearchChapterObserver;
use App\Observers\ResearchChapterTableObserver;
use App\Observers\AttachmentObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Research::observe(ResearchObserver::class);
    ResearchChapter::observe(ResearchChapterObserver::class);
    ResearchChapterTable::observe(ResearchChapterTableObserver::class);
    Attachment::observe(AttachmentObserver::class);
}
}
