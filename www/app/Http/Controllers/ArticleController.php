<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Collection;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Tags\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::orderByDesc('id')->paginate(12),
            'SEOData' => new SEOData(
                title: 'Articles of RYCBAR software',
                description: 'List of articles and tutorials, created by RYCBAR software team or Andriy Kryvenko'
            )
        ]);
    }

    public function tags(Collection $tags)
    {
        $tagNames = $tags->map(function($tag) {
            return $tag->name;
        })->toArray();

        return view('articles.index', [
            'articles' => Article::orderByDesc('id')->withAllTags($tagNames)->paginate(12),
            'tags' => $tags,
            'SEOData' => new SEOData(
                title: implode(', ', $tagNames) . ' articles of RYCBAR software',
                description: 'List of articles and tutorials about '.implode(', ', $tagNames).', created by RYCBAR software team or Andriy Kryvenko'
            )
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $tags = $request->get('tags') ?: [];
        $newTags = explode(', ', $request->get('new_tags') ?: '');

        $fields = $request->validated();
        $fields['tags'] = array_merge($tags, $newTags);

        $article = Article::create($fields);
        return redirect()->route('articles.show', [$article]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $tags = $request->get('tags') ?: [];
        $newTags = array_filter(explode(', ', $request->get('new_tags') ?: ''));

        $fields = $request->validated();
        $fields['tags'] = array_values($tags);
        if (!empty($newTags)) {
            $fields['tags'] = array_merge($tags, $newTags);
        }

        $article->update($fields);
        return redirect()->route('articles.show', [$article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
