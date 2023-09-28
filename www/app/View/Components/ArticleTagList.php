<?php

namespace App\View\Components;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ArticleTagList extends Component
{
    private ?Collection $currentTags = null;
    private Article $article;

    /**
     * Create a new component instance.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->currentTags = view()->shared('currentTags') ?: null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tagsData = [];
        if (empty($this->article->tags)) {
            return '';
        }
        foreach ($this->article->tags as $tag) {
            $checked = $this->currentTags?->contains($tag) ?: false;

            $tagsData[] = [
                'name' => $tag->name,
                'checked' => $checked
            ];
        }
        return view(
            'components.article-tag-list',
            [
                'tags' => $tagsData
            ]
        );
    }
}
