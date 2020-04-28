<?php
$content = <<<EOD
<div id="page-container">
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
