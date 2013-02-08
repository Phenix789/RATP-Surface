<div class="about_box" style="padding:20px;text-align:center">

	<img src="/sfcThemePlugin/common/images/surface.png"/>
	<br/>

	<br/>
	<fieldset class="about" >
		<legend class="legend_title">Informations de version</legend>
		<?php if(isset($datas)): ?>
		<div class="about_content">
			<ul>
				<li>Dernière mise à jour le: <strong><?php echo $datas['sync_at'] ?></strong></li>
				<li>Mise à jour effectuée par: <strong> <?php echo $datas['sync_by'] ?></strong></li>
				<li>Serveur: <strong> <?php echo $datas['host'] ?></strong></li>
				<li>Répertoire: <strong> <?php echo $datas['dir'] ?></strong></li>
			</li>
		</div>
		<?php else: ?>
			Aucune information disponible pour le moment.
		<?php endif ?>
	</fieldset>
	<br/>

	<fieldset class="about" >
		<legend class="legend_title">Crédits</legend>
		<div class="about_content">
			Ce logiciel a été développé à l'aide du framework SURFACE<br/>

			Plus d'informations sur <a href="http://www.elogys.fr/surface" target="_blank">www.elogys.fr/surface</a><br/>
		</div>
	</fieldset>
</div>