<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;


    public function render()
    {
        $data = Order::where('user_id', auth()->id())->orderBy('created_at')->paginate(15);
        return view('livewire.admin.profile.orders', ['data'=>$data]);
    }
}
