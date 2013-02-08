<?php
	echo surface_checkbox_tag("filters[inactive]",
                        '1',
                        isset($filters['inactive'])? $filters['inactive'] : false);
?>