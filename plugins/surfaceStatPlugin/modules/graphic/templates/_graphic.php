<?php
/**
 * @brief Vue du graphic
 * @author Claude <claude@elogys.fr>
 */

 /**
  * Attributs :
  * @param View $g_view Objet representant la vue du graphique
  */
?>
<div class="stats_results general_form">
	<?php if($g_view) : ?>
		<?php if($g_view->getType() != e_TYPE_GRAPHIC::TABS) : ?>
			<?php use_helper('ChartDirector') ?>
			<h3><a href="#final_graphic" class="gexpander">Graphique : <?php echo $g_view->getName() ?></a></h3>
			<div id="final_graphic">
			<?php echo chartdirector_display($g_view->getOpt('size-x'), $g_view->getOpt('size-y'), sfConfig::get('app_surface_stat_cache_dir') . $g_view->render()); ?>
			</div>
		<?php else : ?>
			<?php use_helper('SRender') ?>
			<h3><a href="#final_graphic" class="gexpander">Tableau : <?php echo $g_view->getName() ?></a></h3>
			<div id="final_graphic">
			<div class="table_wrapper" style="overflow:auto;">
				<table id="table_graphic" class="sortable">
				<thead><?php echo table_line_render($g_view->getNextLine()) ?></thead>
				<tbody>
				<?php while($line = $g_view->getNextLine()) : ?>
					<?php echo table_line_render($line, $g_view->getOptionsView()) ?>
				<?php endwhile ?>
				</tbody>
				<tfoot><?php echo table_line_render($g_view->getTotalLine(), $g_view->getOptionsView()) ?></tfoot>
				</table>
			</div>
			</div>
		<?php endif ?>
	<?php endif ?>
</div>
<br/>
<?php if($g_view) : ?>
	<?php echo surface_button_tag('Exporter', 'graphic/export', array('class' => 'sf_admin_action_save')) ?>
<?php endif ?>
<?php echo javascript_tag("gWidget_InitPane('final_graphic');") ?>

