<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Hello, :name! Your account overview is available.', ['name' => Auth::user()->first_name]) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Account Overview -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

            <div class="text-xl text-gray-900 dark:text-white mb-6">Visão Geral de Contas</div>

            <!-- Overview -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid md:grid-cols-4 gap-4">

                <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">0</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ __('Paid') }}</p>

                </div>

                <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">0</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ __('Pending') }}</p>
                    
                </div>

                <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">0</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ __('Expired') }}</p>
                    
                </div>

                <div class="bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">0</h5>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ __('Near Expiration') }}</p>
                    
                </div>
        
            </div>

        </div>
        
    </div>

    

</x-app-layout>
