<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
    
<?php foreach ($pageStylesheets as $stylesheet): ?>
    <link rel="stylesheet" href="<?php echo $stylesheet; ?>">
<?php endforeach; ?>
    
<?php foreach ($pageScripts as $script): ?>
    <script src="<?php echo $script; ?>"></script>
<?php endforeach; ?>

<head>
<body>
<?php
    require_once __DIR__.'/header.php';
?>