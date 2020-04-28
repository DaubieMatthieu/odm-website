<?php $link_prefix=($is_admin)?"admin/":"";?>
<header id="header">
	<img src="public/images/odm_nom.png"></img>
	<ul id="menu">
		<li onclick="location.href='<?=$link_prefix?>accueil'">Accueil</li>
		<li onclick="location.href='<?=$link_prefix?>evenements'">Evenements</li>
		<li onclick="location.href='<?=$link_prefix?>guide'">Guide</li>
		<li onclick="location.href='<?=$link_prefix?>brassage'">Brassage</li>
		<li onclick="location.href='<?=$link_prefix?>charte_du_bon_buveur'">Charte du bon buveur</li>
		<li onclick="location.href='<?=$link_prefix?>contact'">Contact</li>
		<?=($is_admin)?"<li onclick=\"location.href='gestion'\">Gestion</li>":""?>
	</ul>
</header>
