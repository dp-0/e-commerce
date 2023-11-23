<x-app-layout>

    <section class="flex items-center bg-gray-100  py-16  dark:bg-gray-800 font-poppins">
        <div class="p-4 mx-auto max-w-6xl">
            <h2 class="pb-4  font-bold text-center text-gray-800 text-4xl dark:text-gray-400">
                Products
            </h2>
            <div class="mx-auto mb-10 border-b border-red-700 w-44 dark:border-gray-400"></div>
            <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 gap-6 mt-8">

                @foreach($order->products as $product)
                    <div class="relative rounded-md shadow-sm overflow-hidden group">
                        <img src="{{asset($product->photo)}}"
                             class="group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 h-[300px] w-full transition duration-500"
                             alt="">
                        <div class="absolute inset-0 h-[300px] group-hover:bg-black opacity-50 transition duration-500 z-0">
                        </div>
                        <div>
                            <div class="absolute z-10 hidden group-hover:block bottom-4 left-4">
                                <a href="{{route('user.order.product.view',$product->id)}}"
                                   class="h6 text-lg font-medium text-white hover:text-blue-300 transition duration-500">
                                    {{$product->name}}</a>
                                <p class="text-black-800 text-xs mb-0">{{($order->purchase_date_time->diffInHours(now()) < 24)?'Available':'Expired'}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>
