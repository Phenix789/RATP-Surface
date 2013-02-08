<?php

/*
 * This file is part of the surface plugin.
 * (c) 2008 Alexandre Prudent <aprudent@elogys.com>
 * 
 */

/**
 * sfRichTextEditorSurfaceTinyMCE implements the TinyMCE rich text editor to use with surface generator.
 *
 * <b>Options:</b>
 *  - css - Path to the TinyMCE editor stylesheet
 *
 *    <b>Css example:</b>
 *    <code>
 *    / * user: foo * / => without spaces. 'foo' is the name in the select box
 *    .foobar
 *    {
 *      color: #f00;
 *    }
 *    </code>
 *
 * @package    symfony
 * @subpackage helper
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfRichTextEditorTinyMCE.class.php 3284 2007-01-15 19:05:48Z fabien $
 */
class sfRichTextEditorSurfaceTinyMCE extends sfRichTextEditor {

	/**
	 * Returns the rich text editor as HTML.
	 *
	 * @return string Rich text editor HTML representation
	 */
	public function toHTML() {
		$options = $this->options;

		// we need to know the id for things the rich text editor
		// in advance of building the tag
		$id = _get_option($options, 'id', $this->name);

		// use tinymce's gzipped js?
		$tinymce_file = _get_option($options, 'tinymce_gzip') ? '/tiny_mce_gzip.php' : '/tiny_mce.js';

		// tinymce installed?
		$js_path = sfConfig::get('sf_rich_text_js_dir') ? '/' . sfConfig::get('sf_rich_text_js_dir') . $tinymce_file : '/sf/tinymce/js' . $tinymce_file;
		if (!is_readable(sfConfig::get('sf_web_dir') . $js_path)) {
			throw new sfConfigurationException('You must install TinyMCE to use this helper (see rich_text_js_dir settings).');
		}

		sfContext::getInstance()->getResponse()->addJavascript($js_path);

		use_helper('Javascript');

		$tinymce_options = '';
		$style_selector = '';

		// custom CSS file?
		if ($css_file = _get_option($options, 'css')) {
			$css_path = stylesheet_path($css_file);

			sfContext::getInstance()->getResponse()->addStylesheet($css_path);

			$css = file_get_contents(sfConfig::get('sf_web_dir') . DIRECTORY_SEPARATOR . $css_path);
			$styles = array();
			preg_match_all('#^/\*\s*user:\s*(.+?)\s*\*/\s*\015?\012\s*\.([^\s]+)#Smi', $css, $matches, PREG_SET_ORDER);
			foreach ($matches as $match) {
				$styles[] = $match[1] . '=' . $match[2];
			}

			$tinymce_options .= '  content_css: "' . $css_path . '",' . "\n";
			$tinymce_options .= '  theme_advanced_styles: "' . implode(';', $styles) . '"' . "\n";
			$style_selector = 'styleselect,separator,';
		}

		$culture = sfContext::getInstance()->getUser()->getCulture();

		$tinymce_js = '
			tinyMCE.init({
			  mode : "exact",
			  elements: "' . get_id_from_name($id, null) . '",
			  language: "' . strtolower(substr($culture, 0, 2)) . '",
			  theme : "advanced",
			  theme_advanced_toolbar_location: "top",
			  theme_advanced_toolbar_align: "left",
			  theme_advanced_buttons1: "' . $style_selector . 'justifyleft,justifycenter,justifyright,justifyfull,separator,bold,italic,underline,strikethrough,separator,sub,sup,separator,charmap,hr",
			  theme_advanced_buttons2: "bullist,numlist,separator,outdent,indent,separator,undo,redo,separator,cleanup,removeformat",
			  theme_advanced_buttons3: ""
			  ' . ($tinymce_options ? ',' . $tinymce_options : '') . '
			  ' . (isset($options['tinymce_options']) ? ',' . $options['tinymce_options'] : '') . '
			});';

		if (isset($options['tinymce_options'])) {
			unset($options['tinymce_options']);
		}

		return
		// content_tag('script', javascript_cdata_section($tinymce_js), array('type' => 'text/javascript')).
		javascript_tag($tinymce_js, array()) .
		content_tag('textarea', $this->content, array_merge(array('name' => $this->name, 'id' => get_id_from_name($id, null)), _convert_options($options)));
	}

}
