<?php
/**
 *
 *
 */
class graphicComponents extends sfComponents {

/******************************************************************************/
		/***********/
		/*Component*/
		/***********/
/******************************************************************************/

	/**
	 * Composant principal du plugin
	 */
	public function executeStatPlugin() {
		!isset($this->options_control) ? $this->options_control = array() : null;
		!isset($this->default) ? $this->default = null : null;
	}

/******************************************************************************/
		/******************/
		/*Component Select*/
		/******************/
/******************************************************************************/

	/**
	 * Composant de selection de la vue à afficher (sous composant)
	 */
	public function executeSelect() {
		$views = ViewPeer::doSelectView();
		$this->list = array();
		foreach($views as $view) {
			$this->list[(string)$view->getId()] = $view->getName();
		}
		$this->id_select = 'select_view';
		$this->name_select = 'select_view';
		$this->default = null;
		$this->js = "surface.link_to('graphic/viewGraphic?view=' + $('" . $this->id_select . "').value, 'control_and_graphic')";
	}

/******************************************************************************/
		/*******************/
		/*Component Control*/
		/*******************/
/******************************************************************************/

	/**
	 * Composant des controles des filtres (sous composant)
	 */
	public function executeControl() {
		$this->view = $this->getRequestParameter('view', $this->default);
		$this->view = ViewPeer::retrieveByPK($this->view);
		$this->filters = null;
		if($this->view) {
			$this->filters = $this->view->getFilters();
		}
	}

/******************************************************************************/
		/*******************/
		/*Component Graphic*/
		/*******************/
/******************************************************************************/

	/**
	 * Composant de calcul de l'espace de travail et d'affichage du resultat (sous composant)
	 */
	public function executeGraphic() {
		$view_id = $this->getRequestParameter('view', $this->default);
		$this->g_view = ViewPeer::retrieveByPK($view_id);
		if($this->g_view) {
			$this->getUser()->setAttribute('stat/view', $view_id);
			$this->getUser()->setAttribute('stat/filters', $this->getRequestParameter('filters', array()));
			$this->g_view->setFiltersValues($this->getRequestParameter('filters', array()));
			$this->g_view->execute();
			$this->g_view->prepareRender();
		}
	}

}