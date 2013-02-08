<?php

class baseSurfaceCommentActions extends autoSurfaceCommentActions {
	
	
	public function executeCreate() {
		parent::executeCreate();
		
	
		$this->sfc_comment->setObjectId($this->getRequestParameter('object_id', null));
		$this->sfc_comment->setObjectName($this->getRequestParameter('object_name', null));
		$this->sfc_comment->setDateRef(time());
	}

	public function updateSfcCommentFromRequest(){
		parent::updateSfcCommentFromRequest();
		$profile = sfContext::getInstance()->getUser()->getGuardUser()->getProfile();
		if($profile){
			$this->sfc_comment->setCollaboratorId($profile->getId());
		}
	}
	
	public function executeComment() {
		$this->setLayout(false);
		$this->sf_comments = null;
		$this->comment = null;
		
		$this->object_name = $this->getRequestParameter('object_name');
		$this->object_id = $this->getRequestParameter("object_id");
		$this->limit = $this->getRequestParameter("limit", 5);
		if($this->object_id){
			if($this->object_name){
				$this->sf_comments = SfcCommentPeer::doSelectComments($this->object_name, $this->object_id);
			}
		}
		if($this->getRequest()->getMethod() == sfRequest::POST && $this->object_name) {
			$post_comment = $this->getRequestParameter('sfc_comment');
			$this->comment = $post_comment['comment'];
			if($this->object_name && $this->comment){
				$this->sfc_comment = new SfcComment();
				$this->sfc_comment->setComment($this->comment);
				$this->sfc_comment->setObjectId($this->object_id);
				$this->sfc_comment->setObjectName($this->object_name);
				$this->collaborator = sfContext::getInstance()->getUser()->getGuardUser()->getProfile();
				if($this->collaborator){
					$this->sfc_comment->setCollaboratorId($this->collaborator->getId());
				}
				$this->sfc_comment->save();
				$this->my_comment= $this->sfc_comment;
			}
			
		}
		
		$peer = $this->object_name.'Peer';
	
		$this->object = $peer::retrieveByPk($this->object_id);
	}
	
	public function executeShow(){
		parent::executeShow();
	}
	
	public function executeCancel() {
		return sfView::NONE;
	}

	
}
