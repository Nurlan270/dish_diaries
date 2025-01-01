<?php

namespace App\Livewire\Partials;

use Livewire\Attributes\Js;
use Livewire\Component;

class ThemeToggler extends Component
{
    public string $class = '';

    #[Js]
    public function changeTheme(): string
    {
        return <<<'JS'
            const currentTheme = localStorage.getItem('theme') || 'light';
            if (currentTheme === 'light') localStorage.setItem('theme', 'dark')
            else localStorage.setItem('theme', 'light')
            updateTheme();
        JS;
    }
}
