<div class="bottom_actions">
	[?php if(isset($inline_editing) && $inline_editing): ?]
		<?php if($this->getParameterValue($component_generator_key.'.inline_editing.create')): ?>
			[?php
				$object = new <?php echo $this->getClassName() ?>();
				$object->setId(-1);
			?]
			<a href="#" class="action" onclick="surface.addInlineEditingRow('<?php echo $this->getModuleName() ?>', '<?php echo $component_name ?>', '[?php echo $unique_id ?]', '[?php echo $text_params ?]');return false;">
				<img src="/sfSurfaceGeneratorPlugin/images/add_icon.png" alt="Ajouter" /> Ajouter une ligne
			</a> |
		<?php endif ?>
		<a href="#" class="action" onclick="$('[?php echo $unique_id ?]_form').onsubmit();return false;">
			<input type="submit" name="[?php echo $unique_id ?]_submit" class="hidden" />
			<img src="/sfcThemePlugin/common/icons/disk.png" alt="Enregistrer" /> Enregistrer
		</a> |
		<a href="#" class="action" onclick="surface.link_to('[?php echo '<?php echo $this->getModuleName() ?>/listUpdate?name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null).'&'.$text_params ?]', '[?php echo $list_target ?]');return false;">
			<img src="/sfcThemePlugin/common/icons/canceled_g.png" alt="Annuler" width="16"/> Annuler
		</a>
	[?php else: ?]
		<a href="#" class="action" onclick="surface.link_to('[?php echo '<?php echo $this->getModuleName() ?>/listUpdate?inline_editing=1&name=<?php echo $component_name; ?>&list_target='.$list_target.'&page='.$pager->getPage().'&basket_key='.(isset($basket)? $basket->getKey() : null).'&'.$text_params ?]', '[?php echo $list_target ?]');return false;">
			<img src="/sfSurfaceGeneratorPlugin/images/edit_icon.png" alt="Modifier" /> Modifier
		</a>
	[?php endif ?]
</div>