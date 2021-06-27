<header>
    <nav>
        <p>Gk</p>

        <button id="burger" class="burger">
            <div class="bar"></div>
            <div class="bar"></div>
        </button>

        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/services">Service</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>

        <!-- TODO revoir la structure du menu-->
        <ul>
            <?php if (!empty($_SESSION['user']['id'])): ?>

                <?php if (isset($_SESSION['user']['roles']) && in_array("ROLE_ADMIN", $_SESSION['user']['roles'])): ?>
                    <li><a href="/admin/index">admin</a></li>
                <?php endif; ?>

                <li><a href="/users/profil">Profil</a></li>
                <li><a href="/users/logout">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="/users/login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>