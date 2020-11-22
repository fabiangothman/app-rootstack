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

                    <h1>SCRAPING URL</h1>

                    <div class="my-6">
                        <form action="{{route('scraps.store')}}" method="POST">
                            @csrf
                            <div class="py-5">
                                <label>URL:</label>
                                <input type="text" name="url" value="{{old('url', $scraping->url)}}" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly />
                                @error('url')
                                    <small>*{{$message}}</small>
                                @enderror
                            </div>
                            <h2>Be patient, the process will take around 8-9 minutes while scan site and get data into own database.</h2>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Start
                            </button>
                        </form>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>