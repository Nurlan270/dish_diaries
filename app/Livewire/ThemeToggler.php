<?php

namespace App\Livewire;

use Livewire\Attributes\Js;
use Livewire\Component;

class ThemeToggler extends Component
{
    #[Js]
    public function changeTheme(): string
    {
        return <<<'JS'
            const currentTheme = localStorage.getItem('theme');
            if (currentTheme === 'light') localStorage.setItem('theme', 'dark')
            else localStorage.setItem('theme', 'light')
            updateTheme();
        JS;
    }
}
