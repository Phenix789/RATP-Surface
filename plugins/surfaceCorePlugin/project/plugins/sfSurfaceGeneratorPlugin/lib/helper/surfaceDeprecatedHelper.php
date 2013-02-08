<?php
surfaceDeprecatedHelper();
//
//// Deprecated functions
//// For compatibility with old projects
//
///* Deprecated see @input_autocomplete_list_tag
// *
// */
//function input_qsearch_tag($name, $object_id, $value_array, $url_autocomplete, // url de la methode autocomplete pour afficher les reponses
//        $url_add_stack, // url de la methode a appeler pour mettre a jour la pile
//        $templateName, $tag_options = array(), $completion_options = array(), $addNew = false) {
//        $html = "";
//
//        $checkBoxName = $name . "_qsearch_checkbox";   // Id du tableau de checkbox
//        $uniqueIdField = $name . "_qsearch_unique_id";   // Id du champ qui r?coltera l'id de l'?lement s?lectionn?
//        $quickSearchField = 'searchText[' . $name . ']';       // Id du champs de saisie
//        $stackId = $name . "_qsearch_stack";       // Id de la pile
//        $text_method = _get_option($completion_options, 'text_method', '__toString');
//
//        $html .= input_hidden_tag($uniqueIdField, "none");
//
//        $url_autocomplete .= ( strrpos($url_autocomplete, "?") === false) ? '?id=' . $object_id : '&id=' . $object_id;
//        $html .= input_auto_complete_tag($quickSearchField, '',
//                        $url_autocomplete,
//                        array('autocomplete' => 'off',
//                        ),
//                        array('use_style' => true,
//                                'script' => true,
//                                'after_update_element' => "function (inputField, selectedItem) { $('" . get_id_from_name($uniqueIdField) . "').value = selectedItem.id; }"
//                        )
//        );
//
//        $addProperties = array("update" => $stackId,
//                "url" => $url_add_stack,
//                "position" => "bottom",
//                // "with"		=>	"'param='+$('".get_id_from_name($uniqueIdField)."').value+'&".$checkBoxName."='+$('".get_id_from_name($checkBoxName)."[].value')",
//                "complete" => "$('" . get_id_from_name($uniqueIdField) . "').value='none'; $('" . get_id_from_name($quickSearchField) . "').value=''"
//        );
//        if(!$addNew) {
//                $addProperties = array_merge($addProperties, array("condition" => $addNew ? "" : "$('" . get_id_from_name($uniqueIdField) . "')!='none'",
//                                "with" => "'param='+$('" . get_id_from_name($uniqueIdField) . "').value",
//                        ));
//        }
//        else {
//                $addProperties = array_merge($addProperties, array("with" => "'param='+$('" . get_id_from_name($uniqueIdField) . "').value+'&searchText='+$('" . get_id_from_name($quickSearchField) . "').value",
//                        ));
//        }
//
//        $html .= link_to_remote("Ajouter", $addProperties);
//
//
//        $html .= tag("ul", array('id' => $stackId,
//                        'class' => "autocompleteStack",
//                        ), true);
//        foreach($value_array as $key => $element) {
//                $html .= tag("li", array(), true);
//                $html .= checkbox_tag($checkBoxName . "[]", is_object($element) ? $element->getPrimaryKey() : $key, true);
//                $html .= tag("span", array(), true);
//
//                if($templateName) {
//                        $partial = get_partial($templateName, array('element' => $element));
//                        if($partial != "") $html .= $partial;
//                        else $html .= is_object($element) ? call_user_func(array($element, $text_method)) : $element;
//                }
//                else $html .= is_object($element) ? call_user_func(array($element, $text_method)) : $element;
//
//                $html .= tag("/span", array(), true);
//                $html .= tag("/li", array(), true);
//        }
//        $html .= tag("/ul", array(), true);
//
//        return $html;
//}
//
///* Deprecated see @input_autocomplete_list_tag
// *
// */
//
//function add_qsearch_item_tag($name, $templateName, $item, $options = array()) {
//        $html = "";
//
//        $checkBoxName = $name . "_qsearch_checkbox";   // Id du tableau de checkbox
//        $text_method = _get_option($options, 'text_method', '__toString');
//
//        if(isset($item)) {
//                // $tab =$_POST[$checkBoxName];
//                // On verifie si l'item existe deja
//                // $context = sfContext::getInstance();
//                // if ( ($context->getRequest()->getParameter($checkBoxName."[]", "") != "") )
//                // {
//                // $checkBoxName."[".$item->getPrimaryKey()."]"
//                // On ajoute l'item ? la liste
//                $html .= tag("li", array('class' => "freshInStack"), true);
//                $html .= checkbox_tag($checkBoxName . "[]", is_object($item) ? $item->getPrimaryKey() : $item, true);
//                $html .= tag("span", array(), true);
//
//                if($templateName) {
//                        $partial = get_partial("$templateName", array('element' => $item));
//                        if($partial != "") $html .= $partial;
//                        else $html .= is_object($element) ? call_user_func(array($element, $text_method)) : $element;
//                }
//                else $html .= is_object($element) ? call_user_func(array($element, $text_method)) : $element;
//
//                $html .= tag("/span", array(), true);
//                $html .= tag("/li", array(), true);
//                // }
//        }
//
//        return $html;
//}
//
