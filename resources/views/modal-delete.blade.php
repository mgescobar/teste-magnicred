<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white dark:text-white">
            {{ __('Remoção') }}
        </h2>

        <p class="mt-1 text-sm text-gray-900 dark:text-gray-900">
            {{ __('Tem certeza que deseja realizar essa ação de remoção?') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Remover') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Tem certez que deseja realizar essa remoção?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-900 dark:text-gray-900">
                {{ __('Uma vez removido o registro não poderá ser recuperado.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
