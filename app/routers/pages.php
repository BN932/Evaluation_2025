<?php

use \App\Controllers\PagesController;
include_once '../app/controllers/PagesController.php';

if(isset($_GET['direction'])):
switch($_GET['direction']):

    case 'previous' :
        PagesController\previousPage($connection, $page);
    break;
    case 'next':
        PagesController\nextPage($connection, $page);
    break;
endswitch;
else:
        $page = $_GET['numPage'];
        echo $page;
        PostsController\goToPage($connection, $page);
endif;