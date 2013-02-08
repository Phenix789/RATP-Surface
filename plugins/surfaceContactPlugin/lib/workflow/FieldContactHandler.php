<?php
/**
 * 
 * 
 * 
 */
class FieldContactHandler extends FieldBasicHandler {
	
	protected $autocomplete;
	protected $object;
	
	public function __construct($params = array()) {
		$this->type = get('type', $params, 'contact');
		$this->label = get('label', $params, 'Contact');
		$this->class = get('class', $params, 'FieldContact');
		$this->prefixe = get('prefixe', $params, 'contact');
		$this->autocomplete = get('autocomplete', $params, 'contact/autocomplete');
		$this->object = get('object', $params, 'Contact');
	}
	
	public function initCreate(wfField $field) {
		$field->setName($this->getLabel());
		$field->setCode($this->getType());
		$field->setResume(true);
	}
	
	public function setAutocomplete($autocomplete) {
		$this->autocomplete = $autocomplete;
	}
	
	public function getAutocomplete() {
		return $this->autocomplete;
	}
	
	public function setObject($object) {
		$this->object = $object;
	}
	
	public function getObject() {
		return $this->object;
	}
	
	public function getContacts($data) {
		return call_user_func($this->getObject() . 'Peer::retrieveByPks', $data);
	}
	
/******************************************************************************/
		/******/
		/*Form*/
		/******/
/******************************************************************************/

	protected function getFormParamsEdit(wfField $field) {
		return array(
			'Type' => surface_select_tag($this->prefixe . '[type]', options_for_select($field->typeToArray(), $field->getType()))
		);
	}
	
	protected function getFormParamsShow(wfField $field) {
		return array(
			'Type' => $field->getTypeLabel()
		);
	}
	
	protected function getFormDataEdit(wfField $field) {
		if($field->isUnique()) {
			$contact = $field->getContacts();
			$contact = get(0, $contacts);
			return array(
				$field->getName() => input_auto_complete_peer_tag('data[' . $field->getCode() . ']', $contact ? $contact->getId() : null, $contact, $this->getAutocomplete())
			);
		}
		else {
			$contacts = array();
			foreach((array) $field->getContacts() as $contact) {
				$contacts[$contact->getId()] = $contact;
			}
			return array(
				$field->getName() => input_autocomplete_list_tag('data[' . $field->getCode() . ']', $contacts, $this->getAutocomplete())
			);
		}
	}
	
	protected function getFormDataShow(wfField $field) {
		$html = array();
		foreach((array) $field->getContacts() as $contact) {
			$html[] = object_surface_link_to($contact);
		}
		if(!$html) {
			$html = array(surface_null_value('Aucun contact.'));
		}
		return array($field->getName() => implode(', ', $html));
	}
	
	protected function getFormDataList(wfField $field) {
		if($html = $this->formDataView($field)) {
			return array($field->getName() => $html);
		}
		return null;
	}
	
	public function formDataView(wfField $field) {
		return implode(', ', (array) $field->getContacts());
	}

}