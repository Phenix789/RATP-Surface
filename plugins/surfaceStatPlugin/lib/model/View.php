<?php
/**
 * @brief Vue
 * @class View
 * @package Plugin
 * @subpackage surfaceStatPlugin
 *
 * @author Claude <claude@elogys.fr>
 * @date 17 nov. 2009
 * @version 1.1
 * @license LGPL
 *
 */
class View extends BaseView {

	/******************************************************************************/
	/***********/
	/*Attributs*/
	/***********/
	/******************************************************************************/

	protected $options;
	protected $save;

	/******************************************************************************/
	/**************/
	/*Constructeur*/
	/**************/
	/******************************************************************************/

	/**
	 * @brief Constructeur
	 * @fn public function __construct()
	 *
	 */
	public function __construct() {
		$this->defaultOptions();
	}

	/******************************************************************************/
	/**********************/
	/** Getter && Setter **/
	/*Fonctions Racourcies*/
	/**********************/
	/******************************************************************************/
	
	/**
	 * @brief Retourne la liste des filtres
	 * @fn public function getFilters()
	 * @return array
	 *
	 */
	public function getFilters() {
		return $this->getWorksheet()->getFilters();
	}

	/**
	 * @brief Instancie les filtres avec les valeurs données
	 * @fn public function setFiltersValues($values)
	 * @param array $values valeurs des filtres
	 *
	 */
	public function setFiltersValues($values) {
		$this->getWorksheet()->setFiltersValues($values);
	}

	/**
	 * @brief Retourne le resultat du worksheet
	 * @fn public function getResult()
	 * @return Bag sac contenant toutes les valeurs du graphique
	 */
	public function getResult() {
		return $this->getWorksheet()->getResult();
	}

	/**
	 * @brief Retourne la class de l'objet (heritage/base de données)
	 * @fn public function getClass()
	 * @return string class de l'objet
	 *
	 */
	public function getClass() {
		return 'View';
	}

	/**
	 * @brief Retourne le modele de vue de l'objet
	 * @fn public function getModeleView()
	 * @return ModelView model
	 *
	 */
	public function getModelView() {
		return $this->getViewRelatedByModelViewId();
	}

	/**
	 * @brief Retourne la valeur d'une option
	 * @fn public function getOpt($name, $option = null)
	 * @param string $name nom de l'option
	 * @param mixed $option valeur par defaut
	 * @return mixed la valeur de l'option
	 *
	 */
	public function getOpt($name, $option = null) {
		if($option == null && isset($this->options[$name])) {
			$option = $this->options[$name]['default'];
		}
		if($this->hasOption($name)) {
			$option = $this->getOption($name);
		}
		else {
			$model = $this->getModelView();
			if($model) {
				$option = $model->getOpt($name, $option);
			}
		}
		if(isset($this->options[$name])) {
			$param = $this->options[$name];
			switch($param['type']) {
				case 'int' : return (int) $option;
				case 'string' : return (string) $option;
				case 'bool' : return !in_array($option, array('false', false, ''));
				case '0x' : return intval($option, 16);
			}
		}
		return $option;
	}

	/**
	 * @brief Retourne la couleur pour un index donné
	 * @fn public function getColor($index)
	 * @param int $index
	 * 
	 */
	public function getColor($index) {
		if(!$color = $this->getOpt('bar-color-' . $index)) {
			$palettes = sfConfig::get('app_surface_stat_color_palettes', array());
			$palette = get($this->getOpt('color-palette'), $palettes, get('default', $palettes, array()));
			$color = get($index, $palette, $this->getOpt('bar-color-default'));
		}
		return $color;
	}

	/**
	 * @brief Retourne l'identifiant du premier parametre
	 * @fn public function getFirstParam()
	 * @return int l'identifiant du premier parametre
	 *
	 */
	public function getFirstParam() {
		return $this->getWorksheet()->getFirstParam();
	}

