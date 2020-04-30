<header id="header">
	<img class="odm_name_logo" src="public/images/odm_nom.png"></img>
	<ul id="menu">
		<li><a href="<?=$link_prefix?>accueil">Accueil</a></li>
		<li><a href="<?=$link_prefix?>evenements">Evenements</a></li>
		<li><a href="<?=$link_prefix?>guide">Guide</a></li>
		<li><a href="<?=$link_prefix?>brassage">Brassage</a></li>
		<li><a href="<?=$link_prefix?>charte_du_bon_buveur">Charte du bon buveur</a></li>
		<li><a href="<?=$link_prefix?>contact">Contact</a></li>
		<?php
		if ($is_admin) {
			$mode=($as_admin)?"invité":"admin";
			echo <<<EOD
			<li class="submenu-container">Gestion
				<ul class="submenu">
					<li><a href="données">Données</a></li>
					<li><a href="maintenance">Maintenance</a></li>
					<li><a onclick="switchMode()">Mode $mode</a></li>
					<li><a onclick="disconnectUser()">Déconnexion</a></li>
				</ul>
			</li>
EOD;
		}
		?>
	</ul>
</header>
