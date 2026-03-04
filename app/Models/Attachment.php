<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
    'research_id',
    'filename',
    'filepath',
    'admin_feedback',
    'review_status'
];

    public function research() {
        return $this->belongsTo(Research::class);
    }
}