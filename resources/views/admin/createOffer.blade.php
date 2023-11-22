<x-admin-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="my-5 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">New Offer Form</h1>
        <hr class="py-2">
        <form class="max-w-lg" method="post" action="{{route('admin.offer.store')}}">
            @csrf
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium @error('title') focus:ring-red-500 focus:border-red-500 @enderror">Title</label>
                <input type="text" value="{{ old('title') }}" name="title" id="title" class="bg-green-50 border @error('title') border-red-500 text-red-900 placeholder-red-700 dark:bg-red-100 dark:border-red-400 focus:ring-red-500 focus:red-green-500 @enderror text-sm rounded-lg block w-full p-2.5" placeholder="Title">
                @error('title')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium @error('description') focus:ring-red-500 focus:border-red-500 @enderror">Description</label>
                <textarea type="number" value="{{ old('description') }}" name="description" start="1" step="1" id="description" class="bg-green-50 border @error('purchase_amount') border-red-500 text-red-900 placeholder-red-700 dark:bg-red-100 dark:border-red-400 focus:ring-red-500 focus:red-green-500 @enderror text-sm rounded-lg block w-full p-2.5" placeholder="Description"></textarea>
                @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="offer_percentange" class="block mb-2 text-sm font-medium @error('offer_percentange') focus:ring-red-500 focus:border-red-500 @enderror">Discout Percentage</label>
                <input type="number" value="{{ old('offer_percentange') }}" name="offer_percentange" start="1" step="1" id="offer_percentange" class="bg-green-50 border @error('purchase_amount') border-red-500 text-red-900 placeholder-red-700 dark:bg-red-100 dark:border-red-400 focus:ring-red-500 focus:red-green-500 @enderror text-sm rounded-lg block w-full p-2.5" placeholder="%">
                @error('offer_percentange')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium @error('valid_up_to') focus:ring-red-500 focus:border-red-500 @enderror">Valid Upto</label>
                <div class="relative max-w-lg">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="valid_up_to" value="{{ old('valid_up_to') }}" id="dateRangePicker" type="text" class="bg-gray-50 border text-sm rounded-lg  focus:border-blue-500 block w-full ps-10 p-2.5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('valid_up_to') border-red-500 text-red-900 placeholder-red-700 dark:bg-red-100 dark:border-red-400 focus:ring-red-500 focus:red-green-500 @enderror" placeholder="Select date">
                    @error('valid_up_to')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        {{$message}}
                    </p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>

        </form>

    </div>
</x-admin-layout>