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
            ->ajoutLabelFor('nom', 'Nom')
            ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control mb-2'])
            ->ajoutLabelFor('prenom', 'Prénom')
            ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control mb-2'])
            ->ajoutLabelFor('email', 'Email')
            ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control mb-2'])
            ->ajoutLabelFor('sujet', 'Sujet')
            ->ajoutSelect('text', ['Demande de devis', 'Renseignements', 'Prendre rdv', 'Autre' ], ['id' => 'sujet', 'class' => 'form-control mb-2'])
            ->ajoutLabelFor('message', 'Message')
            ->ajoutTextarea('message', 'message', ['id' => 'message','class' => 'form-control mb-2'])
            ->ajoutBouton('Envoyez', ['class' => 'btn btn-info'])
            ->finForm();
        // On envoie le formulaire à la vue en utilisant notre méthode "create"
        $this->render('front/contact', ['FormulaireDeContact' => $form->create()]);
    }
}