<?php

//DEPRECATED ?

class sfOpenLayersMap {

	public $map_obj = null;
	public $mapserver_params = null;
	protected $merged_maps = array();
	protected $legend_options = array();
	protected $resolution = 72;
	protected $resolution_factor = 1;

	public function __construct($map_file) {
		//sfLoader 
		require_once(sfConfig::get('sf_symfony_lib_dir') . '/util/sfYaml.class.php');

		//Load params
		$this->mapserver_params = self::getMapServerParameters(sfConfig::get('sf_root_dir'));

		//Hack - pour le staging
		$map_path = sfConfig::get('sf_root_dir') . '/../sy_af25_intranet' . $this->mapserver_params['carto_path'] . '/' . $map_file;
		$this->map_obj = ms_newMapObj($map_path);

		// Init layers connections informations
		if($this->map_obj) {
			$this->initDatabaseConnections($this->mapserver_params);
		}
	}

	protected function getAboveMapObj() {
		return ($this->merged_maps ? end($this->merged_maps)->map_obj : $this->map_obj);
	}

	public function enableLayers($layer_enabled_name = array()) {
		// split using space or comma
		$layer_enabled_name = preg_split("/[\s,]+/", $layer_enabled_name);

		$layers_name = $this->map_obj->getAllLayerNames();
		foreach($layers_name as $layer_name) {
			$layer = $this->map_obj->getLayerByName($layer_name);
			if(in_array($layer_name, $layer_enabled_name)
				|| ($layer->group && in_array($layer->group, $layer_enabled_name))) {
				$layer->set("connection", $layer->connection);
				$layer->set("status", MS_ON);
			}
			else {
				$layer->set("status", MS_OFF);
			}
		}
	}

	public function addLegend($options = array()) {
		if(is_string($options)) {
			$options = sfToolkit::StringToArray($options);
		}

		if(!$this->merged_maps) {
			$map_obj = $this->getAboveMapObj();

			$options = array_merge(array('status' => MS_EMBED,
					'position' => MS_UL
					),
					$options
			);

			self::set_msobj_options(
					$map_obj->legend,
					$options
			);
		}
		else {
			$this->legend_options = array_merge(
					array(
						'status' => MS_OFF,
						'position' => MS_UL
					),
					$options
			);
		}
	}

	public function addScaleBar($options = array()) {
		if(is_string($options)) {
			$options = sfToolkit::StringToArray($options);
		}

		$map_obj = $this->getAboveMapObj();

		$outline_color = self::strip_option_color($options, 'outlinecolor', "0,0,0");
		$options = array_merge(
				array(
					'status' => MS_EMBED,
					'units' => MS_METERS,
					'intervals' => 2,
				),
				$options
		);

		self::set_msobj_options(
				$map_obj->scalebar,
				$options
		);
		if($outline_color) {
			$map_obj->scalebar->outlinecolor->setRGB(
				$outline_color['R'],
				$outline_color['G'],
				$outline_color['B']
			);
		}
	}

