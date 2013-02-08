<?php

class sfPropelFileAssocBehavior {

	public function postSave(BaseObject $object, $con, $affectedRows) {
		/*
		  $class = get_class($object);
		  $peerClass = get_class($object->getPeer());

		  $fieldsName = sfConfig::get('propel_behavior_sfPropelPhoneticBehavior_'.$class.'_columns', array());
		  foreach ($fieldsName as $fieldName) {

		  $procFieldGet   = 'get'.call_user_func(array($peerClass, 'translateFieldName'), $fieldName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_PHPNAME);

		  // Compute the metaphone values and update object field
		  // $colName = call_user_func(array($peerClass, 'translateFieldName'), $fieldName, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
		  // if ($object->isColumnModified($colName)) {
		  $phonemeValue = Metaphone::translate($object->$procFieldGet());

		  PhonemePeer::setPhoneme($class, $object->getId(), $fieldName, $phonemeValue, $con);
		  // }
		  }
		 */
	}

	public function postDelete(BaseObject $object, $con) {
		$this->deleteAllAssociatedFiles($object);
	}

	public function getAssociatedFiles(BaseObject $object, $category = null) {
		$class = $this->getPropelFileAssocClass($object);
		$id = $object->getId();
		return ($id !== null) ? FileAssociatedPeer::doSelectFiles($class, $id, $category) : array();
	}

	public function getAssociatedFile(BaseObject $object, $category = null) {
		$class = $this->getPropelFileAssocClass($object);
		$id = $object->getId();
		return ($id !== null) ? FileAssociatedPeer::doSelectOneFile($class, $id, $category) : array();
	}


	public function getIsThereAssociatedFiles(BaseObject $object, $category = null) {
		$class = $object->getPropelFileAssocClass();
		$id = $object->getId();
		$has = false;
		if ($id !== null) {
			$files = FileAssociatedPeer::doSelectFiles($class, $id, $category);
			if (isset($files) && is_array($files) && count($files) > 0) {
				$has = true;
			}
		}
		return $has;
	}

	public function getAssociatedFilesCount(BaseObject $object, $category = null) {
		$class = $object->getPropelFileAssocClass();
		$id = $object->getId();
		$count = 0;
		if ($id !== null) {
			$files = FileAssociatedPeer::doSelectFiles($class, $id, $category);
			if (isset($files) && is_array($files)) {
				$count = count($files);
			}
		}
		return $count;
	}

	public function addAssociatedFile(BaseObject $object, $file_path, $file_name, $org_filename, $title = '', $category = null, $save = true) {
		$file_assoc = new FileAssociated();
		$file_assoc->setClassName($object->getPropelFileAssocClass());
		$file_assoc->setFieldId($object->getId());
		$file_assoc->setCategory($category);
		$file_assoc->setFilepath($file_path);
		$file_assoc->setFilename($file_name);
		$file_assoc->setOriginalFilename($org_filename);
		$file_assoc->setTitle($title);
		if($save) {
			$file_assoc->save();
		}
		return $file_assoc;
	}

	public function copyAssociatedFiles(BaseObject $object, $object_from, $category = null) {
		$object->deleteAssociatedFiles($category);
		$files = (array) $object_from->getAssociatedFiles($category);
		foreach ($files as $file) {
			$file_assoc = new FileAssociated();
			$file_assoc->setClassName($object->getPropelFileAssocClass());
			$file_assoc->setFieldId($object->getId());
			$file_assoc->setCategory($file->getCategory());
			$file_assoc->setFilepath($file->getFilepath());
			$file_assoc->setFilename($file->getFileName());
			$file_assoc->setOriginalFilename($file->getOriginalFileName());
			$file_assoc->setTitle($file->getTitle());
			$file_assoc->save();
		}
	}

	public function updateAssociatedFiles(BaseObject $object, $files, $category = null, $save = true) {
		$files = (array) $files;
		$assoc_files = array('new' => array(), 'current' => array(), 'delete' => array());
		// Delete all record not in array
		$currentFiles = $this->getAssociatedFiles($object, $category);
		//var_dump($category, $currentFiles, $files);
		$ids = array_keys($files);
		foreach ($currentFiles as $file_associated) {
			if (!in_array($file_associated->getId(), $ids)) {
				if($save) {
					$file_associated->delete();
				}
				$assoc_files['delete'][] = $file_associated;
			}
			else {
				unset($files[$file_associated->getId()]);
				$assoc_files['current'][] = $file_associated;
			}
		}

		$temp_path = sfConfig::get('sf_upload_dir') . sfConfig::get('app_sfPropelFileAssocPlugin_temp_dir') . '/';
		$path = sfConfig::get('app_sfPropelFileAssocPlugin_dir') . '/' . $object->getPropelFileAssocDirectory($object) . '/';
		$real_path = sfConfig::get('sf_upload_dir') . $path;
		@mkdir($real_path, 0777, true);

		foreach ($files as $id => $filename) {
			if (rename($temp_path . $filename, $real_path . $filename)) {
				$orgFilename = FileAssociatedPeer::getOriginalFilename($filename);
				$assoc_files['new'][] = $this->addAssociatedFile($object, $path, $filename, $orgFilename, '', $category, $save);
			}
		}
		return $assoc_files;
	}

	public function deleteAssociatedFiles(BaseObject $object, $category = null) {
		$class = $object->getPropelFileAssocClass();
		$id = $object->getId();
		return ($id !== null) ? FileAssociatedPeer::doDeleteFiles($class, $object->getId(), $category) : -1;
	}

	public function deleteAllAssociatedFiles(BaseObject $object) {
		$class = $object->getPropelFileAssocClass();
		$id = $object->getId();
		return ($id !== null) ? FileAssociatedPeer::doDeleteAllFiles($class, $object->getId()) : -1;
	}

	public function getPropelFileAssocClass(BaseObject $object) {
		return $object->getMetadata(array('file_assoc', 'class'), get_class($object));
	}

	public function getPropelFileAssocDirectory(BaseObject $object) {
		return $object->getMetadata(array('file_assoc', 'directory'), $object->getPropelFileAssocClass());
	}

}
