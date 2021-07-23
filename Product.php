<?php
class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    /**
     * @param int $id
     * @param string $title
     * @param float $price
     * @param int $availableQuantity
     */
    public function __construct($id, $title, $price, $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @param int $availableQuantity
     */
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity = $availableQuantity;
    }
    /**
     * @return int
     */
    public function getAvailableQuantity(){
        return $this->availableQuantity;
    }
    
    
    /**
     * Add Product $product into cart. If product already exists inside cart
     * It must update quantity
     * This must create CartItem and return cartItem from method
     * Bonus: $quantity must not be more than what $availableQuantity of the Product
     * 
     * @param Cart $cart
     * @param int $quantity
     * @return \CartItem
     * @throws \Exception
     * 
     */

     public function addToCart(Cart $cart, int $quantity)
     {
         $cart->addProduct($this, $quantity);
        
     }
    /**
     * Remove Product from cart
     * @param Cart $cart 
     */
    public function removeFromCart(Cart $cart)
    {
         return $cart->removeProduct($this); 
    }
}