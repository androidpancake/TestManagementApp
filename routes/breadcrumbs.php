<?php

use App\Models\Project;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;




// Project
Breadcrumbs::for('sit.index', function (BreadcrumbTrail $trail): void {
    $trail->push('SIT', route('sit.index'));
});

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard', route('dashboard'));
});

// Project
Breadcrumbs::for('project', function (BreadcrumbTrail $trail): void {
    $trail->push('Test', route('project'));
});

// Project > Form [id]
Breadcrumbs::for('form', function (BreadcrumbTrail $trail, $project): void {
    $trail->parent('project');
    $trail->push($project->name, route('form', $project));
});

// Project > Form [id] > Scenario
// Breadcrumbs::for('scenario.show', function (BreadcrumbTrail $trail, $project): void {
//     $trail->parent('project');
//     $trail->push($project, route('scenario.show', $project));
// });

Breadcrumbs::for('scenario.show', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('form', $project);
    $trail->push('Scenario', route('scenario.show', $project));
});

// User
Breadcrumbs::for('users', function (BreadcrumbTrail $trail): void {
    $trail->push('Users', route('user.index'));
});

// User Create
Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('users');
    $trail->push('Add User', route('user.create'));
});
