<?php

namespace App\Models\ModifyDbModel;
use \PDO;

function insertPicture(array $postData){
    $imageUrl = 'images/blog/'.$postData['title'].'.jpeg';
    $imageName = $postData['title'].'.jpeg';
    move_uploaded_file($_FILES["file"]['tmp_name'], $imageUrl);
    return $imageName;
}

function addOnePost(PDO $connection, array $data){
    $imageName = insertPicture($data);
    $sql = "INSERT INTO posts
            SET title = :title,
                text = :text,
                created_at = NOW(),
                category_id = :category_id,
                quote = :quote,
                image = :image;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('title', $data['title'], PDO::PARAM_STR);
    $rs -> bindValue('text', $data['text'], PDO::PARAM_STR);
    $rs -> bindValue('category_id', $data['category_id'], PDO::PARAM_INT);
    $rs -> bindValue('quote', $data['quote'], PDO::PARAM_STR);
    $rs -> bindValue('image', $imageName, PDO::PARAM_STR);
    $rs -> execute();
    return $rs -> fetch(PDO::FETCH_ASSOC);

}

function deleteOnePost(PDO $connection, int $id){
    $sql = "DELETE from posts
            WHERE id = :id;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('id', $id, PDO::PARAM_INT);
    $rs -> execute();
    return $rs -> fetchColumn(PDO::FETCH_ASSOC);
}