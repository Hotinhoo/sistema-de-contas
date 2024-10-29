<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

    <div class="max-w-xl">

        <section>

            <header>

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Delete Bill') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Delete this bill from your account') }}
                </p>

            </header>

            <form method="post" action="{{ route('destroy-bill', ['conta' => $conta->id]) }}" class="mt-6 space-y-6">

                @csrf
                @method('delete')

                <div class="flex items-center gap-4">
                    <x-danger-button>
                        {{ __('Delete Bill') }}
                    </x-danger-button>
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
