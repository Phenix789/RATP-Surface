<?php
/**
 * 
 * 
 * 
 */

pake_desc('Envoi par mail des alertes actives à leur destinataire');
pake_task('alert-send');

function run_alert_send($task, $args) {
	pake_surface_initialize(pake_surface_get_argument(0, $args));
	pake_surface_helper('Url', 'Alert');
	
	$config = sfConfig::get('app_alert_cli');
	
	pake_echo_action('Retrieve', 'Retrieve alerts');
	$criteria = new Criteria();
	$criteria->add(AlertPeer::ACQUITTED_AT, null, Criteria::ISNULL);
	$criteria->add(AlertPeer::RECIPIENT_ID, 0, Criteria::GREATER_THAN);
	$criteria->add(AlertPeer::TRIGGER_AT, time(), Criteria::LESS_EQUAL);
	$criteria->add(AlertPeer::SENT, null, Criteria::ISNULL);
	$criteria->addAscendingOrderByColumn(AlertPeer::TRIGGER_AT);
	$alerts = AlertPeer::doSelect($criteria);
	
	pake_echo_comment(count($alerts) . ' alerts found');
	foreach($alerts as $alert) {
		if($collaborator = $alert->getRecipient()) {
			if($collaborator->getEmail()) {
				pake_echo_action('Mail', 'mail sending to ' . $collaborator);
		
				$mail = new sfMail();
				$mail->initialize();
				$mail->setCharset('utf-8');
				$mail->setContentType('text/html');
				//*
				$mail->setMailer('sendmail');
				/*/
				$mail->setMailer('smtp');
				$mail->setHostname(sfConfig::get('app_pack_mail_host'));
				$mail->setUsername(sfConfig::get('app_pack_mail_username'));
				$mail->setPassword(sfConfig::get('app_pack_mail_password'));
				//*/
                                
                                $mail->setFrom(get(array('from', 'email'), $config, 'alert@elogys.fr'), get(array('from', 'name'), $config, 'Alertes'));
                                
                                $mail->setSender(get(array('sender', 'email'), $config, 'alert@elogys.fr'), get(array('sender', 'name'), $config, 'Alertes'));
                                
				$mail->addAddress($collaborator->getEmail(), $collaborator);
				
				$mail->addBcc('alertes-projet@elogys.fr', $collaborator);
				
				$mail->setSubject(_alert_mail_title($alert, $config));
			
				$mail->setBody(_alert_mail_body($alert, $config));
								
				try {
					$mail->send();
					$alert->setSent(time());
					$alert->setSkipEdited(true);
					pake_surface_save($alert, $e, null, array('echo' => false));
				}
				catch(sfException $e) {
					pake_echo_action('Sending', 'Error!' . $e);
					pake_echo_comment('Error when sending!!');
				}
			}
			else {
				pake_echo_action('Email', $collaborator . ' has not email');
			}
		}
		else {
			pake_echo_action('Unfound', 'Collaborator with id \'' . $alert->getRecipientId() . '\' not found.');
		}

	}
}

function _alert_mail_title(Alert $alert, $config) {
	$prefix = get('mail_prefix', $config, null);        
	$title = ($prefix) ? $prefix . " " : '';
        		
	if($object = $alert->getTargetObject()) {
		$title .= $object->getTitleForAlert() . " > " . $alert->getMessage();
	} else {
		$title .= $alert->getMessage();
	}
	return $title;
}

function _alert_mail_body(Alert $alert, $config) {
	$host = get('host', $config);
        
        sfLoader::loadHelpers(array('Helper', 'Tag', 'Alert'));
        $object = $alert->getTargetObject();
        
        $styles = sfConfig::get('app_surface_html_sumup_styles', ' <style>
                        body, th, td, p { font-weight:normal; font-size:12px; padding:2px;}

                        h3 { color: #999; }

                        th { font-weight:normal;  background:#f4f4f4; color:#999; }
                        table.horizontal { width:100% }
                        table.vertical { width:400px; }
                        table.vertical, table.vertical th, table.vertical td {  border:1px solid #eee; }
                        table.horizontal, table.horizontal th, table.horizontal td {  border:1px solid #eee; }
                        table.vertical th { text-align : right; font-weight:normal;  background:#f4f4f4; }
                        table.vertical th.header { text-align : center; }

                        table.layout, table.layout td, table.layout th  { vertical-align:top; }
                    </style>');
        
        $content = $styles;
        
        $content .= '<br/>';
        
        if($object) {
                $content .= content_tag('b', 'Concerne: ');
                
		$url = 'http://' . $host . '/' . $object->getMetadata('app') . '.php/permalink/' . $object->getMetadata(array('target', 'show'), 'tg_east') . '/' . str_replace(array('/', '?', '&'), array('|', '$', '&'), object_surface_url_for($object));
		$content .= link_to($object->getTitleForAlert(), $url);
                $content .= '<br/>';
	}
        
        $content .= '<br/>';
        $content .= content_tag('b', 'Message: ');
        $content .= $alert->getMessage();
        $content .= '<br/>';
        
        if ($object && $object->getSumupForAlert()) {
            $content .= $object->getSumupForAlert();            
        }
        
        $content .= '<br/>';
        
        $signature = '';
        if ($updater = $alert->getUpdater()) {
            $signature = sprintf('par %s pour %s, le %s ',  
                                    '<a href="mailto:'.$updater->getEmail().'">'.$updater.'</a>',
                                    $alert->getRecipient(), 
                                    $alert->getUpdatedAt('d/m/Y'));
        } else {
            $signature = sprintf('pour %s, le %s ',                                    
                                    $alert->getRecipient(), 
                                    $alert->getUpdatedAt('d/m/Y'));
        }
        $content .= content_tag('small', content_tag('em', 'Alerte définie ' . $signature));
        $content .= '<br/>';
        $content .= '<br/>';
        $content .= link_to('Se connecter', 'http://' . $host) . tag('br');
        
        return $content;
}