	/**
	 * @brief Retourne le premier parametre
	 * @fn public function getFirstParamObject()
	 * @return DiscreteField le premier parametre
	 *
	 */
	public function getFirstParamObject() {
		return $this->getWorksheet()->getFirstParamObject();
	}

	/**
	 * @brief Retourne l'identifiant du second parametre (ou null)
	 * @fn public function getSecondParam()
	 * @return int l'identifiant du second parametre (ou null)
	 *
	 */
	public function getSecondParam() {
		return $this->getWorksheet()->getSecondParam();
	}

	/**
	 * @brief Retourne le second parametre
	 * @fn public function getSecondParamObject()
	 * @return DiscreteField le second parametre
	 *
	 */
	public function getSecondParamObject() {
		return $this->getWorksheet()->getSecondParamObject();
	}

	/**
	 * @brief Retourne les valeurs
	 * @brief public function getValues()
	 * @return array les valeurs
	 *
	 */
	public function getValues() {
		return $this->getWorksheet()->getValues();
	}

	/**
	 * @brief Retourne le nom du type de graphique
	 * @fn public function getTypeName()
	 * @return string nom du type de graphique
	 *
	 */
	public function getTypeName() {
		return e_TYPE_GRAPHIC::getName($this->getType());
	}

	/**
	 * @brief Retourne le nom du modele de vue
	 * @fn public function getModelViewName()
	 * @return string nom du modele
	 *
	 */
	public function getModelViewName() {
		return $this->getModelView() ? $this->getModelView()->getName() : '';
	}

	/**
	 * @brief Modifie le chemin de sauvegarde du fichier
	 * @fn public function setSave($path)
	 * @param string $path chemin de sauvegarde
	 *
	 */
	public function setSave($path) {
		$this->save = $path;
	}

	/**
	 * @brief toString de l'objet
	 * @fn public function __toString()
	 * @return string representation de l'objet sous forme de chaine de caractere
	 */
	public function __toString() {
		return $this->getName();
	}

	/******************************************************************************/
	/**/
	/**/
	/**/
	/******************************************************************************/

	/**
	 * @brief Lance l'execution du worksheet
	 * @fn public function execute()
	 *
	 */
	public function execute() {
		$this->getWorksheet()->execute();
	}

	/**
	 * @brief Lance le rendu de la vue
	 * @fn public function render()
	 * @return mixed rendu
	 *
	 */
	public function render() {
		return null;
	}

	/**
	 * @brief Lance le rendu de la vue pour l'export
	 * @fn public function renderToExport()
	 * @return mixed rendu
	 *
	 */
	public function renderToExport() {
		return $this->render();
	}

	/**
	 * @brief preparation pour le rendu
	 * @fn public function preparerender()
	 *
	 */
	public function prepareRender() {
//		$this->defaultOptions();
	}

	/**
	 * @brief Sauvegarde le graphique
	 * @fn protected function savegraphic()
	 * @return string nom du graphique sauvegardé
	 *
	 */
	protected function saveGraphic() {
		$rand = rand(0, 10000);
		if(!$this->save) {
			$this->save = sfConfig::get('sf_web_dir').sfConfig::get('app_surface_stat_cache_dir');
		}

		@mkdir($this->save, 0777, true);

		$file = fopen($this->save . 'graphic-' . $rand . '.png', 'w');
		if ($file !== FALSE) {
			fwrite($file, $this->render->makeChart2(PNG));
			fclose($file);
		}

		return 'graphic-' . $rand . '.png';
	}

	/******************************************************************************/
	/*********/
	/*Options*/
	/*********/
	/******************************************************************************/

	/**
	 * @brief Instancie les options par defaut
	 * @fn public function defaultOptions()
	 * @return array options par defaut
	 *
	 */
	public function defaultOptions() {
		if(!$this->options) {
			$this->options = array();
		}
		return $this->options;
	}

}

sfPropelBehavior::add('View', array('sfPropelOptionsBehavior'));
