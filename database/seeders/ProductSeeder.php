<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $data = [
            ['product_name' => 'Urinal Tub', 'price' => 4000 , 
            'image' => 'https://images.unsplash.com/photo-1651544861864-5a91fe5353cc?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8dXJpbmFsfGVufDB8fDB8fHww' , 
            'categoryId' => 1 , 
            'size'=>'LARGE' ,
            'quantity' =>13,
            "description" => 'Durable strong urinal tub made in japan does not catch dirt too match and does not break easily',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],

        [
            'product_name' => 'Kitchen Tap', 
            'price' => 2050 , 
            'image' => 'https://images.unsplash.com/photo-1609210885411-3e3b43673bea?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8a2l0Y2hlbiUyMHRhcHxlbnwwfHwwfHx8MA%3D%3D' , 
            'categoryId' => 6 , 
            "description" => 'High quality kitchen tap that does not leak water and can serve upto 10years without being spoilt',
            'size'=>'SMALL' ,
            'quantity' =>9,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'product_name' => 'Kitchen Sink', 
            'price' => 6000 , 
            'image' => 'https://images.unsplash.com/photo-1609210884848-2d530cfb2a07?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8a2l0Y2hlbiUyMHNpbmt8ZW58MHx8MHx8fDA%3D' , 
            'categoryId' => 5 , 
            "description" => 'Nice quality stuff with too much durability jfhjds;fjksdjfsdfjhjhswe889erew9r09ewr-wer=ewr=wrwehfdshfjhdskfldfjdf',
            'size'=>'SMALL' ,
            'quantity' =>100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Product::insert($data);
    }
}
