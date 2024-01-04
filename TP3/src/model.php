<?php

function dbConnect()
{
    // We connect to the database.
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mydatabase;charset=utf8', 'root', '');
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getPosts()
{
    $bdd = dbConnect();

    // Last 5 visits
    $statement = $bdd->query('SELECT id, firstname, lastname, DATE_FORMAT(reg_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_visite_fr FROM myguests ORDER BY reg_date DESC LIMIT 0, 5');

    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'french_visite_date' => $row['date_visite_fr'],
            'identifier' => $row['id'],

        ];

        $posts[] = $post;
    }

    return $posts;
}

function getPost($identifier)
{
    $bdd = dbConnect();


    $statement = $bdd->query('SELECT id, firstname, lastname, DATE_FORMAT(reg_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_visite_fr FROM myguests WHERE id=:id');
    $statement->bindParam(':id', $identifier);
    $statement->execute();

    $row = $statement->fetch();
    $post = [

        'firstname' => $row['firstname'],
        'lastname' => $row['lastname'],
        'french_visite_date' => $row['date_visite_fr'],
        'identifier' => $row['id'],

    ];
    return $post;
}

function getComments($identifier)
{
    $bdd = dbConnect();

    try {

        $statement = $bdd->query('SELECT post_id,firstname,comment, comment_date  FROM Comments WHERE post_id= ' . $identifier . '');
        $statement->execute();

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = [
                'firstname' => $row['firstname'],
                'french_visite_date' => $row['comment_date'],
                'comment' => $row['comment'],
            ];

            $comments[] = $comment;
        }

        return $comments;
    } catch (PDOException $e) {
        echo "Error <br>" . $e->getMessage();
    }
}
