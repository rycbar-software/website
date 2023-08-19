<?php

namespace App\Models;

use App\Enum\ArticleStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Article extends Model
{
    use HasFactory, HasSEO;

    protected $guarded = [
        'views_count'
    ];

    protected $casts = [
        'status' => ArticleStatusEnum::class,
        'created_at' => 'datetime:Y-m-d'
    ];

    public function isPublished()
    {
        return $this->status === ArticleStatusEnum::PUBLISHED;
    }

    public function publishDate(): string
    {
        $agoLimit = Carbon::now()->subDays(3);
        if ($this->created_at->greaterThan($agoLimit)) {
            return $this->created_at->diffForHumans();
        }
        return $this->created_at->format('F d, Y');
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->name,
            description: $this->name
        );
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
