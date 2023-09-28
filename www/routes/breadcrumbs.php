<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Str;

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

$dataRoutes = [
    'products',
    'articles',
    'partners'
];
foreach ($dataRoutes as $routeGroup) {
    // Home > Entities
    Breadcrumbs::for($routeGroup . '.index', function (BreadcrumbTrail $trail) use ($routeGroup) {
        $trail->parent('home');
        $trail->push(Str::ucfirst($routeGroup), route($routeGroup . '.index'));
    });
    // Home > Entities > Create
    Breadcrumbs::for($routeGroup . '.create', function (BreadcrumbTrail $trail) use ($routeGroup) {
        $trail->parent($routeGroup . '.index');
        $trail->push('Create', route($routeGroup . '.create'));
    });
    // Home > Entities > [Entity]
    Breadcrumbs::for($routeGroup . '.show', function (BreadcrumbTrail $trail, $entity) use ($routeGroup) {
        $trail->parent($routeGroup . '.index');
        $trail->push($entity->getName(), route($routeGroup . '.show', $entity));
    });
    // Home > Entities > [Entity] > Edit
    Breadcrumbs::for($routeGroup . '.edit', function (BreadcrumbTrail $trail, $entity) use ($routeGroup) {
        $trail->parent($routeGroup . '.index');
        $trail->push($entity->name, route($routeGroup . '.show', $entity));
        $trail->push('Edit', route($routeGroup . '.edit', $entity));
    });
}

// Articles tags
Breadcrumbs::for('articles.tags', function (BreadcrumbTrail $trail, $tags) {
    $trail->parent('articles.index');
    $trail->push(implode(', ', $tags->map(function($tag) {
        return $tag->name;
    })->toArray()), '');
});
