<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Articles
Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Articles', route('articles.index'));
});

// Home > Articles > Create
Breadcrumbs::for('articles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('articles.index');
    $trail->push('Create', route('articles.create'));
});

// Home > Articles > [Article]
Breadcrumbs::for('articles.show', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article));
});

// Home > Articles > [Article] > Edit
Breadcrumbs::for('articles.edit', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article));
    $trail->push('Edit', route('articles.edit', $article));
});

// Home > Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacts', route('contacts'));
});