	public function addFeature($wkt, $options = array()) {
		if(is_string($options)) {
			$options = sfToolkit::StringToArray($options);
		}

		$map_obj = $this->getAboveMapObj();

		if($wkt) {
			$shape = ms_shapeObjFromWkt($wkt);
			if($shape) {
				switch($shape->type) {
					case MS_SHAPE_POLYGON :
						$layer_type = MS_LAYER_POLYGON;
						break;
					case MS_SHAPE_LINE :
						$layer_type = MS_LAYER_LINE;
						break;
					case MS_SHAPE_POINT :
						$layer_type = MS_LAYER_POINT;
						break;
					default :
						$layer_type = MS_SHAPE_NULL;
						break;
				}

				if($layer_type != MS_SHAPE_NULL) {
					$layer = ms_newLayerObj($map_obj);
					if($layer) {
						self::set_msobj_options(
								$layer,
								array(
									'status' => MS_ON,
									'type' => $layer_type,
								// 'opacity'           =>  MS_GD_ALPHA,
								// 'opacity'           =>  1,
								// 'name'              =>  "Sélection"
								)
						);
						$layer->addFeature($shape);

						$class = ms_newClassObj($layer);
						if($class) {
							$style = ms_newStyleObj($class);
							if($style) {
								$outline_color = self::strip_option_color($options, 'outlinecolor', "163,0,0");
								$color = self::strip_option_color($options, 'color', "163,0,0");

								$options = array_merge(
										array(
											'width' => 1,
											'opacity' => 10, //Not supported ? AGG Driver
										),
										$options
								);
								self::set_msobj_options($style, $options);

								if($outline_color) {
									$style->outlinecolor->setRGB(
										$outline_color['R'],
										$outline_color['G'],
										$outline_color['B']
									);
								}
								if($color) {
									$style->color->setRGB(
										$color['R'],
										$color['G'],
										$color['B']
									);
								}

								if($layer_type == MS_LAYER_POINT) {
									$symbol_id = ms_newSymbolObj($map_obj, "Circle");
									$symbol = $map_obj->getSymbolObjectById($symbol_id);
									if($symbol) {
										self::set_msobj_options(
												$symbol,
												array(
													'filled' => MS_TRUE,
													'type' => MS_SYMBOL_ELLIPSE,
												)
										);
										$symbol->setpoints(array(10, 10));

										self::set_msobj_options($style, array('symbol' => $symbol_id));
									}
								}
								else if($layer_type == MS_SHAPE_POLYGON) {
									$symbol_id = ms_newSymbolObj($map_obj, "Hatch");
									$symbol = $map_obj->getSymbolObjectById($symbol_id);
									if($symbol) {
										self::set_msobj_options(
												$symbol,
												array(
													'filled' => MS_TRUE,
													'type' => MS_SYMBOL_ELLIPSE, // MS_SYMBOL_VECTOR,
												)
										);
										$symbol->setpoints(array(-4, -4, 4, 4, 0, 0, -4, 4, 4, -4));

										self::set_msobj_options($style, array('symbol' => $symbol_id,
											));
									}
								}
								/*
								  else {
								  $symbol_id = ms_newSymbolObj($map_obj, "Circle");
								  $symbol = $map_obj->getSymbolObjectById($symbol_id);
								  if ($symbol) {
								  // self::set_msobj_options($symbol, $options);
								  // $symbol->setimagepath(sfConfig::get('sf_root_dir') . self::CARTO_PATH . $picture_path);
								  self::set_msobj_options($symbol, array('filled'     => MS_TRUE,
								  'type'       => MS_SYMBOL_ELLIPSE,
								  )
								  );
								  $symbol->setpoints(array(3, 3));

								  self::set_msobj_options($style, array( 'symbol'    =>  $symbol_id,
								  ));

								  }
								  }
								 */
							}
						}
					}
				}
			}
		}
	}

	public function addImage($picture_path, $ms_position = MS_CC, $delta_x = 0, $delta_y = 0, $options = array()) {
		if(is_string($options)) {
			$options = sfToolkit::StringToArray($options);
		}

		$map_obj = $this->getAboveMapObj();

		$options = array_merge(array('type' => MS_SYMBOL_PIXMAP
				),
				$options
		);

		$layer = ms_newLayerObj($map_obj);
		if($layer) {
			self::set_msobj_options(
					$layer,
					array(
						'status' => MS_ON,
						'transform' => $ms_position,
						'postlabelcache' => MS_TRUE,
						'type' => MS_LAYER_POINT,
					)
			);
			// Position
			$point = ms_newLineObj();
			$point->addXY($delta_x, $delta_y);
			$shp_position = ms_newShapeObj(MS_SHAPE_POINT);
			$shp_position->add($point);
			$layer->addFeature($shp_position);

			// Picture
			$class = ms_newClassObj($layer);
			if($class) {
				$style = ms_newStyleObj($class);
				if($style) {
					$symbol_name = $picture_path;
					$symbol_id = ms_newSymbolObj($map_obj, $symbol_name);
					$symbol = $map_obj->getSymbolObjectById($symbol_id);
					if($symbol) {
						self::set_msobj_options($symbol, $options);
						$symbol->setimagepath(sfConfig::get('sf_root_dir') . '/' . $this->mapserver_params['carto_path'] . '/' . $picture_path);


						self::set_msobj_options($style, array('symbol' => $symbol_id,
							));
					}
				}
			}
		}
	}

