<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        DB::table('contacts')->delete();

        DB::table('contacts')->insert([
            'id' => 'address',
            'content' => '169 Bui Vien, District 1, Ho Chi Minh City'
        ]);

        DB::table('contacts')->insert([
            'id' => 'email',
            'content' => 'thaikhuong1996@gmail.com'
        ]);

        DB::table('contacts')->insert([
            'id' => 'phone',
            'content' => '0122 4712 236'
        ]);

        DB::table('contacts')->insert([
            'id' => 'facebook',
            'content' => 'https://www.facebook.com/bee.bracelet/'
        ]);

        DB::table('contacts')->insert([
            'id' => 'instagram',
            'content' => 'https://www.instagram.com/bee_bracelet/'
        ]);
    }
}
