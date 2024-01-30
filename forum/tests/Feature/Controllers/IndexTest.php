<?php

use Inertia\Testing\AssertableInertia;
use function Pest\Laravel\get;

it('Should return the correct comment', function () {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
        ->component('Posts/Index', true)
        );
});

it('passes posts to the view', function () {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->has('posts')
        );
});
