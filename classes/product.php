<?php
    require_once("classes/monetaryValue.php");
    final class Product {
        private string $code;
        private string $description;
        protected MonetaryValue $price;
        private float|int $quantity;

        public function __construct(string $code, string $description, float|int $quantity, float|int|string $price)
        {
            $this->setCode($code);
            $this->setDescription($description);
            $this->setQuantity($quantity);
            $this->setPrice($price);
        }

        public function setCode(string $value)
        {
            $this->code = $value;
        }

        public function setDescription(string $value)
        {
            $this->description = $value;
        }

        public function setQuantity(float|int $value)
        {
            $this->quantity = $value;
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