<?php
	$durations = SubscriptionPeer::getSubscriptionDurationLabels();
	echo surface_select_tag("subscription[duration]", options_for_select($durations, $subscription->getDuration()));
?>