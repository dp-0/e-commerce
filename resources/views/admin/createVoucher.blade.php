<x-admin-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="my-5 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-2xl dark:text-white">New Voucher Form</h1>
        <hr class="py-2">
        <form class="max-w-lg" method="post" action="{{route('admin.voucher.store')}}">
            @csrf
            <div class="mb-5">
                <label for="voucher_amount" class="block mb-2 text-sm font-medium @error('voucher_amount') focus:ring-red-500 focus:border-red-500 @enderror">Voucher Amount</label>
                <input type="number" value="{{ old('voucher_amount') }}" name="voucher_amount" start="1" step="1" id="voucher_amount" class="bg-green-50 border @error('voucher_amount') border-red-500 text-red-900 placeholder-red-700 dark:bg-red-100 dark:border-red-400 focus:ring-red-500 focus:red-green-500 @enderror text-sm rounded-lg block w-full p-2.5" placeholder="Voucher Amount">
                @error('voucher_amount')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="purchase_amount" class="block mb-2 text-sm font-medium @error('purchase_amount') focus:ring-red-500 focus:border-red-500 @enderror">Purchase Amount</label>
                <input type="number" value="{{ old('purchase_amount') }}" name="purchase_amount" start="1" step="1" id="purchase_amount" class="bg-green-50 border @error('purchase_amount') border-red-500 text-red-900 placeholder-red-700 dark:bg-red-100 dark:border-red-400 focus:ring-red-500 focus:red-green-500 @enderror text-sm rounded-lg block w-full p-2.5" placeholder="Voucher Amount">
                @error('purchase_amount')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium @error('valid_up_to') focus:ring-red-500 focus:border-red-500 @enderror">Date</label>
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