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

                    <h1>SUBCATEGORIES LIST</h1>
                    <a href="{{route('subcategories.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Create
                    </a>

                    <div class="my-5">
                        {{$subcategories->links()}}
                    </div>

                    <div class="list">
                        @foreach ($subcategories as $subcategory)
                            <div class="my-5">
                                <a href="{{route('subcategories.show', $subcategory)}}">
                                    <div class="px-4 py-5 sm:p-6 bg-gray-100 shadow sm:rounded-lg">
                                        <div>
                                            <strong>Name: </strong>{{$subcategory->name}}
                                        </div>
                                        <div>
                                            <strong>Slug: </strong>{{$subcategory->slug}}
                                        </div>
                                        <div>
                                            <strong>description: </strong>{{$subcategory->description}}
                                        </div>
                                        <div>
                                            <strong>Category: </strong>{{$subcategory->category_id}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>