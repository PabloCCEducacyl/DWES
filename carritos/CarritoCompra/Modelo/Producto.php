<?php
class Producto {
    private $name;
    private $price;
    private $imageUrl;
    private $quantity;
    public function __construct($name, $price, $imageUrl) {
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
    }

    // Getters
    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }


    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function setQuantity($imageUrl) {
        $this->quantity = $quantity;
    }

//FUNCTIONS 
    public function incrementarCantidad($imageUrl) {
        $this->getQuantity;
        
    }
}

?>
