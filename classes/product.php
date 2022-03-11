<?php
    require_once("classes/monetaryValue.php");
    final class Product {
        private int $id;
        private string $name;
        private MonetaryValue $price;
        private string $code;
        private string $expiration_date;
        private string $manufacturer;
        private float|int $quantity;
        private string $description;

        public function __construct(int $id, string $name, float|int|string $price, string $code, string $expiration_date, string $manufacturer, float|int $quantity, string $description)
        {
            $this->id = $id;
            $this->name = $name;
            $this->setPrice($price);
            $this->code = $code;
            $this->expiration_date = $expiration_date;
            $this->manufacturer = $manufacturer;
            $this->quantity = $quantity;
            $this->description = $description;
        }

        public function setPrice(float|int|string $value)
        {
            try
            {
                $price = new MonetaryValue($value);
                $this->price = $price;
            }
            catch (Exception $e)
            {
                throw new Exception("O preço não pode ser negativo");
            }
        }

        public function __get($atrib)
        {
            return $this->$atrib;
        }
    }
?>