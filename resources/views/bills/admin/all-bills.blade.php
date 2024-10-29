<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Bills') }}
        </h2>
    </x-slot>

    <!-- Bills -->
    @if ($contas->isNotEmpty())
        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 overflow-x-scroll">

            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-sm sm:rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3 text-center">
                            Owner_ID
                        </th>

                        <th scope="col" class="px-6 py-3 text-center">
                            {{ __('Status') }}
                        </th>

                        <th scope="col" class="px-6 py-3">
                            {{ __('Name') }}
                        </th>

                        <th scope="col" class="px-6 py-3">
                            {{ __('Value') }}
                        </th>

                        <th scope="col" class="px-6 py-3">
                            {{ __('Expiration Date') }}
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">{{ __('Action') }}</span>
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($contas as $conta)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center dark:text-white">
                                {{ $conta->user_id }}
                            </td>

                            <th scope="row" class="px-6 py-4 text-center uppercase">
                                {{ $conta->status }}
                            </th>

                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $conta->titulo }}
                            </td>

                            <td class="px-6 py-4">
                                R$ {{ $conta->valor }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $conta->data_vencimento }}
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ Route('bill-details', ['conta' => $conta->id]) }}"
                                    aria-label="Editar conta {{ $conta->titulo }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    @endif

</x-app-layout>
