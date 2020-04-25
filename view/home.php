<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="public/css/home.css" />
    <script defer type="text/javascript" src="public/js/home.js"></script>
  </head>

  <body>

    <?php include("header.php");?>

    <img onclick="jumpToAnchor('welcome');" class="scroll-icon" id="link-top" src="public/images/arrow_up.png">

    <div id="welcome">
      <div>
        <h1>L'Ordre du Malt</h1>
        <p>Slogan qui claque</p>
        <br>
        <img onclick="jumpToAnchor('content');" class="scroll-icon" id="link-content" src="public/images/arrow_down.png">
      </div>
    </div>

    <div id="content">
      <div class="space-header"></div>
      <div id="presentation" class="content-box">
        <br>
        <h1>Présentation de l'association</h1>
        <br><br>
        <p>
          Blablablablablablablablablablabla Lorem ta mère blablablablablablablablablabla blablablablablablablablablabla blablablablablablablablablabla
        </p>
      </div>

      <div class="line"></div>

      <div id="product" class="content-box">
        <h1>Evenements ?</h1>
        <p>
          Bail stylé avec des photos, peut être slider
        </p>
      </div>

      <div class="line"></div>

      <div id="about" class="content-box">
        <h1>Suivez-nous</h1>
        <br><br>
        <div id="social">
          <div id="facebook">
            <img src="public/images/facebook_icon.png">
          </div>
          <div id="instagram">
            <img src="public/images/instagram_icon.png">
          </div>
          <div id="linkedin">
            <img src="public/images/linkedin_icon.png">
          </div>
        </div>
        <p>
        </p>
      </div>
    </div>

  </body>

</html>
