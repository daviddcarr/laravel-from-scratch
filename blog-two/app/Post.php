<?php

namespace App;

// Use our custom Model class rather than Eloquent's
// use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // When using a bulk assign method in your PostController using this protects those fields of data.
    // Post::create([
    //     'title' => request('title'),
    //     'body' => request('body')
    // ]);

    // Protects fields that you accept and rejects all others.
    //protected $fillable = ['title', 'body'];

    // Rejects all fields listed and accepts all others.
    //protected $guarded = ['user_id'];

    // Made obsolete by the Model.php controller we created

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function addComment($body)
    {
        $this->comments()->create(compact('body'));

        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $this->id
        // ]);
    }
}
