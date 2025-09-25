<?php

namespace App\Models\ModifyDbModel;
use \PDO;

function addOnePost(PDO $connection, array $data){
    $sql = "INSERT INTO posts
            SET title = :title,
                text = :text,
                created_at = NOW(),
                category_id = :category_id,
                quote = :quote;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('title', $data['title'], PDO::PARAM_STR);
    $rs -> bindValue('text', $data['text'], PDO::PARAM_STR);
    $rs -> bindValue('category_id', $data['category_id'], PDO::PARAM_INT);
    $rs -> bindValue('quote', $data['quote'], PDO::PARAM_STR);
    $rs -> execute();
    return $rs -> fetch(PDO::FETCH_ASSOC);

}