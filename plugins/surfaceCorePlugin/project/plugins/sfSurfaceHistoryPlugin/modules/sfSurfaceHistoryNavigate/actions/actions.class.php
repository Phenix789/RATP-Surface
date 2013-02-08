<?php

/**
 * 
 * 
 */
class sfSurfaceHistoryNavigateActions extends sfSurfaceActions{

	protected function goUrl($uri){
		if($uri){
			$uri .= ( strrpos($uri, "?") === false) ? '?skipNav=true' : '&skipNav=true';
			return $this->redirect($uri);
		}
		$this->forward('default', 'blank');
	}

	public function executePrevious(){
		$uri = null;
		$target = $this->getRequestParameter('target', "");
		if($target != ""){
			$uri = sfSurfaceHistory::getPrevUrl($target);
		}

		return $this->goUrl($uri);
	}

	public function executeNext(){
		$uri = null;
		$target = $this->getRequestParameter('target', "");
		if($target != ""){
			$uri = sfSurfaceHistory::getNextUrl($target);
		}

		return $this->goUrl($uri);
	}

	public function executeRefresh(){
		$uri = null;
		$target = $this->getRequestParameter('target', "");
		if($target != ""){
			$uri = sfSurfaceHistory::getCurrentUrl($target);
		}

		return $this->goUrl($uri);
	}

	public function executeRefreshFromTarget(){
		$uri = null;
		$target = $this->getRequestParameter('target', "");
		$from_target = $this->getRequestParameter('from_tg', "");
		if(($target != "") && ( $from_target != "")){
			$uri = sfSurfaceHistory::getCurrentUrl($from_target);
			if(($itg = strpos($uri, "/target/")) || ( $itg = strpos($uri, "?target=")) || ( $itg = strpos($uri, "&target="))){
				$before = substr($uri, 0, $itg);
				$after = substr($uri, $itg + 8);
				if($itg_param_end = strpos($after, "/")){
					$after = substr($after, $itg_param_end);
				} else {
					$after = '';
				}
				$uri = $before.$after;
			}
			$uri .= ( strrpos($uri, "?") === false) ? '?target='.$target : '&target='.$target;

			//echo $uri;
		}
		//echo "from ".$from_target."uri".$uri;

		return $this->goUrl($uri);
	}

}
