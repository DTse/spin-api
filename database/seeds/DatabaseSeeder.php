<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AvailabilityTableSeeder');
        $this->call('LocationsTableSeeder');
        $this->call('TypeTableSeeder');
        $this->call('EntriesTableSeeder');
        $this->call('EntriesTypeTableSeeder');
    }
}
