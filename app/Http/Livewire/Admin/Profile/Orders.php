<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\TeamEarning;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Mail;

class Orders extends Component
{
    use WithPagination;

    public $confirmCreate=false;
    public $addresses=[];
    public $item;
    public $earnings=0;

    public function mount()
    {
        $this->earnings = auth()->user()->team->earnings;
    }

    public function showCreate()
    {
        $adres = UserAddress::where('user_id', auth()->id())->where('is_approved', 1)->get();
        $this->addresses=[];
        foreach($adres as $a)
        {
            $this->addresses[]=$a;
        }
        $this->confirmCreate=true;
    }

    public function createItem()
    {
        $delivery = UserAddress::findOrFail($this->item);
        // Create order
        $nr = date('y').'/'.date('m').'/'.$this->generateRandomString(5);
        $or = Order::create([
            'order_number'=>$nr,
            'user_id'=>auth()->id(),
            'delivery_address'=>$delivery->delivery_address,
            'total_items'=>null,
            'total_excl'=>null,
            'total_delivery'=>$delivery->delivery_cost,
            'total_vat'=>null,
            'total_due'=>null,
            'status'=>1
        ]);
        return redirect('orders/'.$or->id.'/edit');
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function confirmOrder(Order $order, $val=false)
    {
        if($val==true)
        {
            $total_due = $order->total_due;
            $order->total_discount = auth()->user()->team->earnings;
            $order->total_due = ($total_due - $order->total_discount);
            TeamEarning::where('user_id', auth()->id())->update(['earnings'=>0]);
            $this->earnings=0;
        }
        $order->status=2;
        $order->save();

        Mail::to(auth()->user()->email)->send(new OrderPlaced($order));
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Order Placed']);
    }
    public function render()
    {
        $data = Order::where('user_id', auth()->id())->orderBy('created_at')->paginate(15);

        return view('livewire.admin.profile.orders', ['data'=>$data]);
    }


}
