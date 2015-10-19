<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Data;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(DataTableSeeder::class);

        Model::reguard();
    }
}

class DataTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('datas')->delete();

		for ($i=0; $i < 10; $i++) {
			Data::create([
					'transform'   => rand(1,1000),
					'price'   => number_format(rand(100,100000),2),
					'income'   => rand(100,100000),
			]);
		}
	}

}