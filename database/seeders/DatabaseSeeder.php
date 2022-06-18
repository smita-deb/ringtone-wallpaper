<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\User;
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

		Category::Create(['name'=>'Classical']) ;
		Category::Create(['name'=>'Animals']) ;
		Category::Create(['name'=>'Funny']) ;
		Category::Create(['name'=>'SMS']) ;
		Category::Create(['name'=>'Alarams']) ;
		Category::Create(['name'=>'Music']) ;
		Category::Create(['name'=>'Nature']) ;
		Category::Create(['name'=>'Holiday']) ;

		User::Create(['name'=>'admin',
			'email'=>'admin@mail.com',
			'password'=>bcrypt('1abc@def'),
			'email_verified_at'=>NOW(),]);

    }
}
