<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Actions\Fortify\UpdateUserProfileInformation;
use Livewire\Component;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Validation\Rule;

class UpdateProfile extends Component
{
    public $state=[];

    public function mount()
    {
        $this->state = auth()->user()->only(['name', 'email', 'mobile_number']);
    }

    public function updateProfileInformation(UpdateUserProfileInformation $updater)
    {
        $updater->update(auth()->user(), [
            'name' => $this->state['name'],
            'email' => $this->state['email'],
            'mobile_number' => $this->state['mobile_number']
        ]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => __('global.record_updated')]);
    }

    public function render()
    {
        return view('livewire.admin.profile.update-profile');
    }
}
