<?php

namespace App\Cart;

use App\Product;

/**
 * Draft Item class.
 */
class Item
{
    public $id;
    public $product;
    public $name;
    public $type_merk;
    public $price;
    public $qty;
    public $subtotal;

    public function __construct(Product $product, $qty)
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->type_merk = $product->type_merk_id ? $product->type_merk->nama_type : null;
        $this->product = $product;
        $this->qty = $qty;
        $this->price = $product->getPrice();
        $this->subtotal = $product->getPrice() * $qty;
    }

    public function updateAttribute(array $newItemData)
    {
        if (isset($newItemData['qty'])) {
            $this->qty = $newItemData['qty'];
            $this->subtotal = $this->price * $this->qty;
        }

        return $this;
    }

}
