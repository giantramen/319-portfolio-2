<?php
 
use Illuminate\Database\Seeder;
 
class LobbiesSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('lobbies')->delete();
		$lobbies = array(
            ['id' => 1, 'matchType' => 'HTH', 'startTime' => new DateTime, 'entryFee' => 1, 'numberOfPlayers' => 0,  'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'matchType' => 'HTH', 'startTime' => new DateTime, 'entryFee' => 2, 'numberOfPlayers' => 0,  'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'matchType' => 'HTH', 'startTime' => new DateTime, 'entryFee' => 3, 'numberOfPlayers' => 0,  'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'matchType' => 'HTH', 'startTime' => new DateTime, 'entryFee' => 4, 'numberOfPlayers' => 0,  'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'matchType' => 'HTH', 'startTime' => new DateTime, 'entryFee' => 5, 'numberOfPlayers' => 0,  'created_at' => new DateTime, 'updated_at' => new DateTime],
        ); 
        // Uncomment the below to run the seeder
        DB::table('lobbies')->insert($lobbies);
    }
 
}