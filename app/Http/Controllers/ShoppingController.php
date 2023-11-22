<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ShoppingController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function show(Request $request, $id)
    {
        $product =  Product::where('id', $id)->with('category')->first();
        return view('shop.show', ['product' => $product]);
    }
    public function addToCart(Request $request)
    {
        $userId =  $request->user()->id;
        $validator = $request->validate([
            'productId' => 'required|integer',
        ]);
        $cart = Cart::where('userId', $userId)->first();
        //return $cart;
        if (!$cart) {
            $newCart = Cart::create([
                'userId' => $userId
            ]);

            CartItem::create(['productId' => $validator['productId'], 'quantity' => 1, 'cartId' => $newCart->id]);

            return redirect("/shop/products")->with('cart', 'Item Added Successfully in Cart');
        }
        $existingProduct = DB::table('cart_items')->where([['productId', '=', $validator['productId']], ['cartId', '=', $cart->id]])->get();
        if (count($existingProduct) > 0) {
            DB::table('cart_items')->where('id', '=', $existingProduct[0]->id)->update(['quantity' => $existingProduct[0]->quantity + 1]);
            return redirect("/shop/products")->with('qty', 'Item Added Successfully');
        }

        CartItem::create(['productId' => $validator['productId'], 'quantity' => 1, 'cartId' => $cart->id]);
        return redirect("/shop/products")->with('cart', 'Item Added Successfully in Cart');
    }

    public function getCart(Request $request)
    {
        $totalQuantity = 0;

        $userId = $request->user()->id;

        $cart = Cart::where('userId', $userId)->first();

        if (!$cart) {

            $newCart = Cart::create([
                'userId' => $userId
            ]);
            return redirect('/shop/products/getcart');
        }

        $cartItems = CartItem::where('cartId', $cart->id)->with('product')->get();

        if (count($cartItems) <= 0)  return view('shop.cart', ['products' => []]);

        foreach ($cartItems as $c) {

            $totalQuantity =  $totalQuantity + $c->quantity;
        }

        return view('shop.cart', ['products' => $cartItems]);
    }

    public function checkOutPage(Request $request, $id)
    {
        $cartItems = CartItem::where('cartId', $id)->with('product')->get();
        $subTotal = 0;
        foreach($cartItems as $item){
            $subTotal = $subTotal + $item->quantity * $item->product->price; 
        }
        $counties = [
            "Baringo",
            "Bomet",
            "Bungoma",
            "Busia",
            "Elgeyo Marakwet", "Embu", "garissa", "Homa Bay", "Isiolo",
            "Kajiado", "Kakamega", "Kericho", "Kiambu", "Kilifi", "Kirinyaga",
            "Kisii", "Kisumu", "Kitui", "Kwale", "Laikipia", "Lamu", "Machakos", "Makueni", "Mandera",
            "Meru", "Migori", "Marsabit", "Mombasa", "Muranga", "Nairobi", "Nakuru", "Nandi", "Narok", "Nyamira",
            "Nyandarua", "Nyeri", "Samburu", "Siaya", "Taita Taveta", "Tana River", "Tharaka Nithi", "Trans nzoia",
            "Turkana", "Uasin Gishu", "Vihiga", "Wajir",
            "Pokot"
        ];
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        return view('shop.checkout', ['products' => $cartItems, 'countries' => $countries , 'counties' => $counties , 'subTotal' => $subTotal]);
    }
}
