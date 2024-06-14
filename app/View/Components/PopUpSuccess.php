<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopUpSuccess extends Component
{
    public $pickupTime;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pickupTime)
    {
        $this->pickupTime = $pickupTime;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.pop-up-success');
    }

    public function pickupTimeCountdown(): string
    {
        $pickupDateTime = Carbon::parse($this->pickupTime)->addDay();
        $now = Carbon::now();
        $diff = $now->diffInSeconds($pickupDateTime);

        $hours = floor($diff / 3600);
        $minutes = floor(($diff % 3600) / 60);
        $seconds = $diff % 60;

        return "$hours Jam $minutes Menit $seconds Detik";
    }
}
