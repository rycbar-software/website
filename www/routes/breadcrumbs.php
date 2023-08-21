<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Contacts
Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contacts', route('contacts'));
});

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
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

// Home > Products
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Products', route('products.index'));
});
// Home > Products > Create
Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('products.index');
    $trail->push('Create', route('products.create'));
});
// Home > Products > [Product]
Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products.index');
    $trail->push($product->title, route('products.show', $product));
});
// Home > Products > [Product] > Edit
Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products.index');
    $trail->push($product->title, route('products.show', $product));
    $trail->push('Edit', route('products.edit', $product));
});


// Home > Partners
Breadcrumbs::for('partners.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Partners', route('partners.index'));
});
// Home > Partners > Create
Breadcrumbs::for('partners.create', function (BreadcrumbTrail $trail) {
    $trail->parent('partners.index');
    $trail->push('Create', route('partners.create'));
});
// Home > Partners > [Partner]
Breadcrumbs::for('partners.show', function (BreadcrumbTrail $trail, $partner) {
    $trail->parent('partners.index');
    $trail->push($partner->title, route('partners.show', $partner));
});
// Home > Partners > [Partner] > Edit
Breadcrumbs::for('partners.edit', function (BreadcrumbTrail $trail, $partner) {
    $trail->parent('partners.index');
    $trail->push($partner->title, route('partners.show', $partner));
    $trail->push('Edit', route('partners.edit', $partner));
});
