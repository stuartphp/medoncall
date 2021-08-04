<?php

namespace App\Http\Livewire\Admin;

use App\Mail\InviteNewUser as MailInviteNewUser;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\UserInvitation;
use Illuminate\Support\Facades\Mail;

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

       //auth()->user()->notify(new InviteNewUser($prospect));
       Mail::to($this->email)->send(new MailInviteNewUser($prospect));

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
