<div class="w-full justify-start space-y-2">
    {{ Breadcrumbs::render() }}
    <div>
        <div id="title" class="font-semibold text-lg text-gray-900 uppercase dark:text-gray-100">{{ $title }}</div>
        <div id="subtitle" class="font-base text-sm text-gray-700 dark:text-gray-200">{{ $description }}</div>
        <div id="user_name" class="font-semibold text-sm text-gray-700 dark:text-gray-200">{{ $user_name }}</div>
    </div>
</div>