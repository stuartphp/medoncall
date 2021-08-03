<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\OrderItem;
use Livewire\Component;
use App\Models\Order;
use App\Models\Medicine;

class Edit extends Component
{
    public $total_due=0;
    public $status=1;
    public $items;
    public $selected;
    public $order;
    public $order_id;
    public $delivery_fee=0;
    public $order_items;
    public $current_items;
    public $searchTerm;

    public function mount($id)
    {
        $this->order_id = $id;
        $this->order = Order::findOrFail($id);
        $this->delivery_fee=$this->order->total_delivery;
        $this->order_items = $this->getItems();
        $this->items = Medicine::where('generic_name', 'like', '%a%')
            ->orWhere('product_name', 'like', '%a%')
            ->orderBy('generic_name')
            ->limit(10)->get();
    }

    public function updatedSearchTerm()
    {
        $this->items = Medicine::where('generic_name', 'like', '%'.$this->searchTerm.'%')
            ->orWhere('product_name', 'like', '%'.$this->searchTerm.'%')
            ->orderBy('generic_name')
            ->limit(10)->get();
    }

    public function updatedSelected($med)
    {
        $i = Medicine::findOrFail($med);
        OrderItem::create([
            'order_id' => $this->order_id,
            'medicine_id'=>$med,
            'retail'=>($i->cost_price+$i->cost_per_unit+$i->dispencing_fee+$i->add_on_fee),
            'quantity'=>1
        ]);
        $this->getItems();
    }

    public function getItems()
    {
        $t = OrderItem::where('order_id', $this->order_id)->get();
        $amt=0;
        foreach($t as $j)
        {
            $amt += $j->retail * $j->quantity;
        }
        $amt += $this->delivery_fee;
        $this->total_due = ($amt/100);
        return $this->order_items = $t;
    }

    public function updateOrder()
    {
        //dd($this->order);
        $t = OrderItem::where('order_id', $this->order_id)->get();
        $amt=0;
        foreach($t as $j)
        {
            $amt += $j->retail * $j->quantity;
        }
        $total = $amt+$this->delivery_fee;
        $this->order->total_items = $t->count();
        $this->order->total_excl = ($total);
        $this->order->total_due =$total;
        $this->order->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Order Updated']);
    }
    public function render()
    {
        return view('livewire.admin.orders.edit');
    }
}
