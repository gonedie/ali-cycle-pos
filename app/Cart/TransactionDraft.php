<?php

namespace App\Cart;

use App\Product;
use App\Transaksi;
use App\Stok;
/**
 * Transaction Draft Interface.
 */
abstract class TransactionDraft
{
    public $items = [];

    public $customer = ['name' => null, 'phone' => null];
    public $payment;

    public function toArray()
    {
        return [
            'invoice_no' => 2,
            'date'       => 1,
            'items'      => $this->items(),
            'total'      => 0,
            'payment'    => 0,
            'customer'   => 0,
            'status_id'  => 0,
            'creator_id' => 0,
            'remark'     => '',
        ];
    }

    public function items()
    {
        return collect($this->items)->sortBy('name');
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $item->product;
    }

    public function removeItem($itemKey)
    {
        unset($this->items[$itemKey]);
    }

    public function empty()
    {
        $this->items = [];
    }

    public function getSubtotal()
    {
        return $this->items()->sum('subtotal');
    }

    public function getTotal()
    {
        return $this->items()->sum('subtotal');
    }

    public function getItemsCount()
    {
        return $this->items()->count();
    }

    public function getTotalQty()
    {
        return $this->items()->sum('qty');
    }

    public function updateItem($itemKey, $newItemData)
    {
        if (!isset($this->items[$itemKey])) {
            return;
        }

        $item = $this->items[$itemKey];

        $this->items[$itemKey] = $item->updateAttribute($newItemData);

        return $item;
    }

    public function search(Product $product)
    {
        $productItem = $this->items()->where('id', $product->id)->first();

        return $productItem;
    }

    public function searchItemKeyFor(Product $product)
    {
        return $this->items()->search(function ($item, $key) use ($product) {
            return $item->product->id == $product->id;
        });
    }

    public function getExchange()
    {
        return $this->payment - $this->getTotal();
    }

    public function store()
    {
        $transaction = new Transaksi();
        $transaction->invoice_no = $this->getNewInvoiceNo();
        $transaction->items = $this->getItemsArray();
        $transaction->customer = $this->customer;
        $transaction->payment = $this->payment;
        $transaction->total = $this->getTotal();
        $transaction->user_id = auth()->id() ?: 1;

        $stock = new Stok();
        foreach ($this->getItemsArray() as $item) {
            $tes = $stock->where('product_id', '=', $item['id'])->first();
            if($tes){
                $tes->penjualan_stok += $item['qty'];
                $tes->stok_akhir -= $item['qty'];

                $tes->update();
            }
        }

        $transaction->save();

        return $transaction;
    }

    public function getNewInvoiceNo()
    {
        $prefix = date('ym');

        $lastTransaction = Transaksi::orderBy('invoice_no', 'desc')->first();

        if (!is_null($lastTransaction)) {
            $lastInvoiceNo = $lastTransaction->invoice_no;
            if (substr($lastInvoiceNo, 0, 4) == $prefix) {
                return ++$lastInvoiceNo;
            }
        }

        return $prefix.'0001';
    }

    protected function getItemsArray()
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = [
                'id'                     => $item->product->id,
                'name'                   => $item->name,
                'type_merk'              => $item->type_merk,
                'price'                  => $item->price,
                'qty'                    => $item->qty,
                'subtotal'               => $item->subtotal,
            ];
        }

        return $items;
    }

    public function destroy()
    {
        $cart = app(CartCollection::class);

        return $cart->removeDraft($this->draftKey);
    }
}
