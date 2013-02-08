<?php
/**
 *
 * 
 */
class sfSurfaceHistory {

        const MAX_TARGET_REQUEST = 10;

        public static function debug() {
                echo '<pre>';

                echo 'tg_center<BR />';
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . 'tg_center]', '', 'sfSurfaceHistoryPlugin');
                print_r($history);

                echo 'tg_east<BR />';
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . 'tg_east]', '', 'sfSurfaceHistoryPlugin');
                print_r($history);

                echo '</pre>';
        }

        public static function pushUrl($target, $url) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                $current = $history['current'];
                if($current < (count($history['url']) - 1)) {
                        $history['url'] = array_slice($history['url'], 0, $current + 1);
                        $history['url'] = array_values($history['url']);
                }

                if(!isset($history['url'][$current]) || ( $history['url'][$current] != $url)) {
                        $history['current'] += 1;
                        $history['url'][$history['current']] = $url;
                }

                $count = count($history['url']);
                if($count > self::MAX_TARGET_REQUEST) {
                        $history['url'] = array_slice($history['url'], $count - self::MAX_TARGET_REQUEST, self::MAX_TARGET_REQUEST);
                        $history['current'] = self::MAX_TARGET_REQUEST - 1;
                }

                sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
        }

        public static function getHistory($target) {
                return sfContext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
        }

        public static function getCurrentUrl($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                return isset($history['url'][$history['current']]) ? $history['url'][$history['current']] : null;
        }

        public static function getPrevUrl($target, $index = 1) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                if($history['current'] > ($index - 1)) {
                        $history['current'] -= $index;
                        sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
                }

                return isset($history['url'][$history['current']]) ? $history['url'][$history['current']] : null;
        }

        public static function getNextUrl($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                if($history['current'] < (count($history['url']) - 1)) {
                        $history['current'] += 1;
                        sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
                }

                return isset($history['url'][$history['current']]) ? $history['url'][$history['current']] : null;
        }

        public static function getFirstUrl($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                if($history['current'] >= 0) {
                        $history['current'] = 0;
                        sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
                        return $history['url'][0];
                }

                return null;
        }

        public static function getLastUrl($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                if(count($history['url']) > 0) {
                        $history['current'] = count($history['url']) - 1;
                        sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
                        return $history['url'][$history['current']];
                }

                return null;
        }

        public static function removeUrl($target, $url) {
                if($url) {
                        $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                        if($history) {
                                $index = 0;
                                $newHistory = array('current' => $history['current'], 'url' => array());
                                foreach(($history['url']) as $val) {
                                        if(!strstr($val, $url)) {
                                                $newHistory['url'][$index] = $val;
                                                $index += 1;
                                        }
                                }
                                $history = $newHistory;
                                $history['current'] = min($history['current'], count($history['url']) - 1);

                                sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
                        }
                }
        }

        public static function clear($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                if($history) {
                        $history = array('current' => -1, 'url' => array());
                        sfcontext::getInstance()->getUser()->setAttribute('request_history[' . SF_APP . '' . $target . ']', $history, 'sfSurfaceHistoryPlugin');
                }
        }

        public static function hasPrevious($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                return ($history['current'] > 0) ? true : false;
        }

        public static function hasNext($target) {
                $history = sfcontext::getInstance()->getUser()->getAttribute('request_history[' . SF_APP . '' . $target . ']', '', 'sfSurfaceHistoryPlugin');
                $history = $history ? $history : array('current' => -1, 'url' => array());

                return ($history['current'] < (count($history['url']) - 1)) ? true : false;
        }

}
