<?php

// Home
Breadcrumbs::for('admin::home', function ($trail) {
    $trail->push('Home');
});

// Users breadcrumbs
Breadcrumbs::for('admin::user.index', function ($trail) {
    $trail->push('Users');
});

Breadcrumbs::for('admin::user.create', function ($trail) {
    $trail->push('Users', route('admin::user.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::user.edit', function ($trail) {
    $trail->push('Users', route('admin::user.index'));
    $trail->push('Edit');
});

Breadcrumbs::for('admin::user.change_password_page', function ($trail) {
    $trail->push('Password Change');
});

Breadcrumbs::for('admin::role.index', function ($trail) {
    $trail->push('Roles');
});

Breadcrumbs::for('admin::role.create', function ($trail) {
    $trail->push('Roles', route('admin::role.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::role.edit', function ($trail) {
    $trail->push('Roles', route('admin::role.index'));
    $trail->push('Edit');
});

// Users breadcrumbs
Breadcrumbs::for('admin::alumni.index', function ($trail) {
    $trail->push('Alumni');
});

Breadcrumbs::for('admin::alumni.create', function ($trail) {
    $trail->push('Alumni', route('admin::alumni.index'));
    $trail->push('Create');
});

Breadcrumbs::for('admin::alumni.requests', function ($trail) {
    $trail->push('Alumni', route('admin::alumni.index'));
    $trail->push('Requests');
});
