<?php
 
use Illuminate\Database\Seeder;
 
class PlayerTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('players')->delete();
		$server = 'NA';
		$curl = curl_init('https://na.api.pvp.net/api/lol/na/v2.5/league/challenger?type=RANKED_SOLO_5x5&api_key=aa2ca75b-4a77-4c79-9f73-91e63a3cd70b');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		$players = json_decode($result);
		$entries = $players->entries;
		$playerArray = array();
		$i = 0;
		foreach($entries as $player)
		{
			$temp = ['id' => $i, 'name' => $player->playerOrTeamName, 'rank' => 0, 'playerID' => $player->playerOrTeamId, 
				 'leaguePoints' => $player->leaguePoints, 
				 'cost' => round($player->leaguePoints, -2), 'created_at' => new DateTime,'updated_at' => new DateTime];
				 
			 array_push($playerArray, $temp);
			 $i++;
		}        
        // Uncomment the below to run the seeder
        DB::table('players')->insert($playerArray);
    }
 
}