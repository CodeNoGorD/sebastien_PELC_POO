<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ACCEL'R</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?controller=default&action=home">Accueil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= !empty($_SESSION)? 'index.php?controller=security&action=logout': 'index.php?controller=security&action=login'; ?>">
                    <?= !empty($_SESSION)? 'Déconnexion': 'Connexion'; ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
