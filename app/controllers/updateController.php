<?php

//Définition du namespace du fichier
namespace App\Controllers\UpdateController;
//Indication des namespaces externes à utiliser ici
use \App\Models\EditDbModel;
use \App\Models\PostsModel;
use \App\Controllers\PostsController;
use \App\Models\CategoriesModel;
use \PDO;

//Affichage du formulaire de modification d'un post
function displayEditPostForm(PDO $connection, int $id): void{
    //Chargement de la liste des catégories dans la variable $catégories
    $categories = CategoriesModel\findAll($connection);
    //Chargement des infos du post dans la variable $post
    $post = PostsModel\findOneById($connection, $id);
    //Chargement des ressources nécessaires pour la génération de la vue editPostForm.
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Edit a post";
    include_once '../app/views/posts/editPostForm.php';
    $content = ob_get_clean();
}
//fonction de modification d'un post dans la DB
function postAction(PDO $connection, int $id, array $data): void{
    //Modification du post et de son image (si nécessaire)
    include_once '../app/models/editDbModel.php';
    EditDbModel\editOnePostById($connection, $id, $data);
    //Appel de la fonction showAction pour afficher le post modifié
    include_once '../app/controllers/postsController.php';
    PostsController\showAction($connection, $id);
}