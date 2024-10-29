<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Bills') }}
        </h2>
    </x-slot>

    <!-- Bills -->
    <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-hidden shadow-sm sm:rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        {{ __('Status') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('Name') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('Expiration Date') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        {{ __('Value') }}
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">{{ __('Action') }}</span>
                    </th>

                </tr>

            </thead>

            <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <th scope="row" class="px-6 py-4 text-center">
                        Pago
                    </th>

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Nome da Conta Deve ficar Aqui
                    </td>

                    <td class="px-6 py-4">
                        04-11-2024
                    </td>

                    <td class="px-6 py-4">
                        $ 2999
                    </td>

                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                    </td>

                </tr>
            </tbody>
            
        </table>
    </div>

</x-app-layout>
