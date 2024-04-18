<div class="mb-5">
    <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Environment</label>
    <input type="text" wire:model="env" id="env-input" placeholder="Test Environment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
    @error('env')
    <span class="text-red-800">{{$message}}</span>
    @enderror
</div>
<div class="mb-5">
    <label for="credentials-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credentials</label>
    <input type="text" wire:model="credentials" value="{{ $credentials }}" id="credentials-input" placeholder="Credentials" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
    @error('credentials')
    <span class="text-red-800">{{$message}}</span>
    @enderror
</div>
<div class="mb-5">
    <label for="other-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Notes</label>
    <input type="text" wire:model="other_notes" id="other-input" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
    @error('other')
    <span class="text-red-800">{{$message}}</span>
    @enderror
</div>

@if($project->test_level->type == 'UAT')
<div class="mb-5">
    <label for="sat-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SAT Process (UAT)</label>
    <input type="text" wire:model="sat_process" id="sat-input" placeholder="SAT Process" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
    @error('sat_process')
    <span class="text-red-800">{{$message}}</span>
    @enderror
</div>
<div class="mb-5">
    <label for="retest-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retesting (UAT)</label>
    <input type="text" wire:model="retesting" id="restest-input" placeholder="Retesting" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
    @error('retesting')
    <span class="text-red-800">{{$message}}</span>
    @enderror
</div>
@endif

