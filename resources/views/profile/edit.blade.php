
@extends('admin.layouts.master')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 items-center">
                    <div>
                        <div class="relative">
                            <img class="rounded-lg shadow-lg object-cover object-center h-80 md:h-full w-full" src="{{$user->urlImage()}}" alt="user profile">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900 to-transparent opacity-50 rounded-lg"></div>
                            <div class="absolute inset-0 flex items-center justify-center text-white">
                                <h2 class="text-2xl font-bold">Your current profile, {{$user->name}}</h2>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class=" dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-4">
            <div class="max-w-xl mx-auto">
                <div class=" dark:bg-gray-900 p-6 rounded-lg shadow-lg">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
