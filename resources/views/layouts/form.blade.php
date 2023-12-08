@extends('base.app')
@section('content')
<div class="pt-4 flex flex-col w-full h-screen space-y-2">
    <div class="w-full justify-start">
        <div id="title" class="font-semibold text-lg text-gray-900 uppercase">SIT Report Form</div>
        <div id="subtitle" class="font-base text-sm text-gray-700">Please fill</div>
    </div>
    @yield('form')
</div>
@endsection