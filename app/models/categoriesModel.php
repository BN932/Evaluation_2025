<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connection){
    $sql="SELECT categories.*, COUNT(posts.id) as postsCount
          FROM categories
          JOIN posts on posts.category_id = categories.id
          GROUP BY categories.id
          ORDER BY name;";
    $rs = $connection -> query($sql);
    return $rs -> fetchAll(PDO::FETCH_ASSOC);
}