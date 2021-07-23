<?php

class Cart
{
    /**
     * @var CartItem[];
     */
    private array $items = [];


    /**
     * @return \CartItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param \CartItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Add Product $product into cart. If Product already exists inside cart
     * It must update quantity
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever is $availableQuantity of the Product
     * 
     *@param Product $product
     * @param int     $quantity
     * @return \CartItem
     * @throws \Exception
     */

     public function addProduct(Product $product, int $quantity)
     {
        //  find product in cart
        $cartItem = $this->findCartItem($product->getId());
        //  if the product wasn`t found
        if($cartItem === null){
        //  create new product
        $cartItem = new CartItem($product, 0);
        // add into the array
        $this->items[$product->getId()] = $cartItem;
         }
         $cartItem-> increaseQuantity($quantity);
         return $cartItem;     
     }

     private function findCartItem(int $productId){
        // foreach($this->items as $item){
        //     if($item->getProduct()->getId() === $productId){
        //         return $item->getProduct();
        //     }
        // }
        // return null;
        return $this->items[$productId] ?? null;
     }

    /**
     * Remove product from cart
     * @param Product $product
     */

     public function removeproduct(Product $product)
     {
        // $cartItem = $this->findCartItem($product->getId());
        // $index = array_search($cartItem, $this->items);
        // unset($this->items[$index]);

         unset($this->items[$product->getId()]);
     }

    /**
     * This returns total number of products added in cart
     * 
     * @return int
     */
    public function getTotalQuantity()
    {
        $sum = 0;
        foreach ($this->items as $item){
            $sum += $item->getQuantity();
        }
        return $sum; 
    }

    /**
     * This returns total price of products added in cart
     * 
     * @return float
     */

     public function getTotalSum()
     {
        $totalSum = 0;
        foreach ($this->items as $item){
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();

        }
        return $totalSum;
     }
}

?>