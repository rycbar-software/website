<?php

namespace App\Models;

use App\Enum\ArticleStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [
        'views_count',
        'published_at'
    ];

    protected $casts = [
        'status' => ArticleStatusEnum::class
    ];

    public function isPublished()
    {
        return $this->status === ArticleStatusEnum::PUBLISHED;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        if (!Auth::user()?->isAdmin()) {
            static::addGlobalScope('published', function (Builder $builder) {
                $builder->where('status', '=', ArticleStatusEnum::PUBLISHED->value);
            });
        }
    }
}
