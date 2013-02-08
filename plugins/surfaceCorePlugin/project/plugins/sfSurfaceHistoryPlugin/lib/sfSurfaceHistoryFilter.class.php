<?php

/**
 *
 * 
 */
class sfSurfaceHistoryFilter extends sfFilter {

	public function execute($filterChain) {
		$request = $this->getContext()->getRequest();
		if ($request->getMethod() == sfRequest::POST) {
			$filterChain->execute();
			return;
		}

		if ($this->getContext()->getModuleName() != 'sfSurfaceHistoryNavigate' && $this->getContext()->getActionName() != 'permalink') {
			if ($request->hasParameter('target')) {
				$target = $request->getParameter('target');
				if (!$request->hasParameter('skipNav')) {
					$filterChain->execute();
					sfSurfaceHistory::pushUrl($target, $request->getUri());
					return;
				}
			}
		}

		$filterChain->execute();
	}

}
