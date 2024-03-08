@extends('auth.layout')
@section('content')

<div class="w-1/2">
    <form action="{{ route('change') }}" method="POST" class="bg-white p-2 rounded-lg justify-center dark:bg-gray-800">
        @csrf
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
            <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Password lama anda">
            @error('username')
            <span class="" role="alert">
                <div class="text-sm text-red-500">{{ $message }}</div>
            </span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Password lama anda">
            @error('old_password')
            <span class="" role="alert">
                <div class="text-sm text-red-500">{{ $message }}</div>
            </span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
            <input type="password" id="new_password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Password baru anda">
            @error('password')
            <span class="" role="alert">
                <div class="text-sm text-red-500">{{ $errors->first('password') }}</div>
            </span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Konfirmasi password baru Anda">
            @error('confirm_password')
            <span class="" role="alert">
                <div class="text-sm text-red-500">{{ $errors->first('confirm_password') }}</div>
            </span>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">Submit</button>
        </div>
    </form>
</div>

@endsection