<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tb_user')->insert([
    		'nama' => 'Jquin Nekosuki',
    		'username' => 'developer',
    		'password' => bcrypt('rahasia'),
    		'role' => 'admin'
    	]);

        DB::table('tb_user')->insert([
            'nama' => 'Jquin',
            'username' => 'owner',
            'password' => bcrypt('rahasia'),
            'role' => 'owner'
        ]);

        DB::table('tb_user')->insert([
            'nama' => 'Nekosuki',
            'username' => 'kasir',
            'password' => bcrypt('rahasia'),
            'role' => 'kasir'
        ]);
    }
}
