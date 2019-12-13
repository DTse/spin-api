<?php

use Illuminate\Database\Seeder;
use App\Availability;
use App\Locations;
use Carbon\Carbon;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds. 'availability','location','sqMeters','entriesObj'
     *
     * @return void
     */
    public static $entries = [
        [
            'availability' => 'Sale',
            'location' => 'Athens',
            'sqMeters' => '100',
            'price' => '230000',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Athens',
            'sqMeters' => '70',
            'price' => '190000',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Thessalloniki',
            'sqMeters' => '140',
            'price' => '250000',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Patra',
            'sqMeters' => '55',
            'price' => '250',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Patra',
            'sqMeters' => '80',
            'price' => '360',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Athens',
            'sqMeters' => '30',
            'price' => '90000',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Athens',
            'sqMeters' => '40',
            'price' => '120000',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Thessalloniki',
            'sqMeters' => '65',
            'price' => '300',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Thessalloniki',
            'sqMeters' => '65',
            'price' => '300',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Thessalloniki',
            'sqMeters' => '90',
            'price' => '500',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Athens',
            'sqMeters' => '70',
            'price' => '350000',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Chania',
            'sqMeters' => '45',
            'price' => '20000',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Patra',
            'sqMeters' => '55',
            'price' => '35000',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Chania',
            'sqMeters' => '65',
            'price' => '400',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Patra',
            'sqMeters' => '45',
            'price' => '250',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Thessalloniki',
            'sqMeters' => '65',
            'price' => '140000',
        ],
        [
            'availability' => 'Sale',
            'location' => 'Patra',
            'sqMeters' => '210',
            'price' => '340000',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Thessalloniki',
            'sqMeters' => '120',
            'price' => '700',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Patra',
            'sqMeters' => '100',
            'price' => '160',
        ],
        [
            'availability' => 'Rent',
            'location' => 'Patra',
            'sqMeters' => '100',
            'price' => '160',
        ]
    ];
    public function run()
    {
        $entriesObj = [];
        foreach(self::$entries as $entry){
            $entryObj = [
                'availability'=> Availability::where('name', $entry['availability'])->first()->id,
                'location'=> Locations::where('name', $entry['location'])->first()->id,
                'sqMeters'=>$entry['sqMeters'],
                'price'=> $entry['price'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
            array_push($entriesObj, $entryObj);
        }
        DB::table('entries')->insert($entriesObj);
    }
}