	public function addAnnotation($text, $ms_position = MS_CC, $delta_x = 0, $delta_y = 0, $options = array()) {
		if(is_string($options)) {
			$options = sfToolkit::StringToArray($options);
		}

		$map_obj = $this->getAboveMapObj();

		$options = array_merge(
				array(
					'type' => MS_TRUETYPE,
					'font' => "Arial",
					'size' => 8 /** $this->resolution_factor */,
					'position' => MS_UL,
					'partials' => MS_TRUE,
					'force' => MS_TRUE,
				),
				$options
		);

		$layer = ms_newLayerObj($map_obj);
		if($layer) {
			self::set_msobj_options(
					$layer,
					array(
						'status' => MS_ON,
						'transform' => $ms_position,
						'type' => MS_LAYER_ANNOTATION,
					)
			);
			// Position
			$point = ms_newLineObj();
			$point->addXY($delta_x /** $this->resolution_factor */, $delta_y /** $this->resolution_factor */);
			$shp_position = ms_newShapeObj(MS_SHAPE_POINT);
			$shp_position->add($point);
			$shp_position->set('text', $text);
			$layer->addFeature($shp_position);

			// Picture
			$class = ms_newClassObj($layer);
			if($class) {
				$outline_color = self::strip_option_color($options, 'outlinecolor', "250,250,250");
				$color = self::strip_option_color($options, 'color', "0,0,0");

				self::set_msobj_options($class->label, $options);

				if($outline_color) {
					$class->label->outlinecolor->setRGB(
						$outline_color['R'],
						$outline_color['G'],
						$outline_color['B']
					);
				}
				if($color) {
					$class->label->color->setRGB(
						$color['R'],
						$color['G'],
						$color['B']
					);
				}
			}
		}
	}

	public function setViewportExtends($ext_x1, $ext_y1, $ext_x2, $ext_y2, $width, $height = 0) {
		if(!$height) {
			$height = ($width * abs($ext_y2 - $ext_y1)) / abs($ext_x2 - $ext_x1);
		}
		$width = $width * $this->resolution_factor;
		$height = $height * $this->resolution_factor;

		$this->map_obj->setExtent($ext_x1, $ext_y1, $ext_x2, $ext_y2);
		$this->map_obj->setSize($width, $height);

		$this->map_obj->preparequery();
	}

	public function setResolution($resolution) {
		$this->resolution = $resolution;

		$resolution_base = $this->map_obj->resolution;
		$this->resolution_factor = ((double) $this->resolution) / ((double) $resolution_base);
		$this->map_obj->set('resolution', $this->resolution);
	}

	public function setViewportScale($ext_x1, $ext_y1, $ext_x2, $ext_y2, $scale, $width, $height = 0) {
		if(!$height) {
			$height = ($width * abs($ext_y2 - $ext_y1)) / abs($ext_x2 - $ext_x1);
		}
		$width = $width * $this->resolution_factor;
		$height = $height * $this->resolution_factor;
		//scale = $scale / $this->resolution_factor;

		$this->map_obj->setExtent($ext_x1, $ext_y1, $ext_x2, $ext_y2);
		$this->map_obj->setSize($width, $height);

		$point = ms_newPointObj();
		$point->setXY($width / 2, $height / 2);

		$rect = ms_newRectObj();
		$rect->setextent($ext_x1, $ext_y1, $ext_x2, $ext_y2);

		$this->map_obj->zoomscale($scale,
			$point,
			$width, $height,
			$rect);
		$this->map_obj->preparequery();
	}

	public function getViewportScale() {
		return $this->map_obj->scaledenom;
	}

	public function merge($openlayers_map) {
		$this->merged_maps[] = $openlayers_map;
	}

