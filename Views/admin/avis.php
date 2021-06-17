<?php
//var_dump($avis);
$avis;
?>
<div class="table-responsive">
<table class="table table-striped">
    <thead>
    <th>id</th>
    <th>titre</th>
    <th>contenu</th>
    <th>actif</th>
    <th>actions</th>
    </thead>
    <tbody>
    <?php foreach ($avis as $avi): ?>
        <tr>
            <td><?= $avi->id ?></td>
            <td><?= $avi->titre ?></td>
            <td><?= $avi->description ?></td>
            <td>

                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1<?= $avi->id ?>" <?= $avi->actif ? 'checked' : ''?>>
                    <label class="custom-control-label" for="customSwitch1<?= $avi->id ?>"></label>
                </div>
            </td>
            <td>
                <!-- !TODO  ajouter un scripts js demandant si l'on est sur de vouloir modifier-->
                <a href="/avis/modifier/<?= $avi->id ?>" class="btn btn-warning">modifier</a>
                <a href="" class="btn btn-danger">supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>