<?php
class sfSurfaceWizardStep {

	private $datas = array();

	public function __construct($key, $val, $wizardClassName) {
		$val['key'] = $key;
		$val['wizardClassName'] = $wizardClassName;

		$this->datas = array_merge(array('notes' => "",
				'collectedDatas' => array()),
				$val);
	}

	public function getStepName() {
		return $this->datas['step_name'];
	}

	public function getTitle() {
		return get('title', $this->datas);
	}

	public function getLabel() {
		return get('label', $this->datas);
	}

	public function getUrl($withWizardName = true) {
		$url = '';
		if($withWizardName) {
			$url = $this->datas['url'] . '?use_wizard=' . $this->datas['wizardClassName'];
		}
		else {
			$url = $this->datas['url'];
		}
		$url .= '&current_step_key=' . $this->datas['key'];
		return $url;
	}

	public function getNotes() {
		return $this->datas['notes'];
	}

	public function getKey() {
		return $this->datas['key'];
	}

//	public function getWizardClassName(){
//		return $this->datas['wizardClassName'];
//	}

	public function isDisabled() {
		if(isset($this->datas['disabled']) && $this->datas['disabled'] == true) {
			return true;
		}
		return false;
	}

	public function disable() {
		$this->datas['disabled'] = true;
	}

	public function enable() {
		$this->datas['disabled'] = false;
	}

	public function isVisible() {
		if(isset($this->datas['visible']) && $this->datas['visible'] == false) {
			return false;
		}
		return true;
	}

	public function isInvisible() {
		if(isset($this->datas['visible']) && $this->datas['visible'] == false) {
			return true;
		}
		return false;
	}

	public function setVisible($flag=true) {
		if(is_bool($flag)) {
			$this->datas['visible'] = $flag;
		}
	}

	public function getDatas() {
		return $this->datas;
	}

	public function setCollectedData($key=null, $val=null) {
		if(isset($key) && isset($val)) {
			$this->datas['collectedDatas'][$key] = $val;
		}
	}

	public function setCollectedDatas($arr=null) {
		if(isset($arr) && is_array($arr)) {
			$this->resetCollectedDatas();
			$this->datas['collectedDatas'] = $arr;
		}
	}

	public function getCollectedDatas() {

		return $this->datas['collectedDatas'];
	}

	public function getCollectedData($key, &$bValueExist) {
		if(!array_key_exists($key, $this->datas['collectedDatas'])) {
			$bValueExist = false;
			return null;
		}
		else {
			$bValueExist = true;
			return $this->datas['collectedDatas'][$key];
		}
	}

	public function resetCollectedDatas() {
		$this->datas['collectedDatas'] = array();
	}

}

?>