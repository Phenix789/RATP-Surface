<?php

include_once(dirname(__FILE__) . '/../lib/baseSurfaceCommentActions.class.php');
class surfaceCommentActions extends baseSurfaceCommentActions {

//	
//	public function executeShow() {
//		$comment_id = $this->getRequestParameter('comment_id');
//		
//		if($sf_comment = sfCommentPeer::retrieveByPK($comment_id)) {
//			echo $sf_comment->getComment();
//			return;
//		}
//		return sfView::NONE;
//	}
//	
	public function executeBlank() {
		$id = $this->getRequestParameter('id');
		$sfcComment = SfcCommentPeer::retrieveByPK($id);
		if(!$sfcComment){
			$target = explode('_', $this->getRequestParameter('target'));
			$this->object_id = array_pop($target);
			$this->object_name = array_pop($target);
		} else {
			if($sfcComment->getObject()){
				$this->object_id = $sfcComment->getObject()->getId();
				$this->object_name = getclass($sfcComment->getObject());
			}
		}
		if($this->object_id && $this->object_name) {
			return sfView::SUCCESS;
		}
		return sfView::NONE;
	}
	
}
