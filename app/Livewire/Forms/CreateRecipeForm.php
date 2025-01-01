<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateRecipeForm extends Form
{
    #[Validate]
    public array $recipeImages = [];

    #[Validate]
    public string $title;

    #[Validate]
    public string $description;

    #[Validate]
    public array $ingredients = [];

    public bool $saveToDrafts = false;

    public function rules(): array
    {
        return [
            'recipeImages' => [
                'required',
                'array',
                'min:1',
                'max:5',
            ],
            'recipeImages.*' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg',
                'max:10240',
            ],
            'title' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'description' => [
                'required',
                'string',
                'min:5',
                'max:10000',
            ],
            'ingredients' => [
                'required',
                'array',
                'min:1',
            ],
        ];
    }
}
