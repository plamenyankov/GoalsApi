<?php
namespace Goals\Form;


use Laracasts\Validation\FormValidator;

class GoalValidation extends FormValidator{
    protected $rules = [
        'name' => 'required|min:3|max:20',
        'description' => 'required'
    ];
} 