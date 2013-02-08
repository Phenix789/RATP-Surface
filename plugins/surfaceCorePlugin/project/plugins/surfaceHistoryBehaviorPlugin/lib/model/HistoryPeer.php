<?php
/**
 *
 *
 */
class HistoryPeer extends BaseHistoryPeer {

	public static function doSelectObject($object_id, $object_name) {
		trigger_error('DEPRECATED: Use surfaceBehavior::doSelectObject instead', E_USER_DEPRECATED);
		return surfaceBehavior::doSelectObject($object_id, $object_name);
	}

	/**
	 * Get the list of all the classes of the related objects linked to history
	 * @return array;
	 */
	public static function getObjectNames(){
		$stmt = Propel::getConnection()->prepare("SELECT object_name FROM plugin_history GROUP BY object_name");
		if(!$stmt->execute()){
			return array();
		}
		$classes = array();
		while($row = $stmt->fetch()){
			$class = $row[0];
			$peer_class = $class.'Peer';
			if(!class_exists($peer_class)){
				continue;
			}
			$name = $peer_class::getMetadata('name');
			if(is_array($name)){
				$name = array_pop($name);
			}
			if(!$name){
				$name = $class;
			}
			$classes[$class] = __($name);
		}
		return $classes;
	}

}
