<?php

namespace App\Models\PostsModel;

use \PDO;

function findAll(PDO $connection, int $limit, int $offset = 0){
    $sql = "SELECT posts.*, categories.name AS category_name, DATE(posts.created_at) as post_date
            FROM posts
            JOIN categories ON posts.category_id = categories.id
            ORDER BY posts.created_at DESC
            LIMIT :limit
            OFFSET :offset;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('limit', $limit, PDO::PARAM_INT);
    $rs -> bindValue('offset', $offset, PDO::PARAM_INT);
    $rs -> execute();
    return $rs -> fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connection, int $id){
    $sql = "SELECT posts.*, categories.name AS category_name
            FROM posts
            JOIN categories ON categories.id = posts.category_id
            WHERE posts.id = :id;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('id', $id, PDO::PARAM_INT);
    $rs -> execute();
    return $rs -> fetch(PDO::FETCH_ASSOC);
}

function countPages(PDO $connection){
    $sql = "SELECT COUNT(posts.id)
            FROM posts;";
    $rs = $connection -> query($sql);
    return $rs -> fetchColumn();
}
