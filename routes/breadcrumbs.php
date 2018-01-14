<?php

// Admin dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// Admin - job categories
Breadcrumbs::register('categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Job Categories', route('categories.index'));
});

// Admin - create job category
Breadcrumbs::register('categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('categories.index');
    $breadcrumbs->push('Add Job Category', route('categories.create'));
});

// Admin - edit job category
Breadcrumbs::register('categories.edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('categories.index');
    $breadcrumbs->push('Edit Job Category', route('categories.edit', $category->id));
});

// Admin - job types
Breadcrumbs::register('types.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Job Types', route('types.index'));
});

// Admin - create job type
Breadcrumbs::register('types.create', function ($breadcrumbs) {
    $breadcrumbs->parent('types.index');
    $breadcrumbs->push('Add Job Type', route('types.create'));
});

// Admin - edit job type
Breadcrumbs::register('types.edit', function ($breadcrumbs, $type) {
    $breadcrumbs->parent('types.index');
    $breadcrumbs->push('Edit Job Type', route('types.edit', $type->id));
});

// Admin - users
Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Users', route('users.index'));
});

// Admin - edit user
Breadcrumbs::register('users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push('Edit User', route('users.edit', $user->id));
});
