<!DOCTYPE html>
<html lang="fr">
<?php
require_once ROOT . '/Views/includes/head.php';
?>
<body>
<?php
require_once ROOT . '/Views/includes/header.php';
?>
<main class="site-wrapper">
    <section class="pt-table desktop-768">
        <div class="pt-tablecell page-home relative" style="background-image: url(https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80);
    background-position: center;
    background-size: cover;">
            <div class="overlay"></div>

            <div class="container">
                <div class="row">
                    <?php if(!empty($_SESSION['erreur'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['erreur']; unset($_SESSION['erreur']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['message'])): ?>
                        <div class="alert alert-success text-success" role="alert">
                            <?php echo $_SESSION['message'];
                            unset($_SESSION['message']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <!-- contenue de la page-->
                        <?= $contenu ?>
                        <!--  Fin contenue de la page-->

                    </div>
                </div>
            </div>

        </div>

    </section>
</main>
<?php
require_once '../Views/includes/footer.php';
?>
</body>
</html>