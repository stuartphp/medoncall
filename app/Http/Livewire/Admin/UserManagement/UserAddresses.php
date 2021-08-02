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
