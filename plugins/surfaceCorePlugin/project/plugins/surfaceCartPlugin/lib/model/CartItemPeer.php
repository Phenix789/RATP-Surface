<?php
/**
 * @brief Plugin Cart
 * @class CartItemPeer
 * @package Plugin
 * @subpackage surfaceCart
 *
 * @author Claude <claude@elogys.fr>
 * @date 12 fevrier 2010
 *
 */
class CartItemPeer extends BaseCartItemPeer {

	/**
	 * @brief Selectionne l'objet associé a un item
	 * @param int $object_id id de l'objet
	 * @param string $object_name Nom de la class de l'objet
	 * @return BaseObject L'objet associé
	 * 
	 */
	public static function doSelectObject($object_id, $object_name) {
		$object = null;
		$peer = CartPeer::getPeerFromName($object_name);
		$object = call_user_func($peer . '::retrieveByPk', $object_id);
		return $object;
	}
        
        
        public static function getElementKeys($element) {
            $id = null;
            $name = null;
            $index_key = null;
            
            if(is_object($element)) {
                $id = $element->getId();
                $name = getclass($element);
            } else {
                if(is_array($element)) {
                    $id = isset($element['id']) ? $element['id'] : (isset($element[0]) ? $element[0] : null);
                    $name = isset($element['name']) ? $element['name'] : (isset($element[1]) ? $element[1] : null);
                } else {
                    //si ce n'est pas un objet ni un tableau, on suppose que c'est une clé unique
                    return $element;
                }
            } 
            
            if ($id && $name) {
                $index_key = array('name' => $name, 'id'=>$id);
            }
            
            return $index_key;
        }

}
