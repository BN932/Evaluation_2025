<?php

//Définition du namespace du fichier
namespace App\Models\CategoriesModel;
//Indication des namespaces externes à utiliser ici
use \PDO;

//But de la fonction : Obtenir de la DB les infos de toutes les catégories ainsi que le nombre de posts par catégorie.
function findAll(PDO $connection): array{
    $sql="SELECT categories.*, COUNT(posts.id) as postsCount
          FROM categories
          JOIN posts on posts.category_id = categories.id
          GROUP BY categories.id
          ORDER BY name;";
    $rs = $connection -> query($sql);
    return $rs -> fetchAll(PDO::FETCH_ASSOC);
}