<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Actions\Fortify\PasswordValidationRules;
use Livewire\Component;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdatePassword extends Component implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    public $state = [];

    public function updatePassword()
    {
        $this->update(auth()->user(), $this->state);
    }
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => __('global.record_updated')]);
    }
    public function render()
    {
        return view('livewire.admin.profile.update-password');
    }
}
