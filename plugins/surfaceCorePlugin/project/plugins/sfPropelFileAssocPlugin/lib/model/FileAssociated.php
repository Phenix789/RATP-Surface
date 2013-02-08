<?php

require_once('class.upload.php');

/**
 * Subclass for representing a row from the 'file_associated' table.
 *
 * 
 *
 * @package plugins.sfPropelFileAssocPlugin.lib.model
 */ 
class FileAssociated extends BaseFileAssociated
{
    public function delete(PropelPDO $con = null) {
        $file_path = sfConfig::get('sf_upload_dir').'/'.$this->getFilepath() . '/' . $this->getFilename();
        
        try {
            parent::delete($con);
            
            @unlink($file_path);
        }
        catch (PropelException $e) {
			throw $e;
		}
    }
	
	public function isImage() {
		$extension = $this->getExtension();
		switch ($extension) {
			case 'jpeg' :
			case 'jpg' :
			case 'bmp' :
			case 'gif' :
			case 'png' :
			return true;
		}
		
		return false;
	}
  
	public function getFilename()
	{
		$filename = parent::getFilename();
		return preg_replace('/(["\'])/', '\\\\\1', $filename);
	}
	
	public function getFullPath() {
		$file_path = $this->getFilepath();
		
		if (substr($file_path, -1) != "/") { $file_path .= "/"; }
			
		return sfConfig::get('sf_upload_dir') . $file_path . $this->getFilename();
	}
	
	public function getExtension()
	{		
		return pathinfo($this->getOriginalFilename(), PATHINFO_EXTENSION);
	}
	
	/* ATTENTION TYPO MORTELLE MANQUE i à OrIginal */
	public function getOriginalFilename()
	{
		return parent::getOrginalFilename();
	}
	
	/* ATTENTION TYPO MORTELLE MANQUE i à OrIginal */
	public function setOriginalFilename($v)
	{
		return parent::setOrginalFilename($v);
	}

	public function __toString() {
		return $this->getOriginalFilename();
	}
}
