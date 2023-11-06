@extends('layouts.main')

@section('title' , 'Checkout')

@section('content')

<!-- component --> 
<div class="leading-loose mt-[6rem] flex flex-col justify-center items-center">
  <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
    <p class="text-gray-800 font-medium">Customer information</p>
    <div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Name</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Your Name" aria-label="Name">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Email</label>
      <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Your Email" aria-label="Email">
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Street" aria-label="Email">
    </div>
    <div class="mt-2">
      <label class="hidden text-sm block text-gray-600" for="cus_email">County</label>
      <select class="w-full">
        <option value="baringo">Baringo</option>
        <option value="bomet">Bomet</option>
        <option value="bungoma">Bungoma</option>
        <option value="busia">Busia</option>
        <option value="elgeyo marakwet">Elgeyo Marakwet</option>
        <option value="embu">Embu</option>
        <option value="garissa">Garissa</option>
        <option value="homa bay">Homa Bay</option>
        <option value="isiolo">Isiolo</option>
        <option value="kajiado">Kajiado</option>
        <option value="kakamega">Kakamega</option>
        <option value="kericho">Kericho</option>
        <option value="kiambu">Kiambu</option>
        <option value="kilifi">Kilifi</option>
        <option value="kirinyaga">Kirinyaga</option>
        <option value="kisii">Kisii</option>
        <option value="kisumu">Kisumu</option>
        <option value="kitui">Kitui</option>
        <option value="kwale">Kwale</option>
        <option value="laikipia">Laikipia</option>
        <option value="lamu">Lamu</option>
        <option value="machakos">Machakos</option>
        <option value="makueni">Makueni</option>
        <option value="mandera">Mandera</option>
        <option value="meru">Meru</option>
        <option value="migori">Migori</option>
        <option value="marsabit">Marsabit</option>
        <option value="mombasa">Mombasa</option>
        <option value="muranga">Muranga</option>
        <option value="nairobi">Nairobi</option>
        <option value="nakuru">Nakuru</option>
        <option value="nandi">Nandi</option>
        <option value="narok">Narok</option>
        <option value="nyamira">Nyamira</option>
        <option value="nyandarua">Nyandarua</option>
        <option value="nyeri">Nyeri</option>
        <option value="samburu">Samburu</option>
        <option value="siaya">Siaya</option>
        <option value="taita taveta">Taita Taveta</option>
        <option value="tana river">Tana River</option>
        <option value="tharaka nithi">Tharaka Nithi</option>
        <option value="trans nzoia">Trans Nzoia</option>
        <option value="turkana">Turkana</option>
        <option value="uasin gishu">Uasin Gishu</option>
        <option value="vihiga">Vihiga</option>
        <option value="wajir">Wajir</option>
        <option value="pokot">West Pokot</option>
    </select>
    </div>
    <div class="inline-block mt-2 w-1/2 pr-1">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Country</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Country" aria-label="Email">
    </div>
    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="cus_email" type="text" required="" placeholder="Zip" aria-label="Email">
    </div>
    <p class="mt-4 text-gray-800 font-medium">Payment information</p>
    <div class="">
      <label class="block text-sm text-gray-600" for="cus_name">Card</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Card Number MM/YY CVC" aria-label="Name">
    </div>
    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">$3.00</button>
    </div>
  </form>
</div>
  
  @push('scripts')
    <script src="{{ asset('js/checkout.js') }}" type="module"></script>
  @endpush
    
@endsection