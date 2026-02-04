<?php

use Livewire\Component;

new class extends Component
{
    public $darkMode = true;

    public function mount()
    {
        $this->darkMode = session('darkMode', true);
    }

    public function toggleTheme()
    {
        $this->darkMode = !$this->darkMode;
        session(['darkMode' => $this->darkMode]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
};
?>


<div x-data="{ darkMode: @entangle('darkMode') }"
    x-init="darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')"
    x-effect="darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')">
    <flux:header container class="bg-linear-to-t from-gray-800 to-black border-b border-zinc-200 dark:border-zinc-700">
        <a href="/" class="text-white font-bold text-3xl">FlowTask</a>
        <flux:spacer />
        <flux:navbar class="">
            <flux:modal.trigger name="new-task">
                <flux:button variant="primary" size="sm" class="mr-2 cursor-pointer ">Nueva Tarea</flux:button>
            </flux:modal.trigger>
            <button wire:click="toggleTheme" class="mr-2 flex items-center justify-center p-2 rounded-lg hover:bg-gray-700 transition cursor-pointer">
                <span x-show="darkMode">
                    <flux:icon.moon class="w-6 h-6 text-yellow-400" />
                </span>
                <span x-show="!darkMode">
                    <flux:icon.sun class="w-6 h-6 text-yellow-400" />
                </span>
            </button>
            {{-- <flux:navbar.item icon="moon" href="#" label="Tema" class="mr-2" /> --}}
        </flux:navbar>
        <flux:separator vertical class="my-1 mr-2" />
        <flux:dropdown position="top" align="start">
            <flux:profile circle initials="AD" class="cursor-pointer" />
            <flux:menu>
                {{-- <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group> --}}
                <flux:menu.item icon="user">Profile</flux:menu.item>
                <flux:menu.item icon="cog-6-tooth">Settings</flux:menu.item>
                <flux:menu.separator />
                <flux:modal.trigger name="confirm-logout">
                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                </flux:modal.trigger>
            </flux:menu>
        </flux:dropdown>
        <flux:modal name="confirm-logout" class="min-w-88">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Cerrar Session?</flux:heading>
                    <flux:text class="mt-2">
                        Realmente quieres cerrar la sesión?
                    </flux:text>
                </div>
                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button variant="ghost">Cancelar</flux:button>
                    </flux:modal.close>
                    <flux:button wire:click="logout" variant="danger">Cerrar Session</flux:button>
                </div>
            </div>
        </flux:modal>
    </flux:header>
</div>