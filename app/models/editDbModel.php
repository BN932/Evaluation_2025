<?php

namespace App\Models\EditDbModel;
use \PDO;

function insertPicture(array $postData){
    if($postData['oldFileName']!=NULL):
        if(file_exists($_FILES['file']['tmp_name'])):
            $imageUrl = 'images/blog/image-post-'.$postData['title'].'.jpeg';
            $imageName = 'image-post-'.$postData['title'].'.jpeg';
            $path = 'images/blog/'.$postData['oldFileName'];
            move_uploaded_file($_FILES["file"]['tmp_name'], $imageUrl);
            return $imageName;
        else:
            $imageName = 'image-post-'.$postData['title'].'.jpeg';
            unlink('images/blog/'.$postData['oldFileName']);
        endif;
    else:
        $imageUrl = 'images/blog/image-post-'.$postData['title'].'.jpeg';
        $imageName = 'image-post-'.$postData['title'].'.jpeg';
        move_uploaded_file($_FILES["file"]['tmp_name'], $imageUrl);
        return $imageName;
    endif;
}
function addOnePostById(PDO $connection, array $data){
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

function deleteOnePostById(PDO $connection, array $post){
    if(isset($post['image'])):
        $path = 'images/blog/'.$post['image'];
        unlink($path);
    endif;
        $sql = "DELETE from posts
                WHERE id = :id;";
        $rs = $connection -> prepare($sql);
        $rs -> bindValue('id', $post['id'], PDO::PARAM_INT);
        $rs -> execute();
}

function editOnePostById(PDO $connection, int $id, array $data){
    $imageName = insertPicture($data);
    $sql = "UPDATE posts
            SET title = :title,
                text = :text,
                created_at = NOW(),
                category_id = :category_id,
                quote = :quote,
                image = :image
                WHERE id = :id;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('title', $data['title'], PDO::PARAM_STR);
    $rs -> bindValue('text', $data['text'], PDO::PARAM_STR);
    $rs -> bindValue('category_id', $data['category_id'], PDO::PARAM_INT);
    $rs -> bindValue('quote', $data['quote'], PDO::PARAM_STR);
    $rs -> bindValue('image', $imageName, PDO::PARAM_STR);
    $rs -> bindValue('id', $id, PDO::PARAM_INT);
    $rs -> execute();
    return $rs -> fetch(PDO::FETCH_ASSOC);

}