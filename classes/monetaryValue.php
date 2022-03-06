<?php
    class MonetaryValue
    {
        const REGEX_IMPERIAL = "/[0-9]+\.[0-9]{2}/";
        const REGEX_METRICAL = "/[0-9]+\,[0-9]{2}/";

        private float|int|string $value;
        private string $currency;

        public function __construct(float|int|string $value, string $currency = "R$")
        {
            if (gettype($value) == "string") {
                $value = round(floatval(MonetaryValue::imperial_string_format($value)), 2);
            }
            else 
            {
                $value = round($value, 2);
            }
            if ($value >= 0)
            {
                $this->value = $value;
            }
            else
            {
                throw new Exception("O valor não pode ser negativo");
            }
            $this->currency = $currency;
        }
        
        public static function metric_string_format(string|int|float $number)
        {
            if (gettype($number) == "int" || gettype($number) == "double")
            {
                $number = strval(round($value, 2));
            }
            return str_replace(".",",", $number);
        }

        public static function imperial_string_format(string|int|float $number)
        {
            if (gettype($number) == "int" || gettype($number) == "double")
            {
                $number = strval(round($value, 2));
            } 
            else 
            {
                $number = str_replace(",",".", $number);
                if (preg_match(MonetaryValue::REGEX_IMPERIAL, $number, $matches)) 
                {
                    $number = $matches[0];
                }
                else if (preg_match("/[0-9]+/", $number, $matches))
                {
                    print $matches[0];
                    $number = $matches[0];
                }
                else
                {
                    throw new Exception("Não foi possível converter para formato imperial.");
                }
            }
            return str_replace(",",".", $number);
        }
    }
?>