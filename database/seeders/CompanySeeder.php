<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;

use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $companies = [];
        $faker     = Faker::create();

        foreach (range(1, 10) as $index) {
            $company = [
                'name'       => $name = "Comapny $index",
                'address'    => "Address $name",
                'website'    => "Website $name",
                'email'      => "Email $name",
                'name'       => $faker->company(),
                'address'    => $faker->address(),
                'website'    => $faker->domainName(),
                'email'      => $faker->email(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $companies[] = $company;
        }

        DB::table('companies')->delete();
        DB::table('companies')->insert($companies);
    }
}
