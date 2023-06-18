<?php 


function format_num($number = 0, $max_decimal = ''){
    if(is_numeric($number)){
        $ex = explode('.',$number);
        $dec = isset($ex[1]) ? strlen($ex[1]) : 0;
        if(empty($max_decimal) || (is_numeric($max_decimal) && $max_decimal >= $dec)){
            return number_format($number,$dec);
        }else{
            if(is_numeric($max_decimal))
                return number_format($number,$max_decimal);
            else
                return "Invalid Maximum Decimal";

        }
    }else{
        return "Invalid Number";
    }
}