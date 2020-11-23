<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Advertisements') }}
        </h2>
    </x-slot>

    

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="filters" class="filters">
                <div class="pt-2 relative mx-auto text-gray-600">
                    <form action="{{route('advertisements.search')}}" method="POST">
                        @csrf
                        <input value="{{$formReturned['textValue']}}" class="w-60 max-w-xs border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="text" placeholder="Name / Descripcion">
                        <input type="submit" value="Search" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"/>
                    </form>
                </div>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <form action="{{route('advertisements.search')}}" method="POST">
                        @csrf
                        <select class="w-60 max-w-xs border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="category_id">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                @if ($formReturned['category_idValue']==$category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="submit" value="Search" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    
                    <h1>ADVERTISEMENTS LIST</h1>
                    <a href="{{route('advertisements.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Create
                    </a>

                    <div class="my-8">
                        {{$advertisements->links()}}
                    </div>

                    <div class="list">
                        @foreach ($advertisements as $advertisement)
                            <div class="my-5">
                                <a href="{{route('advertisements.show', $advertisement)}}">
                                    <div class="px-4 py-5 sm:p-6 bg-gray-100 shadow sm:rounded-lg">
                                        <div>
                                            <strong>Name: </strong>{{$advertisement->name}}
                                        </div>
                                        <div>
                                            <strong>Slug: </strong>{{$advertisement->slug}}
                                        </div>
                                        <div>
                                            <strong>description: </strong>{{$advertisement->description}}
                                        </div>
                                        <!--<div>
                                            <strong>Subcategory: </strong>{{$advertisement->subcategory_id}}
                                        </div>-->
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