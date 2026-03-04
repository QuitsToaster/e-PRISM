<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function log($type, $description)
    {
        self::create([
            'user_id' => auth()->id(),
            'type' => $type,
            'description' => $description
        ]);
    }
}