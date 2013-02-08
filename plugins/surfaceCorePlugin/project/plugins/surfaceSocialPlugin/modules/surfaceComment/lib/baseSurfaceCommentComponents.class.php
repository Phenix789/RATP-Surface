<?php

class baseSurfaceCommentComponents extends autoSurfaceCommentComponents {
	
	
	public function executeListComment(){
		$this->nb_comments = SfcCommentQuery::create()->filterByObjectId($this->object->getId())->count();
		
		if(!$this->limit){
			$this->limit=5;
		}
		$this->criteria->setLimit($this->limit);
		$this->criteria->addDescendingOrderByColumn(SfcCommentPeer::ID);
		$this->comments = SfcCommentPeer::doSelect($this->criteria);
		$this->comments = array_reverse($this->comments);
		$this->nb_current_comments = count($this->comments);
	}
}