<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

    <div class="max-w-xl">

        <section>

            <header>

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Bill details') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Update your bill information.') }}
                </p>

            </header>

            <form method="post" action="{{ route('update-bill', ['conta' => $conta->id]) }}" class="mt-6 space-y-6">

                @csrf
                @method('put')

                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <select id="status" name="status" required autofocus
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full p-2">
                        <option value="pendente" {{ old('status', $conta->status) == 'pendente' ? 'selected' : '' }}>
                            Pendente
                        </option>
                        <option value="pago" {{ old('status', $conta->status) == 'pago' ? 'selected' : '' }}>Pago
                        </option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>

                <div>
                    <x-input-label for="titulo" :value="__('Name')" />
                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full"
                        :value="old('titulo', $conta->titulo)" required autofocus autocomplete="Título" />
                    <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                </div>

                <div>
                    <x-input-label for="descricao" :value="__('Description')" />
                    <x-text-input id="descricao" name="descricao" type="text" class="mt-1 block w-full"
                        :value="old('descricao', $conta->descricao)" required autofocus autocomplete="Descrição" />
                    <x-input-error class="mt-2" :messages="$errors->get('descricao')" />
                </div>

                <div>
                    <x-input-label for="valor" :value="__('Valor')" />

                    <div
                        class="flex items-center border border-gray-300 dark:border-gray-700 rounded-md shadow-sm mt-1">

                        <span
                            class="px-3 bg-gray-100 dark:bg-gray-800 border-r border-gray-300 dark:border-gray-700 text-gray-500 dark:text-gray-400">
                            R$
                        </span>

                        <input id="valor" name="valor" type="number" step="0.01"
                            class="flex-1 p-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-gray-300 rounded-md"
                            value="{{ $conta->valor }}" required />
                    </div>

                    <x-input-error class="mt-2" :messages="$errors->get('valor')" />
                </div>

                <div>
                    <x-input-label for="data_vencimento" :value="__('Expiration Date')" />

                    <input id="data_vencimento" name="data_vencimento" type="date"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full p-2"
                        value="{{ $conta->data_vencimento }}" required />

                    <x-input-error class="mt-2" :messages="$errors->get('data')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>

            </form>

            @if ($errors->any())
                <div class="pt-3">
                    @foreach ($errors->all() as $error)
                        <div class="text-red-300">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif

        </section>

    </div>

</div>
