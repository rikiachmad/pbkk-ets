<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Ajuan') }}
        </h2>
    </x-slot>
    
    <div class="p-12 pt-8">
        <div class="inline-flex ml-8">
            <x-partial.buttons.back-button :href="url()->previous()"></x-partial.buttons.back-button>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="block">
                        <p class="text-blue-600 text-2xl font-bold">{{ ucfirst($inquiry->type) }}</p>
                        <p class="text-base">Oleh : <a class="hover:text-blue-600 transition" href="/profile/{{ $inquiry->user->username }}">{{ $inquiry->user->name }}</a></p>
                        <p class="text-base mt-5">{{ $inquiry->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
