<?php

class Name implements Validation{
    public static function validate($arg){
        if(strlen(trim($arg)) == 0)
            return false;
        else 
            return true;
    }
}