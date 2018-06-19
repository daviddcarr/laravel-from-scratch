// Eloquent Model => Post
`php artisan make:model Post`

// PostsController => PostsController
`php artisan make:controller PostsController`

// migration => create_posts_table
`php artisan make:migration create_posts_table --create=posts`

// We can do all three at once with the following command:
`php artisan make:model Post -mc`
(-mc or --migration --controller creates both in addition to the model)
