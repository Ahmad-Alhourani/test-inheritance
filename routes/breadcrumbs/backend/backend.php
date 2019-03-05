<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(
        __('strings.backend.dashboard.title'),
        route('admin.dashboard')
    );
});

//start_Test_start
Breadcrumbs::register('admin.test.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(
        __('strings.backend.tests.title'),
        route('admin.test.index')
    );
});

Breadcrumbs::register('admin.test.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.test.index');
    $breadcrumbs->push(
        __('labels.backend.tests.create'),
        route('admin.test.create')
    );
});

Breadcrumbs::register('admin.test.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.test.index');
    $breadcrumbs->push(
        __('menus.backend.tests.view'),
        route('admin.test.show', $id)
    );
});

Breadcrumbs::register('admin.test.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.test.index');
    $breadcrumbs->push(
        __('menus.backend.tests.edit'),
        route('admin.test.edit', $id)
    );
});
//end_Test_end

//*****Do Not Delete Me

require __DIR__ . '/auth.php';
require __DIR__ . '/log-viewer.php';
