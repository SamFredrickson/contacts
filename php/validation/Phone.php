<?php

class Phone implements Validation{
    public static function validate($arg){
        $ok = filter_input(INPUT_POST, $arg, FILTER_VALIDATE_INT);
            if (is_null($ok) || ($ok === false)) {
                return false;
        }else{
            return true;
        }
    }
}