<?php
/**
 *
 * 
 */
class myTools {

        public static function isSqlDateTime($date) {
                $isValid = true;
                $regs = array();
                if(!preg_match( '`^\d{1,4}-\d{1,2}-\d{2} \d{2}:\d{2}:\d{2}$`' , $date, $regs)) {
                        $isValid = false;
                }
                elseif($date != Date("Y-m-d H:i:s", mktime($regs[4], $regs[5], $regs[6], $regs[2], $regs[3], $regs[1]))) {
                        $isValid = false;
                }
                return $isValid;
        }

        public static function isSqlDate($date) {
                $isValid = true;
                $regs = array();
                if(!preg_match( '`^\d{4}-\d{2}-\d{2}$`' , $date, $regs)) {
                        $isValid = false;
                }
                elseif($date != Date("Y-m-d", strtotime($date))) {
                        $isValid = false;
                };
                return $isValid;
        }

}
?>