<?php

namespace App\Http\Livewire\Admin\ManageOrders;

use App\Mail\OrderDispatched;
use App\Mail\PaymentRecieved;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class Listing extends Component
{
    use WithPagination;

    public $sortBy = 'order_number';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 10;

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return Order::query();
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function updateOrder(Order $order, $val)
    {

        switch($val)
        {
            case 2: // Confirm

                break;
            case 3: // Payment
                // Add R10 per item to team owner
                // Calculate
                $earnings = 1000*$order->total_items;
                DB::table('team_earnings')->where('user_id', $order->user->team_id)->increment('earnings', $earnings);
                // Send Email
                Mail::to($order->user->email)->send(new PaymentRecieved($order));
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Payment Recieved']);
                break;
            case 4: // Dispatched
                Mail::to($order->user->email)->send(new OrderDispatched($order));
                $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Order Dispatched']);
                break;
        }
        $order->status = $val;
        $order->save();

    }

    public function render()
    {
        $data = $this->query()
            ->where('status', '>', 1)
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.manage-orders.listing', ['data'=>$data]);
    }

}
