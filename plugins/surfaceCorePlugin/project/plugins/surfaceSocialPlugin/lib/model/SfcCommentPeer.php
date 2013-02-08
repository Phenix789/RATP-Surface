<?php


/**
 * Subclass for performing query and update operations on the 'sfc_comment' table.
 *
 * 
 *
 * @package plugins.surfaceSocialPlugin.lib.model
 */ 
class SfcCommentPeer extends BaseSfcCommentPeer
{
	
    public static function doDeleteAllComments($class_name, $object_key, $con = null) {
        $criteria = new Criteria();
        $criteria->add(self::CLASS_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(self::OBJECT_ID,   $object_key, Criteria::EQUAL);

        // return self::doDelete($criteria, $con);
        $sf_comments = self::doSelect($criteria, $con);
        foreach ($sf_comments as $sf_comment) {
            $sf_comment->delete();
        }
    }

	
    public static function doSelectComments($class_name, $object_key, $category = null, $con = null) {
        $criteria = new Criteria();
        $criteria->add(self::OBJECT_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(self::OBJECT_ID,   $object_key, Criteria::EQUAL);
		$criteria->addAscendingOrderByColumn(self::CREATED_AT);
        if ($category !== null)
            $criteria->add(self::CATEGORY,   $category, Criteria::EQUAL);

        return self::doSelect($criteria, $con);
    }
	
	
    public static function doSelectComment($class_name, $object_key, $category = null, $con = null) {
        $criteria = new Criteria();
        $criteria->add(self::OBJECT_NAME, $class_name, Criteria::EQUAL);
        $criteria->add(self::OBJECT_ID,   $object_key, Criteria::EQUAL);

        if ($category !== null)
            $criteria->add(self::CATEGORY,   $category, Criteria::EQUAL);

        return self::doSelectOne($criteria, $con);
    }

}
