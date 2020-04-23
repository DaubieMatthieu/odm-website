<html>
  <head>
    <link rel="stylesheet" href="public/css/<?=$request?>.css" />
    <script defer type="text/javascript" src="public/js/<?=$request?>.js"></script>
    <title><?=$title?></title>
  </head>

  <body>
    <?php include("header.php");?>
    <?=$content?>;
  </body>

</html>
