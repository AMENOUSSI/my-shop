
<div class="min-h-screen flex items-center justify-center  px-4">
    <div class="w-full max-w-md bg-white p-6 sm:p-8 rounded-xl shadow-xl">
        
        <div class="flex flex-col items-center justify-center gap-2">
            <img src="{{ asset('images/shopping.png') }}" class="h-16 w-16 rounded-lg" alt="Login Image">
            <h1 class="text-2xl font-bold">MAWUTO-SHOP</h1>
        </div>
        

        <x-form wire:submit="login">
            @if (session()->has('error'))
                <div class="text-red-500 mb-4">{{ session('error') }}</div>
            @endif

            <x-input label="Nom d'utilisateur / Email" wire:model="email" error-field="" />
            <x-password label="Mot de passe" wire:model="password" right  />
            <x-checkbox label="Se rappeler de moi" wire:model="item1" class="text-2xl" />

            <x-slot:actions>
                <x-button label="Se Connecter" class="btn-primary w-full mt-4" type="submit" spinner="save4" />
            </x-slot:actions>
        </x-form>
    </div>
</div>
