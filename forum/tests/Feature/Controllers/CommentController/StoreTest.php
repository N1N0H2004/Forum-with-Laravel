<?php

it('can store a comment', function() {
    $user = User::factory()->create();
    $post = Post::factory()->create();


    actingAs($user)->post(route('post.comment.store', $post), [
        'body' => 'This is a comment'
    ]);

    $this->assertDatabaseHas(Comment::class, [
        'post_id' => $post->id,
        'user_id' => $user->id,
        'body' => 'This is a comment',
    ]);
});


it('requires a valid body', function($value) {
    $post = Post::factory()->create();

    actingAs(User::factory()->create())
        ->post(route('post.comment.store', $post), [
            'body' => $value,
        ])
        ->assertInvalid('body');
})->with([
    null,
    1,
    1.5,
    true,
    false,
    str_repeat('a', 2501),
]);
