<?php

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('admin.pages_dashboard'));
});

// Categories
Breadcrumbs::for('admin.categories_index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Categorie', route('admin.categories_index'));
});
Breadcrumbs::for('admin.categories_add', function ($trail) {
    $trail->parent('admin.categories_index');
    $trail->push('Nuova Categoria', route('admin.categories_add'));
});
Breadcrumbs::for('admin.categories_edit', function ($trail, $category) {
    $trail->parent('admin.categories_index');
    $trail->push('Modifica Categoria (ID '.$category->id.')', route('admin.categories_edit', $category->id));
});

// Tags
Breadcrumbs::for('admin.tags_index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Tag', route('admin.tags_index'));
});
Breadcrumbs::for('admin.tags_add', function ($trail) {
    $trail->parent('admin.tags_index');
    $trail->push('Nuovo Tag', route('admin.tags_add'));
});
Breadcrumbs::for('admin.tags_edit', function ($trail, $tag) {
    $trail->parent('admin.tags_index');
    $trail->push('Modifica Tag (ID '.$tag->id.')', route('admin.tags_edit', $tag->id));
});

// Bookmarks
Breadcrumbs::for('admin.bookmarks_index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Segnalibri', route('admin.bookmarks_index'));
});
Breadcrumbs::for('admin.bookmarks_add', function ($trail) {
    $trail->parent('admin.bookmarks_index');
    $trail->push('Nuovo segnalibro', route('admin.bookmarks_add'));
});
Breadcrumbs::for('admin.bookmarks_edit', function ($trail, $bookmark) {
    $trail->parent('admin.bookmarks_index');
    $trail->push('Modifica segnalibro (ID '.$bookmark->id.')', route('admin.bookmarks_edit', $bookmark->id));
});
