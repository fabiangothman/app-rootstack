<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subcategories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="my-5">
                        <a href="{{route('subcategories.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Return to list
                        </a>
                        <a href="{{route('subcategories.edit', $subcategory)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>
                    </div>                    

                    <h1><strong>{{$subcategory->name}}</strong></h1>                
                    <div class="px-4 py-5 sm:p-6 bg-gray-100 shadow sm:rounded-lg">
                        <div>
                            <strong>Slug: </strong>{{$subcategory->slug}}
                        </div>
                        <div>
                            <strong>description: </strong>{{$subcategory->description}}
                        </div>
                        <div class="my-5">
                            <div>
                                <strong>Category: </strong>
                            </div>
                            <div class="my-5">
                                <div class="ml-5 my-2">
                                    <a href="{{route('categories.show', $subcategory->category)}}">{{$subcategory->category->name}}</a>
                                </div>
                            </div>
                            <a href="{{route('advertisements.subcategory', $subcategory)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                See all subcategory Advertisements
                            </a>
                        </div>
                    </div>

                    <div class="my-6">
                        <form action="{{route('subcategories.destroy', $subcategory)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>