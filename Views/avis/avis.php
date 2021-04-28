<?php foreach ($avis as $avi) : ?>
    <article>
        <a href="/avis/lire/<?= $avi->id ?>"><?= $avi->titre ?></a>
        <p>
            <span><?= $avi->created_at ?></span>
            <?= $avi->description ?>
        </p>
        <a href="/avis/modifier/<?= $avi->id ?>">Modifier</a>
    </article>
<?php endforeach; ?>
