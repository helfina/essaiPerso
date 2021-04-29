<?php
//var_dump($avis);
$avis;
?>
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
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1"><?= $avi->actif ?></label>
                </div>
            </td>
            <td>
                <a href="" class="btn btn-warning">modifier</a>
                <a href="" class="btn btn-danger">supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
