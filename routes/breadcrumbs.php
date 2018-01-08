<?php

// Admin dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// Admin - job categories
Breadcrumbs::register('categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Categories', route('categories.index'));
});

// Admin - create job category
Breadcrumbs::register('categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('categories.index');
    $breadcrumbs->push('Add Category', route('categories.create'));
});
