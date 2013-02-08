<?php
use_helper('Date', 'ObjectSurface');

function distance_of_date_in_words($from_time, $to_time = null, $include_seconds = false) {
	$to_time = $to_time ? $to_time : time();
	$distance_in_minutes = floor(abs($to_time - $from_time) / 60);
	$distance_in_seconds = floor(abs($to_time - $from_time));
	$string = '';
	$parameters = array();
	if($distance_in_minutes <= 2879) {
		if($to_time > $from_time) {
			$string = 'aujourd\'hui';
		}
		else {
			$string = '1 day';
		}
	}
	else if($distance_in_minutes >= 2880 && $distance_in_minutes <= 43199) {
		$string = '%days% days';
		$parameters['%days%'] = round($distance_in_minutes / 1440);
	}
	else if($distance_in_minutes >= 43200 && $distance_in_minutes <= 86399) {
		$string = 'about 1 month';
	}
	else if($distance_in_minutes >= 86400 && $distance_in_minutes <= 525959) {
		$string = '%months% months';
		$parameters['%months%'] = round($distance_in_minutes / 43200);
	}
	else if($distance_in_minutes >= 525960 && $distance_in_minutes <= 1051919) {
		$string = 'about 1 year';
	}
	else {
		$string = 'over %years% years';
		$parameters['%years%'] = floor($distance_in_minutes / 525960);
	}
	if(sfConfig::get('sf_i18n')) {
		use_helper('I18N');

		return __($string, $parameters);
	}
	else {
		return strtr($string, $parameters);
	}
}

function alert_state($alert) {
	sfLoader::loadHelpers(array('Date'));
	$timeleft = distance_of_date_in_words($alert->getTriggerAt('U'), null, $include_seconds = false);
	if(!$alert->getIsActive()) {
		return '<a class="alert_flag_green" title="Acquittée"><span></span> Le ' . $alert->getAcquittedAt() . ' par ' . $alert->getAcquitter() . '</a>';
	}
	if($alert->isExpired()) {
		return '<a class="alert_flag_red" title="Dépassée"><span></span>Depuis ' . $timeleft . '</a>';
	}
	return '<a class="alert_no_flag" title="Alerte à venir"><span></span>Dans ' . $timeleft . '</a>';
}

function alert_detail($alert, $target, $detail=0, $adminCredential = 0, $collaborator_id = 0) {
	$alert_container_div = 'alert_container_' . $alert->getId();
	$alert_executer_div = 'notices';
	$updater = $alert->getUpdater();
	$recipient = $alert->getRecipient();
	$from_me = false;
	if($updater && $updater->getId() == $collaborator_id) {
		$from_me = true;
	}
	$to_me = false;
	if($recipient && $recipient->getId() == $collaborator_id) {
		$to_me = true;
	}
	$html = '<div class="alert_container" id="' . $alert_container_div . '">';
	$html .= '<div class="alert_title">';
	$html .= '<div class="alert_button">';
	$html .= link_to_acquit_alert($alert, $alert_executer_div);
	$html .= link_to_edit_alert($alert) . ' ' . link_to_delete_alert($alert, $alert_executer_div);
	$html .= '</div>';
	$html .= alert_state($alert);
	$html.='</div>';
	if($detail) {
		$object = $alert->getTargetObject();
		if(isset($object)) {
			$html .= '<div class="alert_target_object">';
			$html .= surface_link_to($object->toStringWithType(), object_surface_url_for($object), object_surface_target_for($object), true, null, array('class' => 'alert_target', 'title' => 'Voir la fiche concernée'));
			$html .= surface_link_to(content_tag('span'), object_surface_url_for($object), object_surface_target_for($object), true, null, array('class' => 'alert_zoom', 'title' => 'Voir la fiche concernée'));
			$html .= '</div>';
		}
	}
	$html .= '<div class="alert_message"><p>';
	$html .= nl2br($alert);
	$html .= '</p></div>';
	if($to_me) {
		$html .= '<div class="alert_footer" style="background-color:#2B6DA4;"><p style="color:#eaeaea">';
	}
	else {
		$html .= '<div class="alert_footer"><p>';
	}
	$dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
	$date = $alert->getUpdatedAt('d/m/Y');
	$html .= 'Le ' . $date;
	if($updater) {
		$html .= ' par ' . $updater->getFriendlyName();
	}
	if(!$recipient) {
		$html .= ' pour tout le monde';
	}
	else {
		$html .= ' pour ' . $recipient->getFriendlyName();
	}
	$html .= '</p></div><hr class="clear">';
	$html .= '</div>';
	return $html;
}

