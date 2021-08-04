<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserInvitation;
use App\Notifications\WelcomeNewUser;
use Illuminate\Support\Facades\Notification;

class Profile extends Component
{
    use WithPagination;

    public $sendInvitation=false;
    public $person_name;
    public $email;
    protected $rules = [
        'person_name'=>'required',
        'email'=>'required|email'
    ];

    public function showInvitation()
    {
        $this->sendInvitation=true;
    }

    public function createInvitation()
    {
       $this->validate();

       $prospect = UserInvitation::create([
        'user_id'=>auth()->id(),
        'hash'=>$this->generateRandomString(30),
        'name'=>$this->person_name,
        'email'=>$this->email
       ]);
       $this->sendInvitation=false;
       Notification::send(auth()->user(), new WelcomeNewUser($prospect));
       $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Invitation was send']);
       $this->person_name='';
       $this->email='';
       $this->resetErrorBag();
    }
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function render()
    {
        $data = User::where('team_id', auth()->id())->orderBy('name')->paginate(10);
        return view('livewire.admin.profile', ['data'=>$data]);
    }
}
