<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalProduct = 0;
    public $totalPrice = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalProduct = $cart->totalProduct;
            $this->totalPrice = $cart->totalPrice;
        }
    }
 public function AddCart($product, $bienthe, $quantity)
    {
        $idbt = $bienthe->id;
        $maxQuantity = $bienthe->so_luong;

        if ($quantity > $maxQuantity) {
            $quantity = $maxQuantity;
        }


        $donGia = ($bienthe->gia_moi > 0) ? $bienthe->gia_moi : $bienthe->gia_cu;

        $newProduct = [
            'bienthe' => $bienthe,
            'quantity' => $quantity,
            'productInfo' => $product,
            'price' => $donGia * $quantity,
        ];

        if ($this->products) {
            if (array_key_exists($idbt, $this->products)) {
                $existingProduct = $this->products[$idbt];
                $existingProduct['quantity'] += $quantity;
                if ($existingProduct['quantity'] > $maxQuantity) {
                    $existingProduct['quantity'] = $maxQuantity;
                }
                $existingProduct['price'] = $donGia * $existingProduct['quantity'];
                $this->products[$idbt] = $existingProduct;
            } else {
                $this->products[$idbt] = $newProduct;
            }
        } else {
            $this->products[$idbt] = $newProduct;
        }


        $this->totalPrice = 0;
        foreach ($this->products as $item) {
            $this->totalPrice += $item['price'];
        }

        $this->totalProduct = count($this->products);
    }

    public function UpdateItemCart($idbt, $quantity)
    {
        if (array_key_exists($idbt, $this->products)) {
            $product = $this->products[$idbt];
            $donGia = ($product['bienthe']->gia_moi > 0) ? $product['bienthe']->gia_moi : $product['bienthe']->gia_cu;

            $this->products[$idbt]['quantity'] = $quantity;
            $this->products[$idbt]['price'] = $donGia * $quantity;

            // Cập nhật lại tổng giá
            $this->totalPrice = 0;
            foreach ($this->products as $item) {
                $this->totalPrice += $item['price'];
            }
        }
    }

    public function DeleteItemCart($idbt)
    {
        if (is_array($this->products) && array_key_exists($idbt, $this->products)) {
            unset($this->products[$idbt]);

            // Tính lại totalPrice
            $this->totalPrice = 0;
            foreach ($this->products as $item) {
                $this->totalPrice += $item['price'];
            }

            $this->totalProduct = count($this->products);
        }
    }

}
