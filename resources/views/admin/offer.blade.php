<x-admin-layout>

<div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
            <li class="me-2">
                <a href="{{route('admin.offer.create')}}" id="about-tab" data-tabs-target="#about" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Add Offers</a>
            </li>
        </ul>
        <div>
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    S.N
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Offer Percentage(%)
                                </th>
                                <th>
                                    Valid Up To
                                </th>
                                <th>Status</th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-4 py-3">{{ ($offers->currentPage() - 1) * $offers->perPage() + $loop->index + 1 }}</th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$offer->title}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$offer->description}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$offer->offer_percentange}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$offer->valid_up_to->format('Y-m-d')}}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 ">
                                    {{strtoupper($offer->status)}}
                                </td>
                                <td>
                       
                                    @if($offer->status == 'expired' && $offer->valid_up_to->diffInDays(now()) >= 0)
                                    <a href="{{route('admin.offer.active',$offer->id)}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-3 py-1 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Activate</a>
                                    @endif
                                    @if($offer->status == 'available')
                                        <a href="{{route('admin.offer.expired',$offer->id)}}" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300 rounded-full text-sm px-3 py-1 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800">Mark Expired</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pt-3">
                    {{$offers->links()}}
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>