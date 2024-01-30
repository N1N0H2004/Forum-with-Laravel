<?php

it('can show a post', function () {
    $post = Post::factory()->create();


    get(route('posts.show', $post))
        ->assertComponent('Posts/Show');
});
