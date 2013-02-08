<?php

function opendoc_insert_image($picture_path, $options = array()){
	$context = sfContext::getInstance();

	$sf_view = $context->getCurrentViewInstance();
	// $sf_action = $context->getActionStack()->getLastEntry()->getActionInstance();

	$sf_ooffice_out_dir = $sf_view->getAttribute('sf_ooffice_out_dir');

	// Copy the picture in sf_ooffice_out_dir/Pictures/
	@mkdir($sf_ooffice_out_dir.DIRECTORY_SEPARATOR.'Pictures');

	$internal_picture_name = 'Image'.rand(0, 1000);
	copy($picture_path, $sf_ooffice_out_dir.DIRECTORY_SEPARATOR.'Pictures'.DIRECTORY_SEPARATOR.$internal_picture_name);

	$content = '<draw:frame draw:name="'._get_option($options, 'name', $internal_picture_name).'"'.
			' text:anchor-type="'._get_option($options, 'anchor', 'as-char').'"'.
			' svg:width="'._get_option($options, 'width', 16.5).'cm"'.
			' svg:height="'._get_option($options, 'height', 11).'cm"'.
			' draw:z-index="'._get_option($options, 'zindex', 0).'"'.
			'>';
	$content .= '<draw:image xlink:href="Pictures/'.$internal_picture_name.'"'.
			' xlink:type="simple" xlink:show="embed" xlink:actuate="onLoad"/>';
	$content .= '</draw:frame>';

	echo $content;
}

class OpenOfficeImage{
	protected $content;
	protected $file_path;

	public function __construct($file_path){
		$this->file_path=$file_path;
	}

	public function begin(){
		ob_flush();
		ob_start();
	}

	public function end(){
		$this->content = ob_get_clean();
	}
}