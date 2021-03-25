<?php
namespace App\Controllers;

use App\Models\cvModel;

class MainController extends Controller {

    public function index()
    {

        echo 'ceci est la page d\'acceuil';
        include_once ROOT. './Views/front/home.php';

    }
}
