<x-guest-layout>
    <x-guest-navigation />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog - ' . $blog->title) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-6xl font-bold text-slate-500">{{ $blog->title }}</h1>
            <div class="flex flex-row gap-2 mt-3">
                <img src="{{ url('/images/' . $blog->image) }}" class="w-2/6 h-64 border-blue-800 border-2 shadow-md" />
                <div class="w-4/6 rounded-md border-2 p-2 bg-blue-400 text-white shadow-xl leading-relaxed">
                    {!! $blog->content !!}
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