	public function renderHttp($base_filename = "map", $format = "jpeg", $force_download = false) {
		$mime_type = "image/" . strtolower($format);
		$filename = $base_filename . "_" . date('YmdHis') . "." . $format;

		$filepath = '/tmp/' . $base_filename . "_" . microtime(false) . "." . $format;
		if($this->renderToFile($filepath, $format)) {
			header("Content-type: " . $mime_type);
			if($force_download) {
				header("Content-type: application/force-download");
			}
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: must-revalidate, post-check=0, pre-chech=0");
			header("Content-Disposition: inline; filename=" . $filename);
			// header("Content-Disposition: attachment; filename=".$filename);
			// $image->saveImage(null, $this->map_obj);  // write to stdout
			readfile($filepath);
			@unlink($filepath);
		}

		die();
	}

	public function renderToFile($filepath, $format = "jpeg") {
		$bres = false;
		//$filepath = '/tmp/'.$base_filename."_".microtime(false).".".$format;

		$this->map_obj->selectOutputFormat($format);
		// $this->map_obj->set('resolution', 300);
		$image = $this->map_obj->draw();
		if($image) {
			$img_legends = array();
			self::set_msobj_options($this->map_obj->legend, $this->legend_options);
			$img_legends[] = $this->map_obj->drawLegend();
			// legend_options

			foreach($this->merged_maps as $merged_map) {
				self::set_msobj_options($merged_map->map_obj->legend, $this->legend_options);
				$img_legends[] = $merged_map->map_obj->drawLegend();

				$merged_map->map_obj->selectOutputFormat("png");
				// $merged_map->map_obj->set('resolution', 300);
				$image_overlay = $merged_map->map_obj->draw();
				$image->pasteImage($image_overlay, 0xFFFFFF);
			}

			if($this->legend_options) {
				$pos_x = 0;
				$pos_y = 0;
				$factor_y = 1;
				if(isset($this->legend_options['position'])) {
					switch($this->legend_options['position']) {
						case MS_UL : break;
						case MS_UR : $pos_x = ($image->width - 100);
							break;
						case MS_BL : $pos_y = ($image->height - 100);
							$factor_y = -1;
							break;
						case MS_BR : $pos_x = ($image->width - 100);
							$pos_y = ($image->height - 100);
							$factor_y = -1;
							break;
					}
				}

				foreach($img_legends as $img_legend) {
					$image->pasteImage($img_legend, -1, $pos_x, $pos_y);
					$pos_y += $factor_y * $img_legend->height;
				}
			}
			//        $this->map_obj->selectOutputFormat("jpeg");

			$image->saveImage($filepath, $this->map_obj);  // write to file
			$imagick = new Imagick();
			if($imagick) {
				$imagick->readImage($filepath);
				$imagick->setImageResolution($this->resolution, $this->resolution);
				// $imagick->resizeImage(($image->width * 72) / $this->resolution, ($image->height * 72) / $this->resolution, Imagick::FILTER_GAUSSIAN, 0.9);
				// $imagick->resampleImage($this->resolution, $this->resolution, Imagick::FILTER_GAUSSIAN, 0.9);
				$bres = $imagick->writeImage();

				$imagick->clear();
				$imagick->destroy();
			}

			if(!$bres) {
				// @unlink($filepath);
			}
		}

		return $bres;
	}

	protected function initDatabaseConnections($mapserver_params) {
		if($this->map_obj) {
			$layers_name = $this->map_obj->getAllLayerNames();
			foreach($layers_name as $layer_name) {

				$layer = $this->map_obj->getLayerByName($layer_name);
				if($layer) {
					$connection = str_replace("%database%", $mapserver_params['db_database'], $layer->connection);
					$connection = str_replace("%uid%", $mapserver_params['db_username'], $connection);
					$connection = str_replace("%passwd%", $mapserver_params['db_password'], $connection);

					$layer->set("connection", $connection);
				}
			}
		}
	}

	public function substitute_layers_variable($field, $var_name, $value) {
		if($this->map_obj) {
			$layers_name = $this->map_obj->getAllLayerNames();
			foreach($layers_name as $layer_name) {

				$layer = $this->map_obj->getLayerByName($layer_name);
				if($layer) {
					if(isset($layer->$field)) {
						$content = $layer->$field;
						if($content) {
							$content = str_replace("%" . $var_name . "%", $value, $content);
							$layer->set($field, $content);
						}
					}
				}
			}
		}
	}

