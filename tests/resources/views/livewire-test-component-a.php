<div>
    <input type="text" wire:model="user"/>
    <input type="text" wire:model.lazy="lazy"/>
    <input type="text" wire:model.defer="defer"/>
    <input type="text" wire:model.debounce="debounce"/>
    <input type="text" wire:model.lazy.200s="lazy-with-duration"/>
    <input type="text" wire:model.debounce.500ms="debounce-with-duration"/>
    <a href="/test" wire:click.prevent="prevent">test</a>
    <x-button wire:click="submit"/>

    <x-button wire:click="params({{$prop}}, 42)"/>
    <a href="/test" wire:click.prevent="preventParams({{$prop}}, 42)">test</a>

    <p>First value</p>
    <p>Second value</p>

    <livewire:livewire-test-component-b/>

    <form wire:submit.prevent="upload">
        <input type="file" wire:model="supportersUpload">


        <button type="submit">Upload Participants</button>

        <input x-data="textInputFormComponent({
                        state: $wire.entangle('entangled-x-data-state-single-quote').defer,
                    })" type="text" wire:ignore="" id="phone" maxlength="32"
         >

        <input x-data='textInputFormComponent({
                        state: $wire.entangle("entangled-x-data-state-double-quote").defer,
                    })' type="text" wire:ignore="" id="phone" maxlength="32"
        >
    </form>

    <div x-data="{ open: @entangle('entangled-x-data-single-quote') }"></div>
    <div x-data='{ open: @entangle("entangled-x-data-double-quote") }'></div>
</div>
