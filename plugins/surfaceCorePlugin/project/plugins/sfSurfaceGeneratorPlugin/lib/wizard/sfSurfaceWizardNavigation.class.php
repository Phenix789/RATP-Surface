<?php

class sfSurfaceWizardNavigation{

	private $steps = array();
	private $steps_ids = array();
	private $label = "";
	private $title = "";
	private $target = "";
	private $stepCurrentIndex = 0;
	private $stepNextIndex = 1;
	private $stepPreviousIndex = -1;
	private $config_step_keys = 'steps_unknowns';
	private $bShowStepNumber = true;  ///< Show step number on wizard display
	private $bMustRedirectBefore = false;
	private $bMustRedirectAfter = false;
	//private $redirectUrlParams = '';
	private $loaded = false;

	/**
	 * Instance of the class via the singleton pattern
	 *
	 * @var    object
	 * @access private
	 */
	private static $instance;

	public static function getInstance(){
		if(!isset(self::$instance)){
			$class = __CLASS__;
			self::$instance = new $class;
		}
		return self::$instance;
	}

	public function isLoaded(){
		return $this->loaded;
	}

	public function load($wizard_name, $wizard_param, $request_from){
		// $wizardName = $request_from->getParameter('use_wizard');
		$init = $request_from->getParameter('init', 0);
		if(!isset($wizard_param['target'])){
			$wizard_param['target'] = $request_from->getParameter('target', 'tg_center');
		}
		$this->setWizardConfig($wizard_name, $wizard_param, $init);

		$this->loaded = true;

		$this->stepCurrentIndex = $request_from->getParameter('current_step_key', 1) - 1;
		$this->stepNextIndex = $this->stepCurrentIndex + 1;
		$this->stepPreviousIndex = $this->stepCurrentIndex - 1;

		for($i = $this->stepCurrentIndex + 1; $i < count($this->steps_ids); $i++){
			$step = $this->getStepByIndex($i);
			if(isset($step)){
				$step->enable();
				$step->resetCollectedDatas();
			}
		}

		$this->bMustRedirectAfter = true;
	}

	public function save(){
		$user = sfContext::getInstance()->getUser();
		$user->setAttribute('steps', $this->dumpSteps(), $this->config_step_keys);
	}

	protected function setSteps($steps, $wizControllerClassname){
		if(is_array($steps)){
			$index = 0;
			foreach($steps as $key => $val){
				$this->steps[$key] = new sfSurfaceWizardStep($index + 1, $val, $wizControllerClassname);
				$index += 1;
			}
		}
		$this->steps_ids = array_keys($this->steps);
	}

	protected function dumpSteps(){
		$arr = array();
		foreach($this->steps as $key => $step){
			$arr[$key] = $step->getDatas();
		}

		return $arr;
	}

	public function getStepByIndex($stepIndex = null){
		if(isset($stepIndex) && isset($this->steps_ids[$stepIndex]) && isset($this->steps[$this->steps_ids[$stepIndex]])){
			return $this->steps[$this->steps_ids[$stepIndex]];
		} else {
			return null;
		}
	}

	public function getCurrentStep(){
		return $this->getStepByIndex($this->stepCurrentIndex);
	}

	public function getPreviousStep(){
		$prevStep = null;
		$i = $this->stepCurrentIndex - 1;
		while(($i >= 0) && !$prevStep){
			$step = $this->getStepByIndex($i);
			if($step && $step->isVisible() && !$step->isDisabled()){
				$prevStep = $step;
			}

			$i -= 1;
		}

		return $prevStep;
	}

	public function getNextStep(){
		return $this->getStepByIndex($this->stepCurrentIndex + 1);
	}

