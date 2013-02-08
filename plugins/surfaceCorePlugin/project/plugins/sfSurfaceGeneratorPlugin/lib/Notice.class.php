<?php
/**
 * @brief
 * @class Notice
 *
 * @author Claude <claude@elogys.fr>
 * @date 30 juin 2010
 *
 */
class Notice {

/******************************************************************************/
		/***********/
		/*Attributs*/
		/***********/
/******************************************************************************/

	protected $text = '';
	protected $type = NOTICE_SUCCESS;
	protected $options = array();
	protected $element = NOTICE_TARGET;
	protected $is_update = false;

/******************************************************************************/
		/**************/
		/*Constructeur*/
		/**************/
/******************************************************************************/

	public function __construct($text = '') {
		$this->text = $text;
	}

/******************************************************************************/
		/******************/
		/*Getter && Setter*/
		/******************/
/******************************************************************************/

	public function setText($text) {
		$this->text = $text;
	}

	public function getText() {
		return $this->text;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function getType() {
		return $this->type;
	}

	public function setElement($element) {
		$this->element = $element;
	}

	public function getElement() {
		return $this->element;
	}

	public function setIsUpdate($is_update) {
		$this->is_update = (bool) $is_update;
	}

	public function isUpdate() {
		return $this->getIsUpdate();
	}

	public function getIsUpdate() {
		return $this->is_update;
	}

	public function setOptions($options) {
		$this->options = (array) $options;
	}

	public function getOptions() {
		return $this->options;
	}

/******************************************************************************/
		/**/
		/**/
		/**/
/******************************************************************************/



/******************************************************************************/
		/**********/
		/*toString*/
		/**********/
/******************************************************************************/

	public function __toString() {
		try {
			use_helper('Notice');
		}
		catch(Exception $e) {
			return new Exception('Une notice ne peut être transformé en chaine de caractère hors d\'un template.');
		}
		if($this->isUpdate()) {
			return notice_update_tag($this->getText(), $this->getType(), $this->getElement(), $this->getOptions());
		}
		else {
			return notice_tag($this->getText(), $this->getType(), null, $this->getOptions());
		}
	}

}