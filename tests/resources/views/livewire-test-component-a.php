<div>
    <input type="text" wire:model="user" />
    <input type="text" wire:model.lazy="lazy" />
    <input type="text" wire:model.defer="defer" />
    <x-button wire:click="submit" />

    <p>First value</p>
    <p>Second value</p>

    <livewire:livewire-test-component-b />
</div>
