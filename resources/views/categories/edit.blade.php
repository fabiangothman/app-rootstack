<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="px-4 py-5 bg-white sm:p-6">
                
                    <h1>EDIT CATEGORY</h1>

                    <form action="{{route('categories.update', $category)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="py-5">
                            <label>Name:</label>
                            <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('name')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>

                        <div class="py-5">
                            <label>Slug:</label>
                            <input type="text" name="slug" value="{{old('slug', $category->slug)}}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('slug')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>

                        <div class="py-5">
                            <label>Description:</label>
                            <textarea name="description" rows="5" class="form-input rounded-md shadow-sm mt-1 block w-full">{{old('description', $category->description)}}</textarea>
                            @error('description')
                                <small>*{{$message}}</small>
                            @enderror
                        </div>

                        <div class="py-5">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>