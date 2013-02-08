<div class="fieldset_actions">
    <?php echo surface_image_action('Ajouter un contact a la liste de diffusion', 'mailling_list_contact/create?mailling_list_id=' . $mailling_list->getId(), 'div_add_contact', 'sf_admin_action_create' ) ?>
    <?php echo surface_image_action('Ajouter les contacts de la session à la liste de diffusion.', 'mailling_list/addContactToMaillingList?id=' . $mailling_list->getId(), 'tg_east', 'cart_download_button' ) ?>
    <?php echo surface_image_action('Ajouter les contacts de la liste de diffusion à la session.', 'mailling_list/addContactToCart?id=' . $mailling_list->getId(), 'tg_east', 'cart_upload_button' ) ?>
    
</div>
<div id="div_add_contact"></div>