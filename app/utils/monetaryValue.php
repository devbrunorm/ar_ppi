<?php
    class MonetaryValue
    {
        public static function dot_format(string $monetaryString) {
            return number_format(floatval($monetaryString), 2, '.', '');
        }

        public static function comma_format(string $monetaryString) {
            return number_format(floatval($monetaryString), 2, ',', '');
        }

        public static function validate(string $monetaryString) {
            $monetaryFormated = dot_format($monetaryString);
            $monetaryFloat = round(MonetaryValue::floatval($monetaryFormated), 2);
            return ($monetaryFloat >= 0);
        }

        public static function string_to_value(string $string) {
            $monetaryString = strval(round($string, 2)); 
            return round(floatval(MonetaryValue::dot_format($monetaryString)), 2);
        }

        public static function value_to_string(int|float $value) {
            if (gettype($value) == "int") {
                $value = floatval($value);
            }
            return MonetaryValue::comma_format(strval($value));
        }
    }
?>