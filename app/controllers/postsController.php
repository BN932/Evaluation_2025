<?php

//Définition du namespace du fichier
namespace App\Controllers\PostsController;
//Indication des namespaces externes à utiliser ici
use \PDO;
use \App\Models\PostsModel;
use \App\Models\CategoriesModel;
use \App\Models\EditDbModel;
//Inclusion des fichiers (ici modèles) contenant les fonctions appelées par les fonctions de ce controller
include_once '../app/models/postsModel.php';
include_once '../app/models/categoriesModel.php';
include_once '../app/models/editDbModel.php';

//Fonction indexAction, comportant un paramètre offset pour la pagination.
function indexAction(PDO $connection, int $offset = 0): void{
    //Chargement de la liste des posts dans la variable $posts
    $posts = PostsModel\findAll($connection, 10, $offset);
    //Chargement de la liste des catégories dans la variable $catégories
    $categories = CategoriesModel\findAll($connection);
    //Chargement du nombre total de posts dans la variable $nbrPosts (pagination)
    $nbrPosts = (int) PostsModel\countPages($connection);
    //Calcul du nombre de pages pour la pagination (valeur arrondie au supérieur)
    $nbrPages = ceil($nbrPosts/10);
    ob_start();
    //Chargement des ressources nécessaires pour la génération de la vue index.
    global $content, $title, $page;
    $title = "Alex Parker - Blog";
    include_once '../app/views/posts/index.php';
    $content = ob_get_clean();
}
//Fonction showAction
function showAction(PDO $connection, int $id): void{
    //Chargement des infos du post correspondant à l'id passé en paramètre de la fonction, dans la variable $post
    $post = PostsModel\findOneById($connection, $id);
    //Chargement de la liste des catégories dans la variable $catégories
    $categories = CategoriesModel\findAll($connection);
    //Chargement des ressources nécessaires pour la génération de la vue show.
    ob_start();
    global $title, $content, $show_partials;
    $title = "Alex Parker -" . $post['title'];
    include_once '../app/views/posts/show.php';
    $content = ob_get_clean();
}

function deleteAction(PDO $connection, int $id): void{
    //Chargement des infos du post dans la variable $post
    $post = PostsModel\findOneById($connection, $id);
    //Suppression du post de la DB et de son image (si applicable).
    EditDbModel\deleteOnePostById($connection, $post);
    //Redirection vers la page d'accueil.
    header('Location: ' . PUBLIC_BASE_URL);
}

function goToPage(PDO $connection, int $pageNbr): void{
    if($pageNbr===1):
        header('Location: ' . PUBLIC_BASE_URL);
    else:
        $offset = ($pageNbr * 10) - 10;
        indexAction($connection, $offset);
    endif;
}