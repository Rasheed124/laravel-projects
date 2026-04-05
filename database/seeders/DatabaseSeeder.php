<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
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
        // $this->call(CompanySeeder::class);
        // $this->call([
        //     CompanySeeder::class,
        //     ContactSeeder::class,
        // ]);
        // Company::factory()->count(10)->create();
        Company::factory(10)->hasContacts(10)->create();

    }
}
