<?php
echo surface_checkbox_tag('filters[is_acquitted]', 1,
                          isset($filters['is_acquitted'])&&$filters['is_acquitted']==1?true:false);
?>