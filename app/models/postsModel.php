<?php

namespace App\Models\PostsModel;

use \PDO;

//Fonction findAll des posts, avec paramètre limit (10 posts à la fois) et offset (pagination)
function findAll(PDO $connection, int $limit, int $offset = 0): array{
    //posts.created_at est mentionné spécifiquement afin de pouvoir directement formater la data de la façon voulue.
    $sql = "SELECT posts.*, categories.name AS category_name, DATE(posts.created_at) as post_date
            FROM posts
            LEFT JOIN categories ON posts.category_id = categories.id
            ORDER BY posts.created_at DESC
            LIMIT :limit
            OFFSET :offset;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('limit', $limit, PDO::PARAM_INT);
    $rs -> bindValue('offset', $offset, PDO::PARAM_INT);
    $rs -> execute();
    return $rs -> fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connection, int $id): array{
    //posts.created_at est mentionné spécifiquement afin de pouvoir directement formater la data de la façon voulue.
    $sql = "SELECT posts.*, categories.name AS category_name, DATE(posts.created_at) as post_date
            FROM posts
            LEFT JOIN categories ON categories.id = posts.category_id
            WHERE posts.id = :id;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('id', $id, PDO::PARAM_INT);
    $rs -> execute();
    return $rs -> fetch(PDO::FETCH_ASSOC);
}

function countPages(PDO $connection): int{
    $sql = "SELECT COUNT(posts.id)
            FROM posts;";
    $rs = $connection -> query($sql);
    return $rs -> fetchColumn();
}