function object_alerts($object, $target, $detail=0, $adminCredential=0, $collaborator_id=0) {
	$alerts = $object->getAlerts();
	$html = '<div id="alerts_container">';
	if(isset($alerts)) {
		foreach($alerts as $alert) {
			$html .= alert_detail($alert, $target, $detail, $adminCredential, $collaborator_id);
		}
	}
	$html .= '</div>';
	return $html;
}

function warning_alerts($object) {
	$html = '';
	if($count = $object->getCountActiveExpiredAlerts()) {
		$text = $count . ' ' . (($count > 1) ? 'alertes' : 'alerte') . ' à acquitter';
		$html .= '<img alt="' . $text . '" title="' . $text . '"
                src="/sfSurfaceAlertPlugin/images/flag_red.png" />';
	}
		

	$count = $object->getCountActiveExpiredAlerts();
	if($count > 1) {
		$html .= '(' . $count . ')';
	}
	return $html;
}

function form_alert($alert=null) {
	$rank = uniqid();
	$triggeredDate = ($alert === null) ? date("Y-m-d H:i:s") : $alert->getTriggerAt("Y-m-d H:i:s");
	$message = ($alert === null) ? null : $alert->getMessage();
	$alertId = ($alert === null) ? null : $alert->getId();
	$isAcquitted = ($alert === null) ? null : $alert->getAcquittedAt() == null ? null : 1;
	$html = '<div id="' . $rank . '">';
	$html .= surface_input_tag('alerts[' . $rank . '][message]', $message, array('size' => '5'));
	$html .= surface_input_date_tag('alerts[' . $rank . '][triggeredAt]', $triggeredDate, 'rich=true withtime=true');
	$html .= surface_checkbox_tag('alerts[' . $rank . '][isAcquitted]', 1, $isAcquitted == null ? '' : 'checked');
	$html .= surface_input_hidden_tag('alerts[' . $rank . '][id]', $alertId);
	$html .= ' ' . link_to_function('<img alt="' . __('delete') . '" title="' . __('delete') . '" src="/sfSurfaceGeneratorPlugin/images/cancel.png"/>', '$(\'' . $rank . '\').remove();');
	$html .= '</div>';
	return $html;
}

function link_to_add_alert($object, $referenceDate, $objectUrl) {
	$add_url = "alert/add?modelId=" . $object->getId() .
		"&modelClass=" . urlencode(get_class($object)) .
		"&objectUrl=" . urlencode($objectUrl) .
		"&referenceDate=" . urlencode($referenceDate);
	return surface_image_actions_tag(array(
				surface_image_action(__('create'), $add_url, 'popup', 'sf_admin_action_create', true, array('popup_width' => 405, 'popup_height' => 180, 'popup_title' => "'Nouvelle alerte'"))
			));
}

function link_to_edit_alert($alert) {
	$actions = javascript_tag("onSurfaceCompleteEditSuccess = function(dlg, json) { if (json) { return true; } return false; }");
	$edit_url = "alert/edit?id=" . $alert->getId();
	$actions .= surface_link_to('<span></span>', $edit_url, "popup", true, array('popup_width' => 405,
		'popup_height' => 350,
		'popup_title' => "'Modifier une alerte'",
		'script' => true,
		'success' => 'onSurfaceCompleteEditSuccess'), array('class' => 'alert_modifier', 'title' => 'Modifier cette alerte'));
	return $actions;
}

