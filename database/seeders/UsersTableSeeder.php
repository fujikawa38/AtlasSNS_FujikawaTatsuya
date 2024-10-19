<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期レコード
        DB::table('users')->insert([
            ['username' => 'fuji',
            'email' => 'a@mail.com',
            'password' => bcrypt('12345678')   //MD5じゃない！
            //'password' => AES_ENCRYPT('1234', UNHEX(SHA2('key', 512)))   //undefined function → 未定義の関数になる
            ],
            ['username' => 'aso',
            'email' => 'i@mail.com',
            'password' => bcrypt('12345678')
            ],
            ['username' => 'tsukuba',
            'email' => 'u@mail.com',
            'password' => bcrypt('12345678')
            ],
        ]);
    }
}
