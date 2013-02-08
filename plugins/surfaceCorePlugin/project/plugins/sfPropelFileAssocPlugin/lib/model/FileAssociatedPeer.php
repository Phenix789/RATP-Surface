<?php

/**
 * Subclass for performing query and update operations on the 'file_associated' table.
 *
 *
 *
 * @package plugins.sfPropelFileAssocPlugin.lib.model
 */
class FileAssociatedPeer extends BaseFileAssociatedPeer
{
    public static function doSelectFiles($class_name, $object_key, $category = null, $con = null) {
        $criteria = new Criteria();
        $criteria->add(FileAssociatedPeer::CLASS_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(FileAssociatedPeer::FIELD_ID,   $object_key, Criteria::EQUAL);
		
		if (isset($category)) {
			$criteria->add(FileAssociatedPeer::CATEGORY, $category, Criteria::EQUAL);			
		}

        return self::doSelect($criteria, $con);
    }

    public static function doSelectOneFile($class_name, $object_key, $category = null, $con = null) {
        $criteria = new Criteria();
        $criteria->add(FileAssociatedPeer::CLASS_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(FileAssociatedPeer::FIELD_ID,   $object_key, Criteria::EQUAL);
		
		if (isset($category)) {
			$criteria->add(FileAssociatedPeer::CATEGORY, $category, Criteria::EQUAL);			
		}

        return self::doSelectOne($criteria, $con);
    }

    public static function doDeleteFiles($class_name, $object_key, $category = null, $con = null) {
        $criteria = new Criteria();
        $criteria->add(FileAssociatedPeer::CLASS_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(FileAssociatedPeer::FIELD_ID,   $object_key, Criteria::EQUAL);

		if (isset($category)) {
			$criteria->add(FileAssociatedPeer::CATEGORY, $category, Criteria::EQUAL);			
		}
		
        $files_assoc = self::doSelect($criteria, $con);
        foreach ($files_assoc as $file_assoc) {
            $file_assoc->delete();
        }
    }

    public static function doDeleteAllFiles($class_name, $object_key, $con = null) {
        $criteria = new Criteria();
        $criteria->add(FileAssociatedPeer::CLASS_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(FileAssociatedPeer::FIELD_ID,   $object_key, Criteria::EQUAL);

        // return self::doDelete($criteria, $con);
        $files_assoc = self::doSelect($criteria, $con);
        foreach ($files_assoc as $file_assoc) {
            $file_assoc->delete();
        }
    }

    public static function getNewTempFilename($filename) {
        $tempname = str_replace('.', '-', microtime(true)) . '#' . $filename;
        return $tempname;
    }

    public static function getOriginalFilename($temp_filename) {
        $result = null;
		if ($pos = strrpos($temp_filename, '|')) {
			$result = substr($temp_filename, 0, $pos);
		}
		if ($pos = strrpos($temp_filename, '#')) {
			$result = substr($temp_filename, $pos + 1);
			
		}
		return $result;
    }

}