function link_to_delete_alert($alert, $target="alerts_container") {
	return surface_link_to('<span></span>'
		, "alert/delete?id=" . $alert->getId()
		, $target
		, true, array('confirm' => 'Confirmer la suppression ?')
		, array('class' => 'alert_supprimer', 'title' => "Supprimer cette alerte"));
}

function link_to_acquit_alert(Alert $alert, $target="alerts_container", $withLabel=1) {
	$html = surface_link_to(($withLabel) ? '<span></span>Acquitter' : '<span></span>'
		, "alert/acquit?id=" . $alert->getId()
		, $target
		, true, array('confirm' => 'Confirmer l\'acquittement ?')
		, array('class' => 'alert_acquit_button', 'title' => 'Acquitter cette alerte'));
	return $html;
}

function link_to_report_alert($alert, $target="alerts_container", $days=7) {
	$html = surface_link_to('<span></span>'
		, "alert/report?id=" . $alert->getId() . "&days=" . $days
		, $target
		, true, array('confirm' => 'Confirmer le report de ' . $days . ' jours ?')
		, array('class' => 'alert_report_button', 'title' => 'Reporter cette alerte de ' . $days . ' jours '));
	return $html;
}

function link_to_acquit_alert_from_list($alert) {
	$html = surface_link_to('<img alt="' . __('acquit') . '" title="' . __('acquit') . '" src="/sfSurfaceGeneratorPlugin/images/ok.png"/>'
		, "alert/acquitFromList?id=" . $alert->getId()
		, "tg_center"
		, true, array('confirm' => "'Confirmer l\'acquittement ?'"));
	return $html;
}

function link_to_add_alerts() {
	return link_to_remote('<img alt="' . __('create') . '" title="' . __('create') . '" src="/sfSurfaceGeneratorPlugin/images/add.png"/>', array('url' => 'alert/alertForm', 'update' => 'alert_container',
		'position' => 'bottom', 'script' => true));
}

function _alert_sumup_vertical_table($data) {
    $table = '<table class="vertical">';
    $table .= '<tr><th colspan="2" class="header" >'.$data['header'].'</th></tr>
                '; //pour ne pas excéder 1000 cars par ligne
    foreach ($data['rows'] as $row) {
        foreach($row as $header => $value) {
            $table .= '<tr><th>'.$header.'</th><td>'.$value.'</td></tr>
                      '; //pour ne pas excéder 1000 cars par ligne
        }
    }
    $table .= '</table>';
    return $table;
}

function alert_sumup_vertical_table($data, $data2 = null) {
    if ($data2) {
        return '<table class="layout"><tr><td>' . _alert_sumup_vertical_table($data) .'</td>
                <td>' . _alert_sumup_vertical_table($data2) .'</td></tr></table>';        
    } else {
        return _alert_sumup_vertical_table($data);
    }    
}


function alert_sumup_horizontal_table($data) {
    $table = '<table class="horizontal"><tr>';
    foreach($data['headers'] as $header) {
        $table .= '<th>'.$header.'</th>';
    }
    $table .= '</tr>
                '; //pour ne pas excéder 1000 cars par ligne
    foreach($data['rows'] as $row) {
        $table .= '<tr>';
        foreach($row as $cell) {
            $table .= '<td>'.$cell.'</td>';
        }
        $table .= '</tr>
            '; //pour ne pas excéder 1000 cars par ligne
    }    
    $table .= '</table>';
    
    return $table;
}

function _get_sumup_section($title, $tag = 'h3') { 
        $content = '';
        switch($style) {                            
            default:
                $content .= '<br/>';
                $content = content_tag($tag, $title);
        }
        return $content;
}

function _get_sumup_row($title, $value = null, $style = 'default') { 
        if ($value) {
            $content = '';
            switch($style) {                            
                default:
                    $content = content_tag('b', $title.': ');
                    $content .= $value;
                    $content .= '<br/>';
            }
            return $content;
        }
        return '';
}

function _get_sumup_tablerow($cells = array(), $tag = 'td') { 
        $content = '';
        foreach ($cells as $cell) {
            $content .= content_tag($tag, $cell);
        }
        return content_tag('tr', $content);
}
