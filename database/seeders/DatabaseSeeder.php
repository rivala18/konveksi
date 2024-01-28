<?php

namespace Database\Seeders;

use App\Models\Debtor;
use App\Models\Employe;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'productName'=>'Pashmina Inner',
            'price'=>'22500'
        ]);
        Product::create([
            'productName'=>'Pashmina Square',
            'price'=>'25000'
        ]);

        Employe::create([
            'name'=>'Dadang',
            'address'=>'BBKN',
            'role_id'=>'1'
        ]);
        Employe::create([
            'name'=>'Fauzi',
            'address'=>'CIKOPO',
            'role_id'=>'2'
        ]);
        Employe::create([
            'name'=>'Ival',
            'address'=>'BBKN',
            'role_id'=>'3'
        ]);

        Retailer::create([
            'name'=>'Bohel',
            'address'=>'BBKN'
        ]);
        Retailer::create([
            'name'=>'Nap Nap',
            'address'=>'BBKN'
        ]);
        Retailer::create([
            'name'=>'Hj.Beben',
            'address'=>'BBKN'
        ]);

        Role::create([
            'role_name'=>'Penjahit'
        ]);
        Role::create([
            'role_name'=>'Pengepak'
        ]);
        Role::create([
            'role_name'=>'Pemotong'
        ]);
        
    }
}
