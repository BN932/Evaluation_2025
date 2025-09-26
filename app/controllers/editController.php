<?php

namespace \App\Controllers\EditController;

use \App\Models\ModifyDbModel;
use \App\Controllers\PostsController;
use \PDO;

function editAction(PDO $connection, array $data){
    ModifyDbModel\editOnePost($connection, $data);
    PostsController\showAction($connection, $array['id'];)
}

function displayEditPostForm(){
    include '../'
}