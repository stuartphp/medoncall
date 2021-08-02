<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Profile extends Component
{
    use WithPagination;

    public $sendInvitation=false;

    public function showInvitation()
    {
        $this->sendInvitation=true;
    }
    public function render()
    {
        $data = User::where('team_id', auth()->id())->orderBy('name')->paginate(10);
        return view('livewire.admin.profile', ['data'=>$data]);
    }
}
