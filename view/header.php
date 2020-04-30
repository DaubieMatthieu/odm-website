<header id="header">
	<img class="odm_name_logo" src="public/images/odm_nom.png"></img>
	<ul id="menu">
		<?=($is_admin)?"<li onclick=\"location.href='admin/gestion'\">Gestion</li>":""?>
		<li><a href="<?=$link_prefix?>accueil">Accueil</a></li>
		<li><a href="<?=$link_prefix?>evenements">Evenements</a></li>
		<li><a href="<?=$link_prefix?>guide">Guide</a></li>
		<li><a href="<?=$link_prefix?>brassage">Brassage</a></li>
		<li><a href="<?=$link_prefix?>charte_du_bon_buveur">Charte du bon buveur</a></li>
		<li><a href="<?=$link_prefix?>contact">Contact</a></li>
	</ul>
</header>
