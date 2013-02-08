<?php

class sfAjaxDebugFilter extends sfWebDebugFilter
{
  /**
   * Executes this filter.
   *
   * @param sfFilterChain A sfFilterChain instance
   */
  public function execute($filterChain)
  {
    // execute this filter only once
    $bFirstCall = $this->isFirstCall();
    if ($bFirstCall)
    {
      // register sfWebDebug assets
      sfWebDebug::getInstance()->registerAssets();
    }
    
    // execute next filter
    $filterChain->execute();

    $context    = $this->getContext();
    $response   = $context->getResponse();
    $controller = $context->getController();

    // don't add debug toolbar:
    // * for XHR requests
    // * if 304
    // * if not rendering to the client
    // * if HTTP headers only
    if (
//    $this->getContext()->getRequest()->isXmlHttpRequest() ||
      strpos($response->getContentType(), 'html') === false ||
      $response->getStatusCode() == 304 ||
      $controller->getRenderMode() != sfView::RENDER_CLIENT ||
      $response->isHeaderOnly()
    )
    {
      return;
    }

    $content  = $response->getContent();
    $webDebug = sfWebDebug::getInstance()->getResults();
    
    $maxLength = sfConfig::get('app_plugin_ajaxdebug_max-text-length', 1024 * 1024);
    
    if (!$this->getContext()->getRequest()->isXmlHttpRequest()) 
    {
        // add web debug information to response content
        $newContent = str_ireplace('</body>', $webDebug.'</body>', $content);
        if ($content == $newContent) {
            // $newContent .= $webDebug;
        
            // update id 'sfWebDebug' using Ajax
            if (strlen($webDebug) < $maxLength) {
              $update  = '<script type="text/javascript">';
              $update .= "sfWebDebug = document.getElementById('sfWebDebug'); if (sfWebDebug) { sfWebDebug.innerHTML = '".escape_javascript($webDebug)."'; }";
              $update .= '</script>';
            }
            else
              $update = '';
              
            $newContent = $content.$update;
        }
    }
    else {
        $update = "";
        
        // update id 'sfWebDebug' using Ajax
        if (strlen($webDebug) < $maxLength) {
          $update  = '<script type="text/javascript">';
          $update .= "sfWebDebug = document.getElementById('sfWebDebug'); if (sfWebDebug) { sfWebDebug.innerHTML = '".escape_javascript($webDebug)."'; }";
          $update .= '</script>';
        }
        else
          $update = '';
         
        $newContent = $content.$update;
    }

    $response->setContent($newContent);
  }    
}

?>