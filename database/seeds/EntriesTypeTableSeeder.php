<?php

use Illuminate\Database\Seeder;
use App\Type;

use Carbon\Carbon;

class EntriesTypeTableSeeder extends Seeder
{
    public static $entries = [
        ['Apartment'],
        ['Apartment', 'Studio'],
        ['Apartment'],
        ['Apartment'],
        ['Apartment', 'Loft'],
        ['Studio'],
        ['Studio'],
        ['Studio', 'Loft'],
        ['Studio'],
        ['Studio'],
        ['Loft', 'Apartment',  'Studio'],
        ['Loft'],
        ['Loft'],
        ['Loft'],
        ['Loft'],
        ['Maisonette', 'Apartment'],
        ['Maisonette'],
        ['Maisonette'],
        ['Maisonette'],
        ['Maisonette'],
    ];
    public function run()
    {
        $entriesObj = [];
        foreach(self::$entries as $key=>$entry){
            foreach ($entry as $area) {
                $entryObj = [
                    'entries_id'=> $key+1,
                    'type_id'=> Type::where('name', $area)->first()->id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];
                array_push($entriesObj, $entryObj);
            }
        }
        DB::table('entries_type')->insert($entriesObj);
    }
}
