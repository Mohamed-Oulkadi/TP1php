<?php

require('src/model.php');

$posts = getPosts();

require('templates/homepage.php');

// to check whether $_GET['id'] is set and it's not empty
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $identifier = $_GET['id'];
} else {
    echo 'Erreur : aucun identifiant de visite envoyé';
    die;
}

//$posts = getPost($identifier);
$comments = getComments($identifier);
require('templates/post.php');

?>