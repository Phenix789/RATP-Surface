<?php
/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class sfPropelFileAssocActions extends sfSurfaceActions {

	public function executeFileUploader() {
		$this->setLayout(false);
		$this->name = $this->getRequestParameter('stack_items_name');
		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$fileName = $this->getRequest()->getFileName('filename');
			$tempname = FileAssociatedPeer::getNewTempFilename($fileName);
			$uploaded_file_path = sfConfig::get('sf_upload_dir') . sfConfig::get('app_sfPropelFileAssocPlugin_temp_dir') . '/' . $tempname;
			$res = $this->getRequest()->moveFile('filename', $uploaded_file_path);
			if($res && file_exists($uploaded_file_path)) {
				$this->bFileUploadSuccess = true;
				$this->orgFilename = $fileName;
				$this->tempFilename = $tempname;
			}
			else {
				$this->bFileUploadSuccess = false;          
			}
		}
	}

	public function executeDownload() {
		$this->setLayout(false);
		$file_id = $this->getRequestParameter('file_id');
		$file_assoc = FileAssociatedPeer::retrieveByPK($file_id);
		if($file_assoc) {
			
			$full_path = stripslashes($file_assoc->getFullPath());
			
			$doc_name = $file_assoc->getOriginalFilename();
			$response = $this->getResponse();
			if(substr($file_assoc->getFilename(), strlen($file_assoc->getFilename()) - 4) == '.htm' ||
				substr($file_assoc->getFilename(), strlen($file_assoc->getFilename()) - 5) == '.html') {
			}
			else {
				$response->clearHttpHeaders();
				$response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
				$response->setContentType('application/force-download', TRUE);
				$response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
				$response->setHttpHeader('Content-Disposition', 'attachment; filename="' . $doc_name . '"', TRUE);
				$response->setHttpHeader('Pragma', 'public', TRUE);
				$response->sendHttpHeaders();
			}

			readfile($full_path);
		}
		return sfView::NONE;
	}

	public function executeShow() {
		$file_id = $this->getRequestParameter('file_id');
		$file_assoc = FileAssociatedPeer::retrieveByPK($file_id);
		if($file_assoc) {
			$handle = new upload($file_assoc->getFilepath() . '/' . $file_assoc->getFilename(), 'fr_FR');
			header('Content-type: ' . $handle->file_src_mime);
			echo $handle->Process();
			return;
		}
		return sfView::NONE;
	}

	public function executeThumbnail() {
		$file_id = $this->getRequestParameter('file_id');
		$height = $this->getRequestParameter('height', 100);
		$file_assoc = FileAssociatedPeer::retrieveByPK($file_id);
		if($file_assoc) {
			$full_path = $file_assoc->getFullPath();
			$handle = new upload($full_path, 'fr_FR');
			$handle->image_resize = true;
			$handle->preserve_transparency = true;
			$handle->image_ratio_x = true;
			$handle->image_y = $height;
			header('Content-type: ' . $handle->file_src_mime);
			echo $handle->Process();
			
			die();
			return;
		}
		return sfView::NONE;
	}

}