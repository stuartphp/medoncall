<?php

namespace App\Http\Livewire\Admin\UserManagement;

use Livewire\Component;
use App\Models\UserAddress;
use Livewire\WithPagination;

class UserAddresses extends Component
{
    use WithPagination;
    public $sortBy = 'is_approved';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 10;
    protected $listeners = [
        'showEditForm',];
    public $item;
    public $confirmingItemEdition = false;
    protected function rules()
    {
        return [
            'item.delivery_address'=>'required',
            'item.delivery_cost' => 'required',
            'item.is_approved' => 'boolean',
        ];
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
    }
    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return UserAddress::query();
    }
    public function showEditForm(UserAddress $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
    }
    public function render()
    {
        $data = $this->query()
            ->with('user')
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.user-management.user-addresses', ['data'=>$data]);
    }
}
