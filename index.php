<?php
header('Content-Type: application/json');
require 'JsonPlaceholderAPI.php';

$api = new JsonPlaceholderAPI();

function printJSON($data) {
    echo json_encode($data, JSON_PRETTY_PRINT), PHP_EOL;
}

$users = $api->getUsers();
echo "Users:", PHP_EOL;
printJSON($users);

$userPosts = $api->getUserPosts(1);
echo "User posts:", PHP_EOL;
printJSON($userPosts);

$userTodos = $api->getUserTodos(1);
echo "User todos:", PHP_EOL;
printJSON($userTodos);

$post = $api->getPost(1);
echo "Post:", PHP_EOL;
printJSON($post);

$newPost = $api->createPost([
    'userId' => 1,
    'title' => 'New Post Title',
    'body' => 'New Post Body'
]);
echo "New post:", PHP_EOL;
printJSON($newPost);

$updatedPost = $api->updatePost(1, [
    'title' => 'Updated Post Title',
    'body' => 'Updated Post Body'
]);
echo "Updated post:", PHP_EOL;
printJSON($updatedPost);

$deleteResult = $api->deletePost(1);
echo $deleteResult ? "Post deleted successfully" : "Failed to delete post";
