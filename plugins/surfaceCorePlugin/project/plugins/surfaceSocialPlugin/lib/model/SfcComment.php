<?php


/**
 * Subclass for representing a row from the 'sfc_comment' table.
 *
 * 
 *
 * @package plugins.surfaceSocialPlugin.lib.model
 */ 
class SfcComment extends BaseSfcComment
{
		protected $object; /*	 * @var $object Objet auquel est attaché l'evenement* */

		public function getObject(){
			if(!$this->object){
				$this->object = surfaceBehavior::doSelectObject($this->getObjectId(), $this->getObjectName());
			}
			return $this->object;
		}
		
		
		public function getObjectUid(){
			return $this->getObjectName().'_'.$this->getObjectId();
		}
		

		public function getObjectMetadata($info = null, $default = null){
			if($this->getObject()){
				return $this->getObject()->getMetadata($info, $default);
			}
			if($info == 'name'){
				return __(ucwords(getclass($this->getObject())));
			}
		}
		

		public static function getConfig($class = 'default'){
			if(!$class){
				$class = 'default';
			}
			$default_config = sfConfig::get('app_sfc_comment_default', array());
			$config = sfConfig::get('app_sfc_comment_'.$class, array());
			//$final = array_merge_recursive($default_config, $config); //Not exactly what we want
			//$final = array_replace($default_config, $config);//Nope, but almost
			$final = array_merge_array($default_config, $config);//This one is worse but looks like array_merge_recursive()
			return $final;
		}

	public function getTdClass($field){
		$config = self::getConfig($this->getObjectName());
		if(get('td_class_function', $config, false) && is_callable(get('td_class_function', $config))){
			$function = get('td_class_function', $config);
			return $function($this, $field);
		}
		return null;
	}
	
	


}
