<?php
//var_dump($avis);
/* !TODO  trouver ou faire une condition qui permet de valider ou non les nouveau utilisateur et de le limiter a 1 seule enregistrement par mail donc le verifier dans la base de donner si il existe ou non*/
$users;
?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <th>id</th>
        <th>email</th>
        <th>role</th>
        <th>actions</th>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->roles ?></td>

                <td>
                    <!-- !TODO  ajouter un scripts js demandant si l'on est sur de vouloir modifier/supprimer-->
                    <a href="/avis/modifier/<?= $avi->id ?>" class="btn btn-warning">modifier</a>
                    <a href="/admin/supprimeAvis/<?= $avi->id ?>" class="btn btn-danger">supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>