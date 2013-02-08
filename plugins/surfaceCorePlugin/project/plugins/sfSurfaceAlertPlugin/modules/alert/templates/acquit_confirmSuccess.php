<?php
use_helper('Object', 'Validation', 'ObjectSurface', 'I18N', 'Date', 'OpenLayersObject');
use_stylesheet('/sf/sf_admin/css/main');
include_partial('alert/navigate', array('target' => $target));
?>
<div class="inner">
	<div class="section">
		<div class="title_wrapper">
			<h2 class="title_delete_confirm">
			<?php echo link_to(image_tag('/sfSurfaceGeneratorPlugin/images/theme/permalink.png'), '/default/permalink?target1='.$target.'&url1=alert|'.$action_name.'$id='.$alert->getId(), array("target"=>"_blank", "title"=>"Lien permanent")) ?>
			<?php echo __('Acquitter l\'alerte %%id%% ?', array('%%id%%' => $alert->getId())) ?>
			</h2>
		</div>
		<div class="section_inner">
			<div class="general_form">
				<?php surface_include_component('alert', 'delete_confirm_fields', array(   'alert' => $alert,'target' => $target, 'bRenderTabs' => false )) ?>
				<?php surface_include_component('alert', 'show_update_info', array(  'alert' => $alert, )) ?>
			<div>
		</div>
		<?php include_partial('alert/acquit_confirm_actions', array('alert' => $alert, 'target' => $target)) ?>
	</div>
</div>


