<?php
$content = <<<EOD
<div id="page-container">
  <div class="space-header"></div>
  <h1>Cette section est réservée aux administrateurs</h1>
  <h3>Veuillez vous identifier ou retourner vers une page publique</h3>
  <div class="space-header"></div>
  <form action="" id="connection_form" class="form">
    <h1>Connexion</h1>

    <div class="form-inputs">
      <label><b>Nom d'utilisateur :</b></label>
      <input type='text' name='odm_user_name' placeholder="Entrez votre nom d'utilisateur"></input>

      <label><b>Mot de passe :</b></label>
      <input type='password' name='odm_password_string' placeholder="Entrez votre mot de passe"></input>
    </div>

		<input type="submit" class='form-button form-confirm' value='Valider'>
    <p id="form-message"></p>
  </form>
</div>
EOD
?>
