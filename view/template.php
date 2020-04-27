<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="public/css/<?=$request?>.css" />
    <script defer type="text/javascript" src="public/js/<?=$request?>.js"></script>
    <title><?=$title?></title>
  </head>

  <body>
    <?php require("header.php");?>
    <?=$content?>;
  </body>

</html>
<!--permet d'avoir un style général pour toutes les pages du site, non utilisé pour l'instant
