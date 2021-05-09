<div>
    <input type="text" wire:model="user" />
    <input type="text" wire:model.lazy="lazy" />
    <input type="text" wire:model.defer="defer" />
    <input type="text" wire:model.debounce="debounce" />
    <input type="text" wire:model.lazy.200s="lazy-with-duration" />
    <input type="text" wire:model.debounce.500ms="debounce-with-duration" />
    <a href="/test" wire:click.prevent="prevent">test</a>
    <x-button wire:click="submit" />

    <p>First value</p>
    <p>Second value</p>

    <livewire:livewire-test-component-b />
</div>
