<?php use_helper('Cart') ?>
<td class="table_wrapper_actions">
	<div class="actions">
		<ul>
			<li>
			<?php
				echo surface_link_to('', 
					'mailling_list_contact/Unset?contact_id=' . $mailling_list_contact->getContactId() . 
						'&mailling_list_id=' . $mailling_list_contact->getMaillingListId() . '&page=' . $page,
					'tg_east', 
					true, 
					array('confirm' => __('Supprimer de la liste de diffusion')), 
					array('class' => 'sf_admin_action_delete action_img', 'title'=> 'Retirer de cette liste')
				)
			?>
			</li>
			<li>
				<?php echo cart_object_action_tag($mailling_list_contact->getContact()) ?>
			</li>
		</ul>
	</div>
</td>