<div>
    <!-- HEADER -->
    
    <x-header title="Liste de toutes les ventes" separator progress-indicator>
        <x-slot:middle class="justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Ajouter une vente" @click="$wire.saleModal = true" responsive icon="o-plus" class="btn-primary" />

        </x-slot:actions>
    </x-header>

    <!-- TABLE  -->
    <x-card>
        

        <x-table :headers="$headers" :rows="$sales" :sort-by="$sortBy" per-page="perPage" :per-page-values="[5, 10, 20, 30, 50]">
            @scope('actions', $sale)
            <x-button icon="o-trash" wire:click="delete({{ $sale['id'] }})" spinner class="btn-ghost btn-sm text-error" />
            @endscope

            @scope('cell_date', $sale)
            {{ \Carbon\Carbon::parse($sale['date'])->format('d M Y') }}
            @endscope

            @scope('cell_amount', $sale)
                {{ number_format((float)$sale['amount'], 0, ',', ' ') }} FCFA
            @endscope
        </x-table>
    </x-card>

  

    <!-- SALE MODAL -->
    <x-modal wire:model="saleModal" title="Enregistrez une vente" persistent separator>
    <x-form wire:submit.prevent="saveSale" class="space-y-4">

        <div class="flex flex-col gap-4">
            <x-input 
                label="Montant" 
                wire:model.live="amount" 
                placeholder="Entrez le montant" 
                type="number"
            />
            
            <x-input 
                label="Date" 
                wire:model.live="date" 
                type="date" 
            />
            
            

        </div>

        <x-slot:actions>
            <div class="flex justify-end gap-2 mt-4">
                
                <x-button 
                    label="Annuler" 
                    @click="$wire.saleModal = false" 
                    color="btn btn-accent"
                />

                <x-button 
                    label="Sauvegarder" 
                    type="submit" 
                    class="btn btn-primary" 
                    spinner="saveSale"
                />
            </div>
        </x-slot:actions>
    </x-form>
</x-modal>

 
</div>
