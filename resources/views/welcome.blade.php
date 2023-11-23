<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <section class="relative bg-gray-100 border-b font-poppins dark:bg-gray-800 dark:border-gray-800">
        <div class="container mx-auto" x-data="{open:false}">
            <nav class="flex justify-between ">
                <div class="flex items-center justify-between w-full px-4 py-2 lg:px-2 ">
                    <a href="" class="text-2xl text-gray-700 dark:text-gray-400">Logo</a>
                    <div class="flex items-center lg:hidden ">
                        <a href="" class="mr-4 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                            </svg>
                        </a>
                        <a href="" class="flex items-center mr-4 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class=" bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>
                        <button class="flex items-center px-3 py-2 text-blue-600 border border-blue-200 rounded dark:text-gray-400 hover:text-blue-800 hover:border-blue-300 lg:hidden" @click="open =true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </button>
                    </div>
                    <ul class="hidden font-medium lg:flex">
                        <li class="mr-12"><a href="" class="text-gray-700 hover:text-gray-600 dark:text-gray-400">Product</a>
                        </li>
                        <li class="mr-12"><a href="" class="text-gray-700 hover:text-gray-600 dark:text-gray-400">Category</a>
                        </li>
                        <li class="mr-12"><a href="" class="text-gray-700 hover:text-gray-600 dark:text-gray-400">Collection</a>
                        </li>
                        <li class="mr-12"><a href="" class="text-gray-700 hover:text-gray-600 dark:text-gray-400">Brand</a>
                        </li>
                    </ul>
                    <div class="items-center hidden max-w-xs py-2 pl-4 bg-white rounded-lg dark:text-gray-300 dark:bg-gray-600 lg:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="mr-2 bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        <input type="text" class="w-full py-2 pl-3 border-0 dark:text-gray-300 dark:bg-gray-600" placeholder="Search...">
                        <div class="pr-4">
                            <select name="" id="" class="pl-3 pr-4 border-0 border-l border-gray-400 cursor-pointer dark:bg-gray-600">
                                <option value="">All items</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="items-center justify-end hidden lg:flex dark:text-gray-400">
                        <a href="" class="mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
                                </path>
                            </svg>
                        </a>
                        <a href="{{route('cart')}}" class="flex items-center dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </a>

                        @if (Route::has('login'))

                        @auth
                        <a href="{{route('dashboard')}}" class="items-center hidden pl-6 text-sm font-semibold lg:flex dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z" />
                            </svg>
                        </a>
                        @else
                        <a href="{{route('login')}}" class="items-center hidden pl-6 text-sm font-semibold lg:flex dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="mr-1 bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                </path>
                            </svg>
                        </a>

                        @if (Route::has('register'))
                        <a href="{{route('register')}}" class="items-center hidden pl-6 text-sm font-semibold lg:flex dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                            </svg>
                        </a>
                        @endif
                        @endauth

                        @endif
                    </div>
                </div>
            </nav>
            <!-- Mobile Sidebar -->
            <div class="fixed inset-0 w-full bg-gray-800 opacity-25 lg:hidden dark:bg-gray-400" :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}">
            </div>
            <div class="absolute inset-0 z-10 h-screen p-3 text-gray-700 duration-500 transform shadow-md dark:bg-gray-800 bg-blue-50 w-80 lg:hidden lg:transform-none lg:relative" :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}">
                <div class="flex justify-between">
                    <a class="p-2 text-2xl font-bold dark:text-gray-400" href="#">Logo</a>
                    <button class="p-2 rounded-md hover:text-blue-300 lg:hidden dark:text-gray-300" @click="open=false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center px-5 mt-7 lg:hidden">
                    <a href="" class="items-center mr-4 text-sm font-semibold lg:flex dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class=" bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </a>
                    <a href="" class="mr-4 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                    </a>
                    <a href="" class="flex items-center mr-4 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class=" bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </a>
                </div>
                <div class="flex items-center max-w-xs py-2 pl-4 bg-white rounded-lg mt-7 dark:text-gray-300 dark:bg-gray-600 lg:hidden">
                    <input type="text" class="w-full py-2 pl-3 border-0 dark:text-gray-300 dark:bg-gray-600" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="mr-2 bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
                <ul class="px-5 text-left mt-7">
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-100">Home</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">About us</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">Features</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">Blog </a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">Testimonials</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @if (session('success'))
    <div class="@if(!session('success'))hidden @endif flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert" id="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session()->get('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif





    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl">

            <div x-data="infiniteScroll()" x-init="loadMore()" x-on:scroll.window="handleScroll">
                <div x-show="isLoading">
                    <div role="status">
                        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <section class="flex items-center lg:mt-5">
                    <div class="mx-auto max-w-7xl">
                        <div class="grid grid-cols-1 gap-4 lg:gap-4 sm:gap-4 sm:grid-cols-2 lg:grid-cols-4" id="product-container">
                        </div>
                </section>
            </div>

        </div>
    </div>
    <script>
        function infiniteScroll() {
            return {
                page: 1,
                isLoading: false,
                loadMore() {
                    if (this.isLoading) {
                        return;
                    }
                    this.isLoading = true;

                    axios.get(`/api/product?page=${this.page}`)
                        .then(response => {
                            this.appendProducts(response.data['data']);
                            this.page++;
                        })
                        .catch(error => {
                            console.error('Error loading more products', error);
                        });
                    this.isLoading = false;

                },
                appendProducts(products) {
                    products.forEach(product => {
                        price = product.price - (product.price * product.offerPercentage / 100);
                        let orginalPrice = '';
                        let offerPercentage = '';
                        if (product.offerPercentage) {
                            offerPercentage = ` <p class="mb-3 font-bold text-blue-300 dark:text-blue-300 ">
                                   <span>${product.offerPercentage} % Discount</span>
                                </p>`;
                            orginalPrice = `<span class="text-xs font-semibold text-gray-400 line-through">${product.price}</span>`;
                        }
                        const productHtml = `
                        <div class="mt-56 bg-white rounded shadow dark:bg-gray-700">
                            <div class="relative z-20 p-6 group">
                                <div class="relative block h-64 mb-4 -mt-56 overflow-hidden rounded -top-full ">
                                    <img class="object-cover w-full h-full transition-all group-hover:scale-110"
                                        src="${product.photo}" alt="${product.name}">
                                    <div class="absolute flex flex-col top-4 right-4">
                                        <a href="#" class="flex items-center">
                                            <div
                                                class="relative flex items-center justify-center p-3 mb-3 transition-all translate-x-20 bg-white rounded dark:bg-gray-700 dark:text-white group-hover:translate-x-0 wishlist hover:bg-blue-200 dark:hover:bg-blue-600 group">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                    <path
                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="${product.cart_url}" class="flex items-center">
                                            <div
                                                class="relative flex items-center justify-center p-3 mb-3 transition-all translate-x-20 bg-white rounded dark:bg-gray-700 dark:text-white group-hover:translate-x-0 wishlist hover:bg-blue-200 dark:hover:bg-blue-600 group">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <a href="${product.url}">
                                    <h2 class="mb-2 text-xl font-bold text-black dark:text-white">
                                    ${product.name}
                                    </h2>
                                </a>
                                <p class="mb-3 text-lg font-bold text-blue-500 dark:text-blue-300 ">
                                    <span>Rs ${price.toFixed(2)}</span>
                                    ${orginalPrice}
                                </p>
                                ${offerPercentage}
                            </div>
                        </div>
                    `;
                        document.getElementById('product-container').insertAdjacentHTML('beforeend', productHtml);
                    });
                },

                handleScroll() {
                    if (!this.isLoading && window.scrollY == document.documentElement.scrollHeight - window.innerHeight) {
                        this.loadMore();
                    }

                    if (window.scrollY === 0) {
                        this.isLoading = false;
                    }
                },
            };
        }
    </script>

</body>

</html>