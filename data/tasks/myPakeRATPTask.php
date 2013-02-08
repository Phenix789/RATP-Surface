<?php

pake_desc("Load csv data in database");
pake_task("ratp-load-data", "project_exists");

function run_ratp_load_data($task, $args) {
	
	//Initialize surface
	pake_surface_initialize();
	
	//Clear database
	pake_echo_comment("Clear database");
	StationTypePeer::doDeleteAll();
	StationPeer::doDeleteAll();
	TransportTypePeer::doDeleteAll();
	
	//Insert base transport type
	$types = array();
	foreach (array("bus", "metro", "rer", "tram") as $name) {
		$type = new TransportType();
		$type->setType($name);
		$type->save();
		$types[$name] = $type;
	}
	
	$stations = array();
	
	//First csv file
	$file = pake_surface_open_file("ratp_arret_ligne.csv");
	$i = 0;
	while ($line = fgetcsv($file, 0, "\t")) {
		if (isset($stations[$line[0]])) {
			$station = $stations[$line[0]];
		}
		else {
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
		}
		else {
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