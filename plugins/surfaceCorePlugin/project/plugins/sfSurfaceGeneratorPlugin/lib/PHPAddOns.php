<?php

/**
 * @brief Donne la class d'un objet
 * @param BaseObject $object objet dont on veut connaitre la class
 * @return string nom de la class de l'objet
 *
 * Fonction permettant de retrouver le nom de la class d'un objet.
 * Il est possible de definir une fonction getClass pour une class
 * dans ce cas la, cette fonction sera appellé et son resultat renvoyé.
 * Cela peut etre utile lorsque l'on sauvegarde le nom de la class en base de donnée
 * et que l'on joue avec l'heritage.
 * 
 */
function getclass($object){
	if(is_object($object)){
		$function = 'getClass';
		if(method_exists($object, $function)){
			return call_user_func(array($object, $function));
		}
		return get_class($object);
	}
	return null;
}

/**
 * @brief Test l'existence d'un index dans un tableau et renvoie sa valeur
 * @param mixed $index Index du tableau à verifier
 * @param array $array Le tableau
 * @param mixed $default Valeur par defaut à renvoyer
 * @param bool $unset Supprime l'élément du tableau.
 * @return mixed La valeur du tableau
 *
 */
function get($index, &$array, $default = null, $unset = false){
	if(is_array($index)){
		$tab = $array;
		$count = count($index);
		for($i = 0; $i < $count; $i++){
			$tab = get($index[$i], $tab);
			if($tab === null){
				return $default;
			}
			if($unset){
				unset($tab);
			}
		}
		if($tab !== null){
			$default = $tab;
		}
	} else if(isset($array[$index])){
		$default = $array[$index];
		if($unset){
			unset($array[$index]);
		}
	}
	return $default;
}

/**
 * @brief Fusionne les tableaux passés en parametre
 * @return array Tableau fusionné
 *
 * Fusionne des tableaux en un seul. Si ceux ci contiennent aussi des tableaux.
 * Alors ceux si seront fusionnés recursivement.
 *
 */
function array_merge_array(){
	//trigger_error('Call to deprecated function array_merge_array()', E_USER_DEPRECATED);
	$arrays = func_get_args();
	$count = func_num_args();
	if($count == 2){
		$first = func_get_arg(0);
		$second = func_get_arg(1);
		foreach($second as $index => $value_second){
			if(is_int($index)){
//				exit();
				$first[] = $value_second;
			} else {
				$value_first = isset($first[$index]) ? $first[$index] : null;
				if(is_array($value_first) && is_array($value_second)){
					$first[$index] = array_merge_array($value_first, $value_second);
				} else {
					$first[$index] = $value_second;
				}
			}
		}
		return $first;
	}
	$array_merge = array();
	for($i = 0; $i < $count - 1; $i++){
		$array_merge = array_merge_array($array_merge, $arrays[$i]);
	}
	return $array_merge;
}
