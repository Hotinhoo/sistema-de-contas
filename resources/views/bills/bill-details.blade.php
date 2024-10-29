<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Details: ') . $conta->titulo }}
            @if(Auth::user()->role === 'admin')
                {{ "- Pertence à [$conta->user_id] $conta->user_name" }}
            @endif
        </h2>
    </x-slot>

    <!-- Formulário de Alteração da Conta -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('bills.partials.update-bill-form')
        </div>
    </div>

    <!-- Formulário de Exclusão -->
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('bills.partials.delete-bill-form')
        </div>
    </div>

</x-app-layout>
