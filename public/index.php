<?php

session_start();
$root = dirname(__DIR__);

// Récupérer la valeur de l'URL
if (isset($_SERVER['REQUEST_URI'])) {
    $requestedUrl = $_SERVER['REQUEST_URI'];
    $segments = explode('/', $requestedUrl);
    $url = '/' . end($segments);
} else {
    $url = '/';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

    <?php

    // Traiter l'URL pour déterminer la page à afficher
    switch ($url) {
        case '/':
            // Page d'accueil
            include $root.'/views/home.php';
            break;
        case '/login':
            include $root.'/views/login.php';
            break;
        case '/course':
            include $root.'/views/course.php';
            break;
        case '/courses':
            include '../views/courses.php';
            break;
        case '/profile':
            include '../views/profile.php';
            break;
        case '/register':
            include '../views/register.php';
            break;
        default:
            // Page 404 - Page non trouvée
            include '../views/notFound.php';
            break;
    }

    require_once '../components/footer.php';

    ?>

    </body>

</html>