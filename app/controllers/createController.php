<?php

//Définition du namespace du fichier
namespace App\Controllers\CreateController;
//Indication des namespaces externes à utiliser ici
use \PDO;
use \App\Models\CategoriesModel;
use \App\Models\EditDbModel;
use \App\Controllers\PostsController;

//fonction d'affichage du formulaire d'ajout de post
function displayAddPostForm(PDO $connection): void{
    //Chargement de la liste des catégories dans la variable $catégories
    $categories = CategoriesModel\findAll($connection);
    //Chargement des ressources nécessaires pour la génération de la vue addPostForm.
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Add a post";
    include '../app/views/posts/addPostForm.php';
    $content = ob_get_clean();
}
//fonction d'ajout d'un nouveau post dans la DB
function createAction(PDO $connection, array $data): void {
    include_once '../app/models/editDbModel.php';
    $newPost = EditDbModel\addOnePostById($connection, $data);
    //Appel de la fonction indexAction pour réafficher la liste des posts, mise à jour avec la nouvelle addition.
    //Pourrait être remplacé par une redirection vers la page d'accueil.
    PostsController\indexAction($connection, 0);
}