<?php

use Livewire\Component;

new class extends Component
{
    public $darkMode = true;
    public $currentTheme = 'default';

    public function mount()
    {
        $this->darkMode = session('darkMode', true);
        $this->currentTheme = session('theme', 'default');
    }

    public function toggleTheme()
    {
        $this->darkMode = !$this->darkMode;
        session(['darkMode' => $this->darkMode]);
    }

    public function setTheme($theme)
    {
        $this->currentTheme = $theme;
        session(['theme' => $theme]);
        $this->dispatch('theme-changed', theme: $theme);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
};
?>


<div x-data="{ 
        darkMode: @entangle('darkMode'),
        currentTheme: @entangle('currentTheme')
    }" x-init="
        // Aplicar dark mode
        darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark');
        
        // Aplicar tema
        if (currentTheme !== 'default') {
            document.documentElement.classList.add('theme-' + currentTheme);
        }
    " x-effect="
        // Sincronizar dark mode
        darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark');
    " @theme-changed.window="
        // Remover todos los temas anteriores
        document.documentElement.classList.remove('theme-amber', 'theme-blue', 'theme-red', 'theme-green', 'theme-purple');
        
        // Aplicar nuevo tema
        if ($event.detail.theme !== 'default') {
            document.documentElement.classList.add('theme-' + $event.detail.theme);
        }
        
        currentTheme = $event.detail.theme;
    ">
    <flux:header container class="border-b border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900">
        <a href="/" class="text-accent font-bold text-3xl">FlowTask</a>
        <flux:spacer />
        <flux:navbar class="">
            <flux:modal.trigger name="new-task">
                <flux:button variant="primary" size="sm" class="mr-2 cursor-pointer ">Nueva Tarea</flux:button>
            </flux:modal.trigger>
            <button wire:click="toggleTheme"
                class="mr-2 flex items-center justify-center p-2 rounded-lg transition cursor-pointer hover:bg-zinc-100 dark:hover:bg-zinc-800 text-accent">
                
                <span x-show="darkMode">
                    <flux:icon.moon class="w-6 h-6" />
                </span>
                <span x-show="!darkMode">
                    <flux:icon.sun class="w-6 h-6" />
                </span>
            </button>
            <flux:dropdown class="mr-2" offset="-10">
                <flux:button icon="swatch" variant="ghost" class="mr-2 flex items-center justify-center p-2 rounded-lg transition cursor-pointer hover:bg-zinc-100 dark:hover:bg-zinc-800 text-accent">
                </flux:button>
                <flux:menu>
                    <flux:menu.item wire:click="setTheme('default')" class="cursor-pointer">
                        <div class="flex items-center gap-3 w-full">
                            <div class="w-5 h-5 rounded-full bg-zinc-800 dark:bg-white border-2 border-zinc-300"></div>
                            <span>Default (Zinc)</span>
                            <flux:spacer />
                            <flux:icon.check x-show="currentTheme === 'default'" class="w-4 h-4 text-green-500" />
                        </div>
                    </flux:menu.item>
                    <flux:menu.item wire:click="setTheme('amber')" class="cursor-pointer">
                        <div class="flex items-center gap-3 w-full">
                            <div class="w-5 h-5 rounded-full bg-amber-400 border-2 border-amber-600"></div>
                            <span>Amber</span>
                            <flux:spacer />
                            <flux:icon.check x-show="currentTheme === 'amber'" class="w-4 h-4 text-green-500" />
                        </div>
                    </flux:menu.item>
                </flux:menu>

            </flux:dropdown>
            {{--
            <flux:navbar.item icon="moon" href="#" label="Tema" class="mr-2" /> --}}
        </flux:navbar>
        <flux:separator vertical class="my-1 mr-2" />
        <flux:dropdown position="top" align="start">
            <flux:profile circle initials="AD" class="cursor-pointer" />
            <flux:menu>
                {{-- <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group> --}}
                <flux:menu.item icon="user" class="hover:bg-accent hover:text-accent-foreground transition cursor-pointer">Profile</flux:menu.item>
                <flux:menu.item icon="cog-6-tooth" class="hover:bg-accent hover:text-accent-foreground transition cursor-pointer">Settings</flux:menu.item>
                <flux:menu.separator class="border-2 border-bg-accent" />
                <flux:modal.trigger name="confirm-logout">
                    <flux:menu.item icon="arrow-right-start-on-rectangle" class="hover:bg-accent hover:text-accent-foreground transition cursor-pointer">Logout</flux:menu.item>
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