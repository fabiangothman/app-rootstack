<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Advertisements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 bg-white sm:p-6">
                    
                    <h1>{{$subcategory->name}}</h1>
                    <h1>ADVERTISEMENTS LIST</h1>

                    <div class="my-5">
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
                                        <div>
                                            <strong>Subcategory: </strong>{{$advertisement->subcategory_id}}
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