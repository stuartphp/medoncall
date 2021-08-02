<?php

namespace App\Http\Livewire\Admin\UserManagement;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    protected $listeners = [
    'showDeleteForm',
    'showCreateForm',
    'showEditForm',];
    public $sortBy = 'title';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 10;
    public $confirmingItemDeletion = false;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $primaryKey;
    public $item;
    public $message ='';
    protected $rules = [
        'item.title' => 'required',
        'item.note'=>''
    ];

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data= $this->query()
            ->when($this->searchTerm, function($q){
                $q->where('title', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('note', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.user-management.permissions', ['data'=>$data]);
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
        return Permission::query();
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Permission::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
        //$this->refresh();
    }
    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        $this->validate();
        Permission::create([
            'title' => $this->item['title'],
            'note'  =>$this->item['note']
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        //$this->refresh();
    }

    public function showEditForm(Permission $item)
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
        //$this->refresh();
    }

}
