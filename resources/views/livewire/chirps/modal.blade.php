<?php

use App\Models\Chirp;
use Livewire\Volt\Component;

new class extends Component {
    public Chirp $chirp;
    public $showModal = true;

    public function delete(): void
    {
        $this->authorize('delete', $this->chirp);
        
        $this->chirp->delete();
        $this->showModal = false;
        $this->dispatch('chirp-deleted');
    }
    
    public function cancel(): void
    {
        $this->showModal = false;
        $this->dispatch('chirp-delete-canceled');
    }
}; ?>

<div>
    <form wire:submit="delete"> 
        <x-confirmation-modal model.defer="{{ $this->showModal }}">
            <x-slot name="title">Delete Chirp</x-slot>
            <x-slot name="content">
                Are you sure you want to remove Chirp?
            </x-slot>
            <x-slot name="footer">
                <x-primary-button class="mt-4">{{ __('Delete') }}</x-primary-button>
                <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
            </x-slot>
        </x-confirmation-modal>
    </form> 
</div>
