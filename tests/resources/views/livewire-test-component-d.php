<div>
    <input type="text" wire:change="change" />
    <input type="text" wire:keydown="keydown" />
    <input type="text" wire:keyup="keyup" />
    <input type="text" wire:mouseenter="mouseEnter" />
    <input type="text" wire:keydown.enter="keyDownEnter" />
    <input type="text" wire:keydown.shift.enter="keyDownShiftEnterMethod" />
    <input type="text" wire:transitionend="transitionendMethod" />
    <input type="text" wire:custom-event="customEventMethod" />
    <input type="text" wire:change='singlequote' />

    <x-button wire:mouseenter="submit" />
    <x-button wire:mouseenter="$refresh" />
    <x-button wire:mouseenter="$toggle('sortAsc')" />
    <x-button wire:mouseenter="$dispatch('post-created')" />
    <x-button wire:mouseenter="search($event.target.value)" />
    <x-button wire:mouseenter="$wire.$refresh()" />
    <x-button wire:mouseenter="$parent.removePost({{ $post->id }})" />
    <x-button wire:mouseenter="$set('query', '')" />
    <x-button wire:mouseenter="params({{$prop}}, 42)" />
</div>
