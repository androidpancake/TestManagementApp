@extends('layouts.form')
@section('form')
<form action="" class="space-y-2">
    <div class="w-full flex justify-end">
        <button id="addUser" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
            <i class="ph ph-plus"></i>
            <span class="sr-only">Icon description</span>
        </button>
        <button id="minUser" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
            <i class="ph ph-minus"></i>
            <span class="sr-only">Icon description</span>
        </button>
    </div>
    <div class="flex flex-col gap-2">
        <div id="forms" class="flex flex-row gap-2 w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
            <div class="mb-5 w-full">
                <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="name[]" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5 w-full">
                <label for="unit-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                <input type="text" name="unit[]" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5 w-full">
                <label for="telephone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                <input type="number" name="telephone[]" id="telephone-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-blue-500">
            </div>
        </div>
    </div>
    <div class="flex justify-end">
        <button type="button" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Next</button>
    </div>
</form>
@push('add-form')
<script>
    document.getElementById('addUser').addEventListener('click', function() {
        var container = document.querySelector('.flex.flex-col.gap-2');
        var newForm = document.createElement('div');
        newForm.className = "flex flex-row gap-2 w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800";

        var inputNames = ['name', 'unit', 'telephone'];

        for (var i = 0; i < inputNames.length; i++) {
            var newInputDiv = document.createElement('div');
            newInputDiv.className = "mb-5 w-full";

            var label = document.createElement('label');
            label.setAttribute('for', inputNames[i] + '-input');
            label.className = "block mb-2 text-sm font-medium text-gray-900 dark:text-white";
            label.textContent = inputNames[i].charAt(0).toUpperCase() + inputNames[i].slice(1);

            var input = document.createElement('input');
            input.type = (inputNames[i] === 'telephone') ? 'number' : 'text';
            input.name = inputNames[i] + '[]';
            input.id = inputNames[i] + '-input';
            input.className = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark-bg-gray-700 dark-border-gray-600 dark-placeholder-gray-400 dark-text-white dark-focus-ring-teal-500 dark-focus-border-blue-500";

            newInputDiv.appendChild(label);
            newInputDiv.appendChild(input);
            newForm.appendChild(newInputDiv);
        }

        container.appendChild(newForm);
    });

    document.getElementById('minUser').addEventListener('click', function() {
        var container = document.querySelector('.flex.flex-col.gap-2');
        var forms = container.querySelectorAll('.flex-row');

        // Pastikan selalu ada minimal satu card di container
        if (forms.length > 1) {
            container.removeChild(forms[forms.length - 1]);
        }
    })
</script>
@endpush
@endsection