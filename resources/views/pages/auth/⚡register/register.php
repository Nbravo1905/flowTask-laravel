<?php

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

new class extends Component
{
    #[Validate('required|min:3')]
    public $name = '';
    
    #[Validate('required|email|unique:users')]
    public $email = '';
    
    #[Validate('required|min:8|confirmed')]
    public $password = '';
    
    public $password_confirmation = '';

    public function register()
    {
        $validated = $this->validate();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
};