	private static function set_msobj_options($ms_obj, $options) {
		foreach($options as $property_name => $value) {
			$property_name = strtolower($property_name);
			$property_name = str_replace("_", "", $property_name);
			call_user_func(array($ms_obj, 'set'), $property_name, $value);
		}
	}

	private static function strip_option($options, $key, $default_value = null) {
		if(array_key_exists($key, $options)) {
			$value = $options[$key];
			unset($options[$key]);
		}
		else {
			$value = $default_value;
		}

		return $value;
	}

	private static function strip_option_color($options, $key, $default_value) {
		$value = self::strip_option($options, $key, $default_value);
		if($value) {
			$value = array_combine(array('R', 'G', 'B'),
					explode(",", $value));
		}

		return $value;
	}

	public static function getMapServerParameters($sf_root_dir, $app = 'surface') {
		$mapserver_params = array('mapserver-bin' => null,
			'carto_path'  => null,
			'db_host'     => 'localhost',
			'db_port'     => 5432,
			'db_database' => null,
			'db_username' => null,
			'db_password' => null,
		);

		$openlayers_config = sfYAML::Load($sf_root_dir . '/plugins/sfOpenLayersPlugin/config/app.yml');
		$main_config = sfYAML::Load($sf_root_dir . '/apps/' . $app . '/config/app.yml');

		$openlayers_config = sfToolkit::arrayDeepMerge($openlayers_config, $main_config);

		if(isset($openlayers_config['all']['sf_openlayers']['mapserver-bin'])) {
			$mapserver_params['mapserver-bin'] = $openlayers_config['all']['sf_openlayers']['mapserver-bin'];
		}
		if(isset($openlayers_config['all']['sf_openlayers']['carto_path'])) {
			$mapserver_params['carto_path'] = $openlayers_config['all']['sf_openlayers']['carto_path'];
		}
		if(isset($openlayers_config['all']['sf_openlayers']['database'])) {
			$mapserver_params['db_host'] = $openlayers_config['all']['sf_openlayers']['database']['host'];
			$mapserver_params['db_port'] = $openlayers_config['all']['sf_openlayers']['database']['port'];
			$mapserver_params['db_database'] = $openlayers_config['all']['sf_openlayers']['database']['name'];
			$mapserver_params['db_username'] = $openlayers_config['all']['sf_openlayers']['database']['username'];
			$mapserver_params['db_password'] = $openlayers_config['all']['sf_openlayers']['database']['password'];
		}
		else {
			// use config/database.yml
			$databases_config = sfYAML::Load($sf_root_dir . '/config/databases.yml');

			if(isset($databases_config['all']['propel']['param']['dsn'])) {
				$params = Creole::parseDSN($databases_config['all']['propel']['param']['dsn']);
				if($params['hostspec']){
					$mapserver_params['db_host'] = $params['hostspec'];
				}
				if($params['port']){
					$mapserver_params['db_port'] = $params['port'];
				}
				if($params['database']){
					$mapserver_params['db_database'] = $params['database'];
				}
				if($params['username']){
					$mapserver_params['db_username'] = $params['username'];
				}
				if($params['password']){
					$mapserver_params['db_password'] = $params['password'];
				}				
			}
			else {
				if(isset($databases_config['all']['propel']['param']['host'])) {
					$mapserver_params['db_host'] = $database_yaml['all']['propel']['param']['host'];
				}
				if(isset($databases_config['all']['propel']['param']['port'])) {
					$mapserver_params['db_port'] = $database_yaml['all']['propel']['param']['port'];
				}
				if(isset($databases_config['all']['propel']['param']['database'])) {
					$mapserver_params['db_database'] = $database_yaml['all']['propel']['param']['database'];
				}
				if(isset($databases_config['all']['propel']['param']['username'])) {
					$mapserver_params['db_username'] = $database_yaml['all']['propel']['param']['username'];
				}
				if(isset($databases_config['all']['propel']['param']['password'])) {
					$mapserver_params['db_password'] = $database_yaml['all']['propel']['param']['password'];
				}
			}
		}

		return $mapserver_params;
	}

}
