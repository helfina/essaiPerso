<?php


namespace App\Controllers;
use App\Core\Form;

class UsersController extends Controller
{
    public function login()
    {
        //On instancie le formulaire
        $form = new Form;

        // On ajoute chacune des parties qui nous intéressent
        $form->debutForm()
            ->ajoutLabelFor('email', 'Email')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('password', 'Mot de passe')
            ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->finForm();

        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('users/login', ['loginForm' => $form->create()]);
    }
}