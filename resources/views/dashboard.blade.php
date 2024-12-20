<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Imobiliárias') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #69B6FF;">
                <div class="p-6 text-gray-900 dark:text-gray-900">
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
                                <th class="px-5 py-2">Cidade</th>
                                <th class="px-5 py-2">Estado</th>
                                <th class="px-5 py-2">Telefone</th>
                                <th class="px-5 py-2">Responsável</th>
                            </tr>
                        </thead>
                        <tbody id="imobiliaria-table">
                            <tr>
                                <td colspan="7" class="text-center px-4 py-2">Carregando...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
    const apiUrl = "/imobiliarias";
    const imobiliariasTable = document.getElementById("imobiliaria-table");
    const searchInput = document.getElementById("search");
    const filterCity = document.getElementById("filter-city");
    const filterState = document.getElementById("filter-state");

    let allImobiliarias = [];

    const fetchImobiliarias = async () => {
        try {
            const response = await fetch(apiUrl);
            const imobiliarias = await response.json();
            allImobiliarias = imobiliarias;
            populateFilters(imobiliarias);
            renderImobiliarias(imobiliarias);
        } catch (error) {
            console.error("Erro ao buscar imobiliárias:", error);
        }
    };

    const populateFilters = (imobiliarias) => {
        const cities = [...new Set(imobiliarias.map(i => i.city))];
        const states = [...new Set(imobiliarias.map(i => i.state))];

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

        const filteredImobiliarias = allImobiliarias.filter(imobiliaria => {
            const matchesSearch = imobiliaria.name.toLowerCase().includes(searchValue);
            const matchesCity = cityValue ? imobiliaria.city === cityValue : true;
            const matchesState = stateValue ? imobiliaria.state === stateValue : true;
            return matchesSearch && matchesCity && matchesState;
        });

        renderImobiliarias(filteredImobiliarias);
    };

    const renderImobiliarias = (imobiliarias) => {
        imobiliariasTable.innerHTML = "";

        if (!imobiliarias.length) {
            imobiliariasTable.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center px-4 py-2">Nenhuma imobiliária encontrada</td>
                </tr>
            `;
            return;
        }

        imobiliarias.forEach(imobiliaria => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td class="border px-4 py-2">${imobiliaria.id}</td>
                <td class="border px-4 py-2">${imobiliaria.name}</td>
                <td class="border px-4 py-2">${imobiliaria.email}</td>
                <td class="border px-4 py-2">${imobiliaria.city}</td>
                <td class="border px-4 py-2">${imobiliaria.state}</td>
                <td class="border px-4 py-2">${imobiliaria.phone}</td>
                <td class="border px-4 py-2">${imobiliaria.responsible}</td>
            `;

            imobiliariasTable.appendChild(row);
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

    fetchImobiliarias();
});

    </script>
</x-app-layout>
