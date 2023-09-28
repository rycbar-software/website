<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Spatie\Tags\Tag;

class ArticleTagFilter extends Component
{
    private ?Collection $currentTags = null;
    private array $currentSlugs = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->currentTags = view()->shared('currentTags') ?: null;
        $this->currentSlugs = $this->currentTags?->map(function ($tag) {
            return $tag->slug;
        })->toArray() ?: [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tagsData = [];
        foreach (Tag::all() as $tag) {
            $checked = $this->currentTags?->contains($tag) ?: false;

            $tagsData[] = [
                'name' => $tag->name,
                'url' => $this->makeTagUrl($tag, $checked),
                'checked' => $checked
            ];
        }
        return view(
            'components.article-tag-filter',
            [
                'tags' => $tagsData
            ]
        );
    }

    private function makeTagUrl(Tag $tag, bool $isChecked): string
    {
        if ($isChecked) {
            $slugs = [];
            foreach ($this->currentSlugs as $slug) {
                if ($slug == $tag->slug) {
                    continue;
                }
                $slugs[] = $slug;
            }
        } else {
            $slugs = $this->currentSlugs;
            $slugs[] = $tag->slug;
        }

        if (empty($slugs)) {
            return \route('articles.index');
        }

        sort($slugs);

        return route('articles.tags', implode('-', $slugs));
    }
}
