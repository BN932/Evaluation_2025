<?php

namespace App\Controllers\AddController;
use \PDO;
use \App\Models\CategoriesModel;

function displayAddPostForm(PDO $connection){
    $categories = CategoriesModel\findAll($connection);
    ob_start();
    global $content, $title;
    $title = "Alex Parker - Add a post";
    include '../app/views/posts/addPostForm.php';
    $content = ob_get_clean();
}

