<?php

namespace App\Livewire\V1;

use Livewire\Component;
use App\Models\Sale;
use Mary\Traits\Toast;

class SalesList extends Component
{
    use Toast;
    public $amount;
    public $date;
    public $user_id;

    

    public string $search = '';

    public bool $drawer = false;
    public bool $saleModal = false;

    public array $sortBy = ['column' => 'amount', 'direction' => 'asc'];

    public $perPage = 10;

    public $user_name;

    public function mount()
    {
        $this->user_name = auth()->user()?->name;
        $this->user_id = auth()->user()?->id; // si tu veux aussi stocker l'ID
    }

    public function rules()
    {
        return [
            'amount' => 'required|min:3',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function saveSale()
    {
        $this->validate();

        try {
            Sale::create([
                'amount' => $this->amount,
                'date' => $this->date,
                'user_id' => auth()->id(),
            ]);

            $this->success('Vente enregistrée avec succès.', timeout: 5000);
            $this->reset();
            $this->saleModal = false;

        } catch (\Exception $e) {
            $this->error('Erreur lors de l\'enregistrement de la vente : ' . $e->getMessage(), timeout: 9000);
        }
    }
    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }


    public function updatedAmount($value)
    {
    // Remplace la virgule par un point pour enregistrer un nombre correct
        $this->amount = str_replace(',', '.', $value);
    }
    // Delete action
    public function delete($id): void
    {
        $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'date', 'label' => 'Date du jour', 'class' => 'w-64'],
            ['key' => 'amount', 'label' => 'Vente du jour', 'class' => 'w-20'],
            ['key' => 'user_name', 'label' => 'Créé par', 'sortable' => false],
            ['key' => 'actions', 'label' => 'Actions', 'class' => 'flex justify-end', 'sortable' => false],
        ];
    }
    
    public function sales()
    {
        return Sale::query()
            ->withAggregate('user','name') // Charger l'utilisateur associé
            ->when($this->search, fn($q) => $q->where('amount', 'like', "%$this->search%"))
            ->when($this->date, fn($q) => $q->where('date', $this->date))
            ->where('user_id', auth()->id()) // Filtrer par l'utilisateur connecté
            ->orderBy(...array_values($this->sortBy))
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.v1.sales-list', [
            'sales' => $this->sales(),
            'headers' => $this->headers(),
        ]);
    }
}
