<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Locatários') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #69B6FF;">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-between items-center">
                        <div class="flex gap-2">
                            <input id="search" type="text" placeholder="Buscar por nome" 
                                class="rounded-md p-2 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
                        </div>

                        <div class="flex gap-2">
                            <select id="filter-city" class="rounded-md p-3 border-gray-300 text-gray-900">
                                <option value="">Filtrar por cidade</option>
                            </select>
                            <select id="filter-state" class="rounded-md p-3 border-gray-300 text-gray-900">
                                <option value="">Filtrar por estado</option>
                            </select>
                        </div>
                    </div>

                    <table class="table-auto bg-gray-100 dark:bg-gray-400 text-gray-900 dark:text-gray-900 rounded-md shadow-md w-full">
                        <thead>
                            <tr>
                                <th class="px-5 py-2">ID</th>
                                <th class="px-5 py-2">Nome</th>
                                <th class="px-5 py-2">Email</th>
                                <th class="px-5 py-2">Endereço</th>
                                <th class="px-5 py-2">Cidade</th>
                                <th class="px-5 py-2">Estado</th>
                                <th class="px-5 py-2">Telefone</th>
                                <th class="px-5 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody id="locatarios-table">
                            <tr>
                                <td colspan="7" class="text-center px-4 py-2">Carregando...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="edit-modal" focusable>
        <form id="edit-form" method="POST" action="" class="p-6">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="edit-id">

            <div class="mb-4">
                <label for="edit-name" class="block text-gray-700 dark:text-gray-300">Nome</label>
                <input id="edit-name" name="name" type="text" 
                       class="rounded-md p-2 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="edit-email" class="block text-gray-700 dark:text-gray-300">Email</label>
                <input id="edit-email" name="email" type="email" 
                       class="rounded-md p-2 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="edit-address" class="block text-gray-700 dark:text-gray-300">Endereço</label>
                <input id="edit-address" name="address" type="text" 
                       class="rounded-md p-2 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="edit-city" class="block text-gray-700 dark:text-gray-300">Cidade</label>
                <input id="edit-city" name="city" type="text" 
                       class="rounded-md p-2 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="edit-state" class="block text-gray-700 dark:text-gray-300">Estado</label>
                <input id="edit-state" name="state" type="text" 
                       class="rounded-md p-2 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label for="edit-phone" class="block text-gray-700 dark:text-gray-300">Telefone</label>
                <input id="edit-phone" name="phone" type="text" 
                       class="rounded-md p-2 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300">
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Salvar') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    <section class="space-y-6">
        <x-modal name="confirm-deletion" focusable>
            <form id="delete-form" method="POST" action="" class="p-6">
                @csrf
                @method('DELETE')
                
                <input type="hidden" name="id" id="delete-id">

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tem certeza que deseja realizar essa remoção?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-900 dark:text-gray-900">
                    {{ __('Uma vez removido, o registro não poderá ser recuperado.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancelar') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Remover') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const apiUrl = "/locatarios";
    const locatariosTable = document.getElementById("locatarios-table");
    const searchInput = document.getElementById("search");
    const filterCity = document.getElementById("filter-city");
    const filterState = document.getElementById("filter-state");
    const editForm = document.getElementById("edit-form");
    const deleteForm = document.getElementById("delete-form");
    const deleteIdInput = document.getElementById("delete-id");

    let allLocatarios = [];

    const fetchLocatarios = async () => {
        try {
            const response = await fetch(apiUrl);
            const locatarios = await response.json();
            allLocatarios = locatarios;
            populateFilters(locatarios);
            renderLocatarios(locatarios);
        } catch (error) {
            console.error("Erro ao buscar locatários:", error);
        }
    };

    const populateFilters = (locatarios) => {
        const cities = [...new Set(locatarios.map(i => i.city))];
        const states = [...new Set(locatarios.map(i => i.state))];

        filterCity.innerHTML = `<option value="">Filtrar por cidade</option>` + 
            cities.map(city => `<option value="${city}">${city}</option>`).join("");
        filterState.innerHTML = `<option value="">Filtrar por estado</option>` + 
            states.map(state => `<option value="${state}">${state}</option>`).join("");
    };

    const resetOtherFilters = (activeFilter) => {
        if (activeFilter !== filterCity) filterCity.value = "";
        if (activeFilter !== filterState) filterState.value = "";
        if (activeFilter !== searchInput) searchInput.value = "";
    };

    const applyFilters = () => {
        const searchValue = searchInput.value.toLowerCase();
        const cityValue = filterCity.value;
        const stateValue = filterState.value;

        const filteredLocatarios = allLocatarios.filter(locatario => {
            const matchesSearch = locatario.name.toLowerCase().includes(searchValue);
            const matchesCity = cityValue ? locatario.city === cityValue : true;
            const matchesState = stateValue ? locatario.state === stateValue : true;
            return matchesSearch && matchesCity && matchesState;
        });

        renderLocatarios(filteredLocatarios);
    };

    const renderLocatarios = (locatarios) => {
        locatariosTable.innerHTML = "";

        if (!locatarios.length) {
            locatariosTable.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center px-4 py-2">Nenhum locatário encontrado</td>
                </tr>
            `;
            return;
        }

        locatarios.forEach(locatario => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td class="border px-4 py-2">${locatario.id}</td>
                <td class="border px-4 py-2">${locatario.name}</td>
                <td class="border px-4 py-2">${locatario.email}</td>
                <td class="border px-4 py-2">${locatario.address}</td>
                <td class="border px-4 py-2">${locatario.city}</td>
                <td class="border px-4 py-2">${locatario.state}</td>
                <td class="border px-4 py-2">${locatario.phone}</td>
                <td class="border px-4 py-2 flex gap-2"> 
                    <button class="px-4 py-2 bg-yellow-500 text-yellow-500 rounded-md edit-button" style="color: #ce7e00;">Editar</button>
                    <button class="px-4 py-2 bg-red-600 text-white rounded-md delete-button">Remover</button>
                </td>
            `;

            row.querySelector(".edit-button").addEventListener("click", () => {
                document.getElementById("edit-id").value = locatario.id;
                document.getElementById("edit-name").value = locatario.name;
                document.getElementById("edit-email").value = locatario.email;
                document.getElementById("edit-address").value = locatario.address;
                document.getElementById("edit-city").value = locatario.city;
                document.getElementById("edit-state").value = locatario.state;
                document.getElementById("edit-phone").value = locatario.phone;
                editForm.action = `${apiUrl}/${locatario.id}`;
                window.dispatchEvent(new CustomEvent('open-modal', { detail: 'edit-modal' }));
            });

            row.querySelector(".delete-button").addEventListener("click", () => {
                deleteIdInput.value = locatario.id;
                deleteForm.action = `${apiUrl}/${locatario.id}`;
                window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-deletion' }));
            });

            locatariosTable.appendChild(row);
        });
    };

    searchInput.addEventListener("input", () => {
        resetOtherFilters(searchInput);
        applyFilters();
    });

    filterCity.addEventListener("change", () => {
        resetOtherFilters(filterCity);
        applyFilters();
    });

    filterState.addEventListener("change", () => {
        resetOtherFilters(filterState);
        applyFilters();
    });

    fetchLocatarios();
});

    </script>
</x-app-layout>
