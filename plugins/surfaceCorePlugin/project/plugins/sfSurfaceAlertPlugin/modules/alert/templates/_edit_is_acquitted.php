<?php
echo surface_checkbox_tag('alert[is_acquitted]', 1, $alert->getAcquittedAt()==null?false:true);
?>