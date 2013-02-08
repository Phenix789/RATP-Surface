<?php
/**
 * @brief Load Sciptaculous js
 * 
 */
function use_scriptaculous() {
        $response = sfContext::getInstance()->getResponse();
        $response->addJavascript(sfConfig::get('sf_prototype_web_dir') . '/js/prototype.js', 'first');
}