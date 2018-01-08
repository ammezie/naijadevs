<?php

// Admin dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// Admin - Users
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Users', route('admin.dashboard'));
});

// Admin - jobs
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Jobs', route('admin.dashboard'));
});
