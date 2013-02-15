<?php

pake_desc("Load csv station in database");
pake_task("ratp-load-station", "project_exists");

function run_ratp_load_station($task, $args) {

	//Initialize surface
	pake_surface_initialize();

	//Clear database
	pake_echo_comment("Clear database");
	StationTypePeer::doDeleteAll();
	StationPeer::doDeleteAll();

	//Insert base transport type
	$types = array();
	foreach (TransportTypePeer::doSelect(new Criteria()) as $type) {
		$types[$type->getType()] = $type;
	}
	if (count($types) == 0) {
		throw new Exception("No transport type found");
	}

	$stations = array();

	//First csv file
	$file = pake_surface_open_file("ratp_arret_ligne.csv");
	$i = 0;
	while ($line = fgetcsv($file, 0, "\t")) {
		if (isset($stations[$line[0]])) {
			$station = $stations[$line[0]];
		} else {
			$station = new Station();
			$station->setCode($line[0]);
			$stations[$station->getCode()] = $station;
			$i++;
		}
		if (isset($types[$line[2]])) {
			$add = true;
			foreach ($station->getStationTypes() as $type) {
				if ($type->getTypeId() == $types[$line[2]]->getId()) {
					$add = false;
					break;
				}
			}
			if ($add) {
				$type = new StationType();
				$type->setTypeId($types[$line[2]]->getId());
				$station->addStationType($type);
			}
		}
	}
	pake_echo_comment("Found " . $i . " stations in first file");

	//Second csv file
	$file = pake_surface_open_file("ratp_arret_graphique.csv");
	$i = 0;
	while ($line = fgetcsv($file, 0, "\t")) {
		$station = isset($stations[$line[0]]) ? $stations[$line[0]] : null;
		if ($station) {
			$station->setGeoX($line[1]);
			$station->setGeoY($line[2]);
			$station->setName($line[3]);
			$i++;
		} else {
			pake_echo("Unknow station : " . implode(" - ", $line));
		}
	}
	pake_echo_comment("Update " . $i . " stations");

	//Save
	foreach ($stations as $station) {
		$station->save();
	}
	pake_echo_comment("Save " . count($stations) . " stations");
}

pake_desc("Load csv user in database");
pake_task("ratp-load-user", "project_exists");

function run_ratp_load_user($task, $args) {

	//Initialize Surface
	pake_surface_initialize();

	//Clear database
	pake_echo("Clear user database");
	ClientPeer::doDeleteAll();

	//Search file
	$file = pake_surface_open_file("FakeNameGenerator.com_c1458542.csv");

	//file line
	fgetcsv($file);

	while ($line = fgetcsv($file)) {

		$client = new Client();
		$client->setLastname($line[1]);
		$client->setFirstname($line[0]);
		$client->setBirthdate(strtotime($line[7]));
		$client->setAddress($line[2]);
		$client->setCity($line[3]);
		$client->setZipCode($line[4]);

		$client->save();
	}
}

pake_desc("Add x travel for any user");
pake_task("ratp-add-travel", "project_exists");

function run_ratp_add_travel() {

	//Initialize Surface
	pake_surface_initialize();
	srand(time());

	//Default params
	$timetable = range(5, 23);
	$year = date("Y");
	$month = date("n");
	$day = date("t");
	$date = new DateTime();
	
	foreach (ClientPeer::doSelectFieldValues(ClientPeer::ID) as $client) {
		pake_echo_comment("Client ID : " . $client);
		for ($i = 1; $i <= $day; $i++) {
			$date->setDate($year, $month, $i);
			$count = rand(0, 3) + rand(0, 3);
			pake_echo("Day " . $date->format("Y-m-d") . " with " . $count . " travel(s)");
			for ($j = 0; $j < $count; $j++) {
				$time = $date->format("Y-m-d") . " " . (rand(0, 9) + rand(0, 9) + 5) . ":" . rand(0, 60) . ":00";
				$time_in = strtotime($time);
				$time_out = $time_in + (rand(0, 45) + rand(0, 45)) * 60;
				
				$station_in = _ratp_get_random_station();
				$station_out = _ratp_get_random_station();
				
				$travel = new Travel();
				$travel->setClientId($client);
				$travel->setDateIn($time_in);
				$travel->setDateOut($time_out);
				$travel->setStationInId($station_in);
				$travel->setStationOutId($station_out);
				$travel->save();
				
				//pake_echo_action("Travel", date("Y-m-d - h:i", $time_in) . "/" . date("h:i", $time_out) . " // " . $station_in . " - " . $station_out);
			}
		}
	}
}

function _ratp_get_random_station() {
	$max = 44;
	$count = 0;
	while ($count == 0) {
		$distance = abs(rand(0, $max / 2) + rand(0, $max / 2) + rand(0, $max / 2) + rand(0, $max / 2) - $max);
		$sql = "SQRT(POWER(" . StationPeer::GEO_X . " - 2.34761, 2) + POWER(" . StationPeer::GEO_Y . " - 48.8578, 2)) < " . ($distance / 100.);
		$criteria = new Criteria();
		$criteria->add(null, $sql, CRITERIA::CUSTOM);
		$count = StationPeer::doCount($criteria);
		if ($count > 0) {
			$station = null;
			while ($station == null) {
				$criteria->setOffset(rand(0, $count));
				$criteria->setLimit(1);
				$station = StationPeer::doSelectPK($criteria);
				if (!empty($station)) {
					return $station[0];
				}
			}
		}
	}
}
