<?php

/**
 * Subclass for performing query and update operations on the 'ratp_subscription' table.
 *
 * 
 *
 * @package lib.model.schema
 */
class SubscriptionPeer extends BaseSubscriptionPeer {
	
	const D_HOUR = 1;
	const D_DAY = 2;
	const D_WEEK = 3;
	const D_MONTH = 4;
	const D_YEAR = 5;
	const D_DAY_CURRENT = 6;
	const D_WEEK_CURRENT = 7;
	const D_MONTH_CURRENT = 8;
	const D_YEAR_CURRENT = 9;
	
	public static function getSubscriptionDurationLabels() {
		return array(
		    0 => "Aucune durée",
		    SubscriptionPeer::D_HOUR => "Une heure",
		    SubscriptionPeer::D_DAY => "24 heures",
		    SubscriptionPeer::D_WEEK => "Une semaine",
		    SubscriptionPeer::D_MONTH => "Un mois",
		    SubscriptionPeer::D_YEAR => "Une année",
		    SubscriptionPeer::D_DAY_CURRENT => "Journée en cours",
		    SubscriptionPeer::D_WEEK_CURRENT => "Semaine en cours",
		    SubscriptionPeer::D_MONTH_CURRENT => "Mois en cours",
		    SubscriptionPeer::D_YEAR_CURRENT => "Année en cours"
		);	
	}
	
	public static function getSubscriptionDurationLabel($duration) {
		$labels = SubscriptionPeer::getSubscriptionDurationLabels();
		return $labels[$duration];
	}
	
}
