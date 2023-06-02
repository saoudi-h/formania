<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="/">
            <img src="/images/logoV2.png" height="32" alt="formania logo" loading="lazy" />
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
            </ul>
            <!-- Left links -->
            <div class="d-flex align-items-center">
                <?php if ($_SESSION['authenticated']===true) : ?>
                        <ul class="navbar-nav">
                            <!-- Avatar -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo isset($_SESSION['gravatar']) ? $_SESSION['gravatar'] : 'https://mdbcdn.b-cdn.net/img/new/avatars/2.webp' ?>" class="rounded-circle" height="22" alt="Portrait of a Woman" loading="lazy" />
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="profile"><?php echo $_SESSION['user_name'] ?></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="settings">Réglages</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout">Se déconnecter</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                <?php else : ?>

                    <a href="/login">
                        <button type="button" class="btn btn-link px-3 me-2">
                            Se connecter
                        </button>
                    </a>
                    <a href="/register">
                        <button type="button" class="btn btn-primary me-3">
                            S'inscrire
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>