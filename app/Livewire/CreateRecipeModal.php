<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateRecipeForm;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateRecipeModal extends Component
{
    use WithFileUploads;

    public CreateRecipeForm $form;

    public function createRecipe()
    {
        dd($this->form->all());
    }

    #[On('quillValueUpdated')]
    public function updateDescription($value): void
    {
        $this->form->description = $value;
    }
}
