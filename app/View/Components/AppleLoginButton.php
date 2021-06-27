<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppleLoginButton extends Component
{
    public $width;
    public $height;
    public $fontSize;
    public $margin;
    public $marginX;
    public $unit;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $width, int $size, string $unit="px")
    {
        $this->width = $width;
        $this->height = round($size * 2.33);
        $this->fontSize = $size;
        $this->margin = round($this->height * 0.10);
        $this->marginX = round($this->width * 0.08);
        $this->unit = $unit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.apple-login-button');
    }
}
