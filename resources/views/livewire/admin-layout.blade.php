<div>
    {{-- Do your work, then step back. --}}
    <x-form wire:submit="save4">
    {{-- Notice `error_field` --}}
    <x-input label="Custom error field" wire:model="salary" error-field="total_salary" />
 
    <x-slot:actions>
        <x-button label="Click me!" class="btn-primary" type="submit" spinner="save4" />
    </x-slot:actions>
</x-form>

<!-- You can open the modal using ID.showModal() method -->
  <button class="btn btn-error">Salut</button>
<button class="btn" onclick="my_modal_4.showModal()">open modal</button>
<dialog id="my_modal_4" class="modal">
  <div class="modal-box w-11/12 max-w-5xl">
    <h3 class="text-lg font-bold">Hello!</h3>
    <p class="py-4">Click the button below to close</p>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button, it will close the modal -->
        <button class="btn">Close</button>
      </form>
    </div>
  </div>
</dialog>
</div>
