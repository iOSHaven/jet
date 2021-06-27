<x-dashboard>
{{--    <livewire:dashboard.tiles.quick-stats :position="a1:a4" />--}}
    @livewire('dashboard.tiles.quick-stats', ['position' => 'a1:a1'])
    @livewire('dashboard.tiles.quick-stats', ['position' => 'b1:b1'])
</x-dashboard>
