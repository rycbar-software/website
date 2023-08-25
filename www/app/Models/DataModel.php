<?php

namespace App\Models;

use App\Enum\StatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

abstract class DataModel extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSEO;

    protected $guarded = [];

    protected $casts = [
        'status' => StatusEnum::class,
        'created_at' => 'datetime:Y-m-d'
    ];

    public function getName(): string
    {
        $name = $this->name;
        if (!$this->isPublished()) {
            $name = '[Draft] ' . $name;
        }
        return $name;
    }

    public function getPreviewPicture(): ?string
    {
        return $this->getMedia('preview_picture')->first()?->getUrl() ?: '';
    }

    public function getDetailPicture(): ?string
    {
        return $this->getMedia('detail_picture')->first()?->getUrl() ?: '';
    }

    public function getPreviewText(): string
    {
        return $this->preview_text ?: '';
    }

    public function getDetailText(): string
    {
        return $this->detail_text ?: '';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isPublished()
    {
        return $this->status === StatusEnum::PUBLISHED;
    }

    public function publishDate(): string
    {
        $agoLimit = Carbon::now()->subDays(3);
        if ($this->created_at->greaterThan($agoLimit)) {
            return $this->created_at->diffForHumans();
        }
        return $this->created_at->format('F d, Y');
    }

    protected static function booted()
    {
        if (!Auth::user()?->isAdmin()) {
            static::addGlobalScope('published', function (Builder $builder) {
                $builder->where('status', '=', StatusEnum::PUBLISHED->value);
            });
        }
    }
}