	protected function setWizardConfig($wizardName, $wizardParams, $bInit){
		$this->config_step_keys = $wizardName;
		$this->bShowStepNumber = (isset($wizardParams['showStepNumber']) ? $wizardParams['showStepNumber'] : true);
		$this->title = (isset($wizardParams['title']) ? $wizardParams['title'] : "");
		$this->label = (isset($wizardParams['label']) ? $wizardParams['label'] : "");
		$this->target = (isset($wizardParams['target']) ? $wizardParams['target'] : "");

		if($bInit){
			$this->setSteps((isset($wizardParams['steps']) ? $wizardParams['steps'] : array()), $wizardName);
		} else {
			$user = sfContext::getInstance()->getUser();
			$this->setSteps($user->getAttribute('steps', (isset($wizardParams['steps']) ? $wizardParams['steps'] : array()), $this->config_step_keys), $wizardName);
		}
		$this->save();
	}

	public function getTitle(){
		return $this->title;
	}

	public function getLabel(){
		return $this->label;
	}

	public function isStepNumberShown(){
		return $this->bShowStepNumber;
	}

	public function getTarget(){
		return $this->target;
	}

	public function mustRedirectBeforeAction($b){
		$this->bMustRedirectBefore = $b;
		return $this->bMustRedirectBefore;
	}

	public function mustRedirectAfterAction($b){
		$this->bMustRedirectAfter = $b;
		return $this->bMustRedirectAfter;
	}

	public function redirectNext($action){
		if($this->bMustRedirectAfter){
			$nextStep = $this->getStepByIndex($this->stepNextIndex);
			if($nextStep){
				$url = $nextStep->getUrl();
				$url .= "&target=".$this->target;
				$action->redirect($url);
			}
		}
	}

	public function redirectPrevious($action){
		if($this->bMustRedirectAfter){
			$previousStep = $this->getStepByIndex($this->stepPreviousIndex);
			if($previousStep){
				$url = $previousStep->getUrl();
				$url .= "&target=".$this->target;
				$action->redirect($url);
			}
		}
	}

	public function setNextStep($step_id){
		$step_index = array_search($step_id, $this->steps_ids);
		$this->stepNextIndex = $step_index;
		for($i = $this->stepCurrentIndex + 1; $i < $this->stepNextIndex; $i++){
			$step = $this->getStepByIndex($i);
			if($step){
				$step->disable();
			}
		}
		$this->bMustRedirectAfter = true;
		$this->save();
	}

	public function getVisibleStepsInfo(){
		$tmpSteps = array();

		$dispIndex = 0;
		$bStepDone = true;

		foreach($this->steps_ids as $index => $step_id){
			$stepPos = '';
			if($index == $this->stepCurrentIndex){
				$stepPos = 'current';
			} else if($index < $this->stepCurrentIndex){
				$stepPos = ($index == ($this->stepCurrentIndex - 1)) ? 'lastDone' : 'done';
			}

			$step = $this->steps[$step_id];
			if($step && $step->isVisible()){
				$tmpSteps[] = array('step' => $step, 'stepFlag' => array($stepPos));
			}
		}

		$last = end($tmpSteps);
		if(isset($last)){
			$last['stepFlag'][] = 'mainNavNoBg';
		}

		return $tmpSteps;
	}

	public function setCollectedData($key, $value, $stepIndex = null){
		if(!isset($stepIndex)){
			//print_r($this);
			$step = $this->getCurrentStep();
		} else {
			$step = $this->getStepByIndex($stepIndex);
		}

		if(isset($step)){
			$step->setCollectedData($key, $value);
		}

		$this->save();
	}

	public function getCollectedData($key, $def_value = null, $stepIndex = null){
		if(!isset($stepIndex)){
			$stepIndex = $this->stepCurrentIndex;
		}

		$data = null;
		$bValueFound = false;
		do{
			$step = $this->getStepByIndex($stepIndex);
			if(isset($step)){
				$data = $step->getCollectedData($key, $bValueFound);
			}
			$stepIndex--;
		} while((!$bValueFound) && ($stepIndex >= 0));

		return $bValueFound ? $data : $def_value;
	}

}

?>