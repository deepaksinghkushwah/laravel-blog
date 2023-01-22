<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="/blogs/create" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="border-red-400 bg-red-300 text-black rounded-md p-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <table class="w-full border-2">
                    <tbody>
                        <tr>
                            <td><input class="w-full" type="text" name="title" id="" placeholder="Title" value="{{@old('title')}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea class="w-full" name="content" id="" cols="30" rows="10" placeholder="Content">{{@old("content")}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="w-full" type="file" name="image" id="image" placeholder="Select an image for blog">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="border-gray-1 px-4 py-2 bg-blue-400 text-white rounded-lg"
                                    type="submit">Save Blog</button>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</x-app-layout>
