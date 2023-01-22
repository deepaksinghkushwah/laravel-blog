<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs Listing') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="get" action="{{ route('welcome') }}">
                @csrf
                <table class="mb-3 w-full">
                    <tr class="">
                        <td colspan="2">
                            <input type="text" placeholder="Enter text to search" class="border-blue-2 w-full"
                                name="term" id="">
                        </td>
                        <td>
                            <button type="submit"
                                class="border-blue-2 bg-blue-300 text-white py-2 px-5">Search</button>
                            <a href="{{ route('welcome') }}" class=" border-blue-2 bg-red-300 text-white py-2 px-5">Reset</a>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="w-full border-2">
                <thead>

                    <tr class="bg-slate-700 text-white">
                        <th align="left" width="10%">ID</th>
                        <th align="left" width="70%">Title</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $c = 0;
                    @endphp
                    @foreach ($blogs as $blog)
                        @php
                            $c++;
                        @endphp
                        <tr class="{{ $c % 2 == 0 ? 'bg-gray-300' : '' }}">
                            <td>{{ $blog->id }}</td>
                            <td>
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    {{ $blog->title }}
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $blogs->withQueryString()->links() }}
        </div>
    </div>
</x-guest-layout>
