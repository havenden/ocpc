<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'display_name' => '管理员',
            'password' => Hash::make('adming'),
        ]);
        DB::table('counts')->insert([
            'name' => '太乙堂nh',
            'password' => 'FStyt2020.99',
            'description' => '',
        ]);
        DB::table('conv_types')->insert([
            ['id' => '1', 'name' => '激活'],
            ['id' => '2', 'name' => '下载'],
            ['id' => '3', 'name' => '浏览关键词页面'],
            ['id' => '5', 'name' => '表单提交'],
            ['id' => '6', 'name' => '拨打电话'],
            ['id' => '10', 'name' => '提交订单'],
            ['id' => '11', 'name' => '购买'],
            ['id' => '12', 'name' => '注册'],
            ['id' => '13', 'name' => '在线咨询'],
            ['id' => '14', 'name' => '其他'],
            ['id' => '15', 'name' => '访客数'],
        ]);
    }
}
