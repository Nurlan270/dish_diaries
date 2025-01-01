<?php

namespace App\Livewire\Partials;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Quill extends Component
{
    public $value;

    #[Locked]
    public $quillId;

    public function mount($value = ''): void
    {
        $this->value = $value;
        $this->quillId = uniqid('quill-');
    }

    public function updatedValue($value): void
    {
        $this->dispatch('quillValueUpdated', $value);
    }
}
