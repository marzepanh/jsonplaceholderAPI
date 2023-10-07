<?php

require 'vendor/autoload.php'; // Подключаем Composer autoload

use GuzzleHttp\Client;

class JsonPlaceholderAPI
{
    private string $base_url;
    private Client $client;

    public function __construct()
    {
        $this->base_url = 'https://jsonplaceholder.typicode.com/';
        $this->client = new Client(['base_uri' => $this->base_url]);
    }

    public function getUsers()
    {
        $response = $this->client->get('users');
        return json_decode($response->getBody(), true);
    }

    public function getUserPosts($userId)
    {
        $response = $this->client->get("posts?userId=$userId");
        return json_decode($response->getBody(), true);
    }

    public function getUserTodos($userId)
    {
        $response = $this->client->get("todos?userId=$userId");
        return json_decode($response->getBody(), true);
    }

    public function getPost($postId)
    {
        $response = $this->client->get("posts/$postId");
        return json_decode($response->getBody(), true);
    }

    public function createPost($data)
    {
        $response = $this->client->post('posts', [
            'json' => $data
        ]);
        return json_decode($response->getBody(), true);
    }

    public function updatePost($postId, $data)
    {
        $response = $this->client->put("posts/$postId", [
            'json' => $data
        ]);
        return json_decode($response->getBody(), true);
    }

    public function deletePost($postId): bool
    {
        $response = $this->client->delete("posts/$postId");
        return $response->getStatusCode() === 200;
    }
}
