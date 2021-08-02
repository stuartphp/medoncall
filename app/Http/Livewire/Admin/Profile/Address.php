<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;
use App\Models\UserAddress;

class Address extends Component
{
    public $state;

    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',];
    public $confirmingItemDeletion = false;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $primaryKey;
    protected $rules = [
        'state.delivery_address' => 'required'
    ];

    public function mount()
    {

    }
    public function render()
    {
        $data = UserAddress::where('user_id', auth()->id())->paginate(5);
        return view('livewire.admin.profile.address', ['data'=>$data]);
    }
    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['state']);
    }

    public function createItem()
    {
        $this->validate();
        UserAddress::create([
            'user_id' => auth()->id(),
            'delivery_address' => $this->state['delivery_address'],
            'is_approved'=>0,
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => __('global.record_added')]);
        //$this->refresh();
    }

    public function showEditForm(UserAddress $state)
    {
        $this->resetErrorBag();
        $this->state = $state;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->state->is_approved=0;
        $this->state->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        //$this->refresh();
    }

}
