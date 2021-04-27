<?php


namespace App\Controllers;
use App\Core\Form;

class ContactController extends Controller
{

    public function index(){
        //var_dump($_POST);
        //On instancie le formulaire
        $form = new Form;

        // On ajoute chacune des parties qui nous intéressent
        $form->debutForm()
            ->ajoutLabelFor('nom', 'nom')
            ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control'])
            ->ajoutLabelFor('prenom', 'prenom')
            ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control'])
            ->ajoutLabelFor('email', 'email')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->ajoutLabelFor('sujet', 'sujet')
            ->ajoutSelect('text', ['Demande de devis', 'Renseignements', 'Prendre rdv', 'Autre' ], ['id' => 'sujet', 'class' => 'form-control'])
            ->ajoutLabelFor('message', 'Message')
            ->ajoutTextarea('message', 'message', ['id' => 'message','class' => 'form-control'])
            ->ajoutBouton('Envoyez', ['class' => 'btn btn-primary'])
            ->finForm();
        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('front/contact', ['FormulaireDeContact' => $form->create()]);
    }
}