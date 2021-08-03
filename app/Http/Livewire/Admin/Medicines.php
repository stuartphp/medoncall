<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Medicine;
use App\Models\Ingredient;
use Livewire\WithPagination;

class Medicines extends Component
{
    use WithPagination;
    public $sortBy = 'product_name';
    public $searchTerm='';
    public $catagory ='';
    public $sortAsc = true;
    public $pageSize = 10;
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingIngredients = false;
    public $confirmingItemEdition = false;
    public $state;
    protected function rules(){
        return [
            'state.nappi_code'=>'required',
            'state.regno'=>'',
            'state.schedule'=>'',
            'state.generic_name'=>'required',
            'state.product_name'=>'required',
            'state.description'=>'',
            'state.category'=>'required',
            'state.dosage_form'=>'required',
            'state.pack_size'=>'required',
            'state.num_packs'=>'',
            'state.cost_per_unit'=>'',
            'state.cost_price'=>'',
            'state.dispensing_fee'=>'',
            'state.add_on_fee'=>'',
            'state.is_active'=>'boolean',
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
        return Medicine::query();
    }

    public function changeCategory($val)
    {
        $this->catagory = $val;
        $this->resetPage();
    }
    public function render()
    {
        $data = $this->query()
            ->when($this->catagory, function($q){
                $q->where('category', $this->catagory);
            })
            ->when($this->searchTerm, function($q){
                $q->where('generic_name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('product_name', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.admin.medicines', ['data'=>$data]);
    }


    public function showDetail($id)
    {
        $detail = Medicine::with('ingredients')->findOrFail($id);
        dd($detail);
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Medicine::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['state']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);

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
        Medicine::create([
            'nappi_code' => $this->state['nappi_code'],
            'regno' => $this->state['regno'],
            'schedule' => $this->state['schedule'],
            'generic_name' => $this->state['generic_name'],
            'product_name' => $this->state['product_name'],
            'description' => $this->state['description'],
            'category' => $this->state['category'],
            'dosage_form' => $this->state['dosage_form'],
            'pack_size' => $this->state['pack_size'],
            'num_packs' => $this->state['num_packs'],
            'cost_per_unit' => $this->state['cost_per_unit'],
            'cost_price' => $this->state['cost_price'],
            'dispensing_fee' => $this->state['dispensing_fee'],
            'add_on_fee' => $this->state['add_on_fee'],
            'is_active' => $this->state['is_active'],
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);

    }

    public function showEditForm(Medicine $item)
    {
        $this->resetErrorBag();
        $this->state = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->state->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
    }
}
