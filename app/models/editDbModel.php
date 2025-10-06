<?php

namespace App\Models\EditDbModel;
use \PDO;

//But de la fonction : Couche logique de la gestion d'images
function insertPicture(array $postData): string{
    //Le post avait-il déjà une image ?
    if(isset($postData['oldFileName'])):
        //Un fichier a-t-il été uploadé lors de la modification de l'image ?
        if(file_exists($_FILES['file']['tmp_name'])):
            $imageUrl = 'images/blog/image-post-'.$postData['title'].'.jpeg';
            $name = 'image-post-'.$postData['title'].'.jpeg';
            move_uploaded_file($_FILES["file"]['tmp_name'], $imageUrl);
            return $name;
        else:
            //Pas de nouveau fichier chargé, mais le post avait déjà une image
            $imageUrl = 'images/blog/image-post-'.$postData['title'].'.jpeg';
            $name = 'image-post-'.$postData['title'].'.jpeg';
            rename('images/blog/'.$postData['oldFileName'], $imageUrl);
            return $name;
        endif;
    else:
        //Le post n'avait pas encore d'image, mais un nouveau fichier a été uploadé pour la création/modification du post
        if(file_exists($_FILES['file']['tmp_name'])):
            $imageUrl = 'images/blog/image-post-'.$postData['title'].'.jpeg';
            $name= 'image-post-'.$postData['title'].'.jpeg';
            move_uploaded_file($_FILES["file"]['tmp_name'], $imageUrl);
            return $name;
        //Aucun fichier n'a été chargé pour la création/modification du post
        else:
            $name = '';
            return $name;
        endif;
    endif;
}
function addOnePostById(PDO $connection, array $data): void{
    $imageName = insertPicture($data);
    if(!isset($data['category_id'])):
        $category_id = NULL;
    else:
        $category_id = $data['category_id'];
    endif;
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
    $rs -> bindValue('category_id', $category_id, PDO::PARAM_INT);
    $rs -> bindValue('quote', $data['quote'], PDO::PARAM_STR);
    $rs -> bindValue('image', $imageName, PDO::PARAM_STR);
    $rs -> execute();
    $rs -> fetch(PDO::FETCH_ASSOC);

}

function deleteOnePostById(PDO $connection, array $post): void{
    //Si le fichier avait une image - > DELETE
    if($post['image']!==""):
        $path = 'images/blog/'.$post['image'];
        unlink($path);
    endif;
    //Suppression du post de la DB
    $sql = "DELETE from posts
            WHERE id = :id;";
    $rs = $connection -> prepare($sql);
    $rs -> bindValue('id', $post['id'], PDO::PARAM_INT);
    $rs -> execute();
}

function editOnePostById(PDO $connection, int $id, array $data): void{
    //Passage par la couche logique de gestion d'images
    $imageName = insertPicture($data);
    //Mise à jour des infos du post dans la DB
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
    $rs -> fetch(PDO::FETCH_ASSOC);

}