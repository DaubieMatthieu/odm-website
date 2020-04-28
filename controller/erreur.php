<?php
$error_message=urldecode($parameters[0]);
//TODO développer plusieurs action à choisir selon le type d'erreur, attention à l'AJAX
require("view/erreur.php");
