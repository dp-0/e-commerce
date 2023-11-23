<x-app-layout>
    <div class="justify-center flex-1 max-w-6xl px-4 mx-auto lg:py-8 md:px-6">
        <div class="rounded shadow bg-white dark:bg-gray-900">
            <div class="flex px-6 pb-4 border-b dark:border-gray-700">
                <h2 class="text-xl font-bold dark:text-gray-400">Orders</h2>
            </div>
            <div class="p-4 overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-xs text-left text-gray-500 dark:text-gray-400">
                            <th class="px-6 pb-3 font-medium">S.N </th>
                            <th class="px-6 pb-3 font-medium ">Purchase Id</th>
                            <th>Purchase Date</th>
                            <th class="px-6 pb-3 font-medium">Price </th>
                            <th class="px-6 pb-3 font-medium">Status </th>
                            <th class="px-6 pb-3 font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr class="text-xs bg-gray-100 dark:text-gray-400 dark:bg-gray-700">
                            <td class="px-6 py-5 font-medium">
                            {{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-5 font-medium ">{{$order->purcharseOrderId}}</td>
                            <td class="px-6 py-5 font-medium ">{{$order->purchase_date_time}}</td>
                            <td class="px-6 py-5 font-medium">{{$order->purcharse_amount}}</td>
                            <td class="px-6">
                                <span class="inline-block text-green-600 dark:text-green-400">
                                    @if($order->purchase_date_time->diffInHours(now()) < 24) 
                                    <span class="inline-block text-green-600 dark:text-green-400"> Available</span>
                                    @else
                                    <span class="inline-block text-red-600 dark:text-red-400"> Expired</span>
                                    @endif
                                
                            </td>
                            <td class="px-6 py-5 ">
                                <a href="{{route('user.order.product',$order->id)}}" class="font-medium text-blue-600 dark:text-blue-300 hover:underline">View Products </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>