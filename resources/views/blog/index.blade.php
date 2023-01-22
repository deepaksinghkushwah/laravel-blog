<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Listing') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="w-full border-2">
                <thead>
                    <tr class="bg-slate-700 text-white">
                        <th align="left" width="10%">ID</th>
                        <th align="left" width="70%">Title</th>
                        <th align="center" width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $c = 0;
                    @endphp
                    @foreach ($blogs as $blog)
                        @php
                            $c++
                        @endphp
                        <tr class="{{ $c % 2 == 0 ? 'bg-gray-300' : '' }}">
                            <td>{{ $blog->id }}</td>
                            <td>
                                <a href="{{ route('blog.show', $blog->id) }}">
                                {{ $blog->title }}
                                </a>
                            </td>
                            <td class="inline-block p-3 text-center">
                                <a class="rounded-xl py-1 px-3 border-blue-500 bg-blue-400 text-white" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                <form class="inline-block" method="post" action="{{ route('blog.delete',$blog->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="rounded-xl py-1 px-3 border-blue-500 bg-blue-400 text-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $blogs->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
