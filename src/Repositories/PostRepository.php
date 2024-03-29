<?php

namespace Scaffolder\Scafold\Repositories;

use Scaffolder\Scafold\Models\Post;

class PostRepository {

    protected $post;

    public function __construct(Post $post) {
		$this->post = $post;
	}

	public function getPaginate($n) {
		return $this->post->with('user')
		->orderBy('posts.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs) {
		$this->post->create($inputs);
	}

	public function destroy($id) {
		$this->post->findOrFail($id)->delete();
	}
}