@extends('base.app')
@section('content')
<div class="pt-4 flex flex-col w-full h-screen space-y-2">
    <div class="w-full justify-start">
        <div id="title" class="font-semibold text-lg text-gray-900 uppercase dark:text-gray-100">{{ $title }}</div>
        <div id="subtitle" class="font-base text-sm text-gray-700 dark:text-gray-200">{{ $description }}</div>
    </div>
    @yield('app')
</div>
@endsection