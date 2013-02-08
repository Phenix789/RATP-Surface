<?php use_helper('Javascript', 'surface', 'Menu') ?>
<div id="sudo_success">
	<ul class="system_messages">
		<li class="green">
			<span class="ico"></span><strong><?php echo $text ?></strong>
		</li>
	</ul>
</div>
<?php echo menu_update_tag('user_navigation') ?>
<?php echo javascript_tag("$('sudo_success').fade({duration: 2.0, from: 1, to: 0})"); ?>