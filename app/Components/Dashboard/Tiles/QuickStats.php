<?php

namespace App\Components\Dashboard\Tiles;

use Livewire\Component;

class QuickStats extends Component
{
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render ()
    {
        return view("dashboard.tiles.quick-stats");
    }
}
