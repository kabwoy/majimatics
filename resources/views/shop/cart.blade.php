@extends('layouts.main')

@section('title' , 'Cart')

@section('content')

@if (count($products) <= 0 )

<div class="max-w-8xl mt-[10rem]  mx-auto flex flex-col items-center px-10 py-4 bg-white rounded-lg shadow-lg">
  <div>
    <span
      class="bg-green-100 font-mono text-indigo-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-green-300">
      Empty Cart</span>
  </div>
  <div class="flex flex-col items-center justify-center py-12">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-24 w-24 text-gray-400 mb-4">
      <path
        d="M4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V15H18.4433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
      </path>
    </svg>
    <p class="text-gray-600 text-lg font-semibold mb-4">Your shopping cart is empty.</p>
    <a
    href="/shop/products"
      class="px-6 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 transition-colors duration-300">
      Let's go shopping!
    </a>
  </div>
</div>

    @else
    <!-- component -->
<!-- Create By Joker Banny -->
<style>
    @layer utilities {
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  }

  .content{
    position: relative;
}
.overlay{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    background-color: rgba(0, 0, 0, 0.5);
}
</style>

<div class="content h-screen w-screen">
    <!-- Loader element -->
    <div class="overlay h-screen w-screen" hidden>
        <div class="overlay-content flex justify-center items-center h-screen"><svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" viewBox="0 0 200 200"><circle fill="#1371FF" stroke="#1371FF" stroke-width="15" r="15" cx="40" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate></circle><circle fill="#1371FF" stroke="#1371FF" stroke-width="15" r="15" cx="100" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate></circle><circle fill="#1371FF" stroke="#1371FF" stroke-width="15" r="15" cx="160" cy="65"><animate attributeName="cy"  calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate></circle></svg></div>
    </div>

    <!-- Page content goes here -->
    <div class="h-screen bg-gray-100 pt-20">
      <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
      <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
          @foreach ( $products as $product )

          <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
            <img src="{{ $product->product->image }}" alt="product-image" class="w-full  rounded-lg sm:w-40" />
            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
              <div class="mt-5 sm:mt-0">
                <h2 class="text-lg font-bold text-gray-900">{{ $product->product->product_name }}</h2>

                {{-- <p class="mt-1 text-xs text-gray-700">36EU - 4US</p> --}}
              </div>
              <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                <div class="flex items-center border-gray-100">
                  <button data-id="{{ $product->id }}" class="cursor-pointer decrement rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </button>

                  <input disabled class="h-8 w-12 border bg-white text-center qtyInput  text-xs outline-none" type="number" value="{{ $product->quantity }}" min="1" />

                  <button data-id="{{ $product->id }}" class="cursor-pointer rounded-r increment bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                      {{-- <svg aria-hidden="true" class="inline w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                      </svg> --}}
                      <span>+ </span>
                      </button>
                </div>
                <div class="flex items-center space-x-4">
                  <p data-quantity="{{ $product->quantity }}"  class="text-sm price">ksh {{ $product->product->price }}</p>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          {{-- <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
            <img src="https://images.unsplash.com/photo-1587563871167-1ee9c731aefb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1131&q=80" alt="product-image" class="w-full rounded-lg sm:w-40" />
            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
              <div class="mt-5 sm:mt-0">
                <h2 class="text-lg font-bold text-gray-900">Nike Air Max 2019</h2>
                <p class="mt-1 text-xs text-gray-700">36EU - 4US</p>
              </div>
              <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                <div class="flex items-center border-gray-100">
                  <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                  <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="2" min="1" />
                  <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                </div>
                <div class="flex items-center space-x-4">
                  <p class="text-sm">259.000 ₭</p>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
        <!-- Sub total -->
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
          <div class="mb-2 flex justify-between">
            <p class="text-gray-700">Subtotal</p>
            <p class="text-gray-700" id="subTotal">Ksh 0</p>
          </div>
          {{-- <div class="flex justify-between">
            <p class="text-gray-700">Shipping</p>
            <p class="text-gray-700">Ksh3000</p>
          </div> --}}
          <hr class="my-4" />
          <div class="flex justify-between">
            <p class="text-lg font-bold">Total</p>
            <div class="">
              <p class="mb-1 text-lg font-bold" id="total">Ksh 0</p>
              <p class="text-sm text-gray-700">including VAT</p>
            </div>
          </div>
          <a href="/shop/products/{{ $product->cartId }}/checkout" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Checkout
            </span>
          </a>
        </div>
      </div>
    </div>
    </div>


@endif

   <script type="module" src="{{ asset('js/cart.js') }}"></script>


@endsection
