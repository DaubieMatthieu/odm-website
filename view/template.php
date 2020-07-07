<!DOCTYPE html>
<html>
  <head>
		<base href="/odm-website/">
    <meta charset="UTF-8">
    <!--TODO<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

		<!--TODO icone de browser tab, il faudra garder uniquement celles qui sont utiles ou tout mettre à la racine-->
		<link rel="apple-touch-icon" sizes="57x57" href="public/images/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="public/images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="public/images/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="public/images/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="public/images/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="public/images/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="public/images/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="public/images/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="public/images/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="public/images/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="public/images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="public/images/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon/favicon-16x16.png">
		<link rel="manifest" href="public/images/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

    <script src="http://code.jquery.com/jquery.js"></script>

		<link rel="stylesheet" href="public/css/common.css" />
	  <script defer type="text/javascript" src="public/js/common.js"></script>

		<link rel="stylesheet" href="public/css/header.css" />
		<script defer type="text/javascript" src="public/js/header.js"></script>

    <link rel="stylesheet" href="public/css/<?=$page?>.css" />
    <script defer type="text/javascript" src="public/js/<?=$page?>.js"></script>

    <script src="https://kit.fontawesome.com/7829fa4db7.js" crossorigin="anonymous"></script>
    
    <title><?=$title?></title>

    <script>var page="<?=$page?>";</script>
  </head>

  <body>
    <div id=top></div>
    <?php require_once("header.php");?>
    <?=$content?>
  </body>

</html>
<!--permet d'avoir un style général pour toutes les pages du site-->
