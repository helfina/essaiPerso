<?php if(!empty($_SESSION['erreur'])): ?>
    <div class="alert alert-danger text-danger" role="alert">
        <?php  echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
    </div>
<?php endif; ?>

<h1 class="text-center text-info">Connexion</h1>
<?= $loginForm ?>
<a href="/users/register"> Pas inscrit - M'inscrire</a>
