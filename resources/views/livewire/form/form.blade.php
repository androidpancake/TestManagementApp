<div class="pt-4 flex flex-col w-full space-y-2">
    <div class="w-full justify-start">
        <div id="title" class="font-semibold text-lg text-gray-900 uppercase dark:text-gray-100">{{ $title }}</div>
        <div id="subtitle" class="font-base text-sm text-gray-700 dark:text-gray-200">{{ $description }}</div>
    </div>
    <div class="flex justify-between">
        <div class="bg-gray-500 p-2 rounded-full text-sm text-white">{{ $currentStep }} out of {{ $total_steps }}</div>
    </div>
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <button type="button" wire:click="toStep(1)" class="inline-block p-4 border-b-2 {{ $currentStep == 1 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Project Info</button>
            </li>
            <li class="me-2">
                <button type="button" wire:click="toStep(2)" class="inline-block p-4 border-b-2 {{ $currentStep == 2 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Description</button>
            </li>
            <li class="me-2">
                <button type="button" wire:click="toStep(3)" class="inline-block p-4 border-b-2 {{ $currentStep == 3 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Env & Credentials</button>
            </li>
            <li class="me-2">
                <button type="button" wire:click="toStep(4)" class="inline-block p-4 border-b-2 {{ $currentStep == 4 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Issue</button>
            </li>
            <li>
                <button type="button" wire:click="toStep(5)" class="inline-block p-4 border-b-2 {{ $currentStep == 5 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Tester</button>
            </li>
            <li>
                <button type="button" wire:click="toStep(6)" class="inline-block p-4 border-b-2 {{ $currentStep == 6 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Scenario-Case-Step</button>
            </li>
            <li>
                <button type="button" wire:click="toStep(7)" class="inline-block p-4 border-b-2 {{ $currentStep == 7 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Document Availability</button>
            </li>
        </ul>
    </div>
    @if($currentStep===1)
    @include('livewire.form.info')

    @elseif($currentStep===2)
    @include('livewire.form.desc')

    @elseif($currentStep===3)
    @include('livewire.form.env')

    @elseif($currentStep===4)
    @include('livewire.form.issue')

    @elseif($currentStep===5)
    @include('livewire.form.tester')

    @elseif($currentStep===6)
    @include('livewire.form.scenario')

    @elseif($currentStep===7)
    @include('livewire.form.doc')

    @endif

    <div class="flex justify-between">
        @if($currentStep > 1)
        <button wire:click="decrementSteps" class="order-first bg-gray-800 px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Previous</button>
        @endif

        @if($currentStep < $total_steps) @if($currentStep===4) <button wire:click="incrementSteps" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Create Project & Next</button>
            @elseif($currentStep===5)
            <button wire:click="incrementSteps" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Add Members & Next</button>
            @elseif($currentStep===6)
            <button wire:click="incrementSteps" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Save Test & Next</button>

            @else
            <button wire:click.prevent="incrementSteps" class="order-last bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Next</button>
            @endif

            @endif

            @if($currentStep === $total_steps)
            <input type="hidden" wire:model="is_generated" value="Generated">
            <input type="hidden" wire:model="published" value="published">
            <div>
                <button wire:click="store" type="button" class="bg-transparent border border-bsi-primary px-6 py-2.5 rounded text-bsi-primary hover:bg-teal-700 hover:text-white hover:border-teal-700 focus:ring-4 focus:ring-teal-400">Simpan</button>
                <button wire:click="generate" type="submit" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Cetak</button>
            </div>
            @endif
    </div>
</div>