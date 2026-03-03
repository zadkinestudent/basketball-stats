<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayersTableSeeder extends Seeder
{
    public function run()
    {
        $userId = 1; // Pas dit aan indien nodig

        $players = [
            ['name' => 'Santi Aldama', 'number' => 7, 'position' => 'Forward', 'age' => 25, 'height' => '2.13 m', 'weight' => '97 kg', 'college' => 'Loyola Maryland', 'user_id' => $userId],
            ['name' => 'Kyle Anderson', 'number' => 5, 'position' => 'Forward', 'age' => 32, 'height' => '2.03 m', 'weight' => '104 kg', 'college' => 'UCLA', 'user_id' => $userId],
            ['name' => 'Kentavious Caldwell-Pope', 'number' => 3, 'position' => 'Guard', 'age' => 32, 'height' => '1.96 m', 'weight' => '92 kg', 'college' => 'Georgia', 'user_id' => $userId],
            ['name' => 'Brandon Clarke', 'number' => 15, 'position' => 'Forward', 'age' => 29, 'height' => '2.03 m', 'weight' => '97 kg', 'college' => 'Gonzaga', 'user_id' => $userId],
            ['name' => 'Walter Clayton Jr.', 'number' => 4, 'position' => 'Guard', 'age' => 22, 'height' => '1.93 m', 'weight' => '88 kg', 'college' => 'Florida', 'user_id' => $userId],
            ['name' => 'Cedric Coward', 'number' => 23, 'position' => 'Forward', 'age' => 22, 'height' => '1.96 m', 'weight' => '93 kg', 'college' => 'Washington State', 'user_id' => $userId],
            ['name' => 'Zach Edey', 'number' => 14, 'position' => 'Center', 'age' => 23, 'height' => '2.21 m', 'weight' => '138 kg', 'college' => 'Purdue', 'user_id' => $userId],
            ['name' => 'Taylor Hendricks', 'number' => 22, 'position' => 'Forward', 'age' => 22, 'height' => '2.06 m', 'weight' => '97 kg', 'college' => 'UCF', 'user_id' => $userId],
            ['name' => 'GG Jackson', 'number' => 45, 'position' => 'Forward', 'age' => 21, 'height' => '2.06 m', 'weight' => '95 kg', 'college' => 'South Carolina', 'user_id' => $userId],
            ['name' => 'Ty Jerome', 'number' => 2, 'position' => 'Guard', 'age' => 28, 'height' => '1.96 m', 'weight' => '88 kg', 'college' => 'Virginia', 'user_id' => $userId],
            ['name' => 'Jahmai Mashack', 'number' => 21, 'position' => 'Guard', 'age' => 23, 'height' => '1.91 m', 'weight' => '89 kg', 'college' => 'Tennessee', 'user_id' => $userId],
            ['name' => 'Ja Morant', 'number' => 12, 'position' => 'Guard', 'age' => 26, 'height' => '1.88 m', 'weight' => '78 kg', 'college' => 'Murray State', 'user_id' => $userId],
            ['name' => 'Scotty Pippen Jr.', 'number' => 1, 'position' => 'Guard', 'age' => 25, 'height' => '1.88 m', 'weight' => '77 kg', 'college' => 'Vanderbilt', 'user_id' => $userId],
            ['name' => 'Olivier-Maxence Prosper', 'number' => 18, 'position' => 'Forward', 'age' => 23, 'height' => '2.01 m', 'weight' => '104 kg', 'college' => 'Marquette', 'user_id' => $userId],
            ['name' => 'Javon Small', 'number' => 10, 'position' => 'Guard', 'age' => 23, 'height' => '1.85 m', 'weight' => '86 kg', 'college' => 'West Virginia', 'user_id' => $userId],
            ['name' => 'Cam Spencer', 'number' => 24, 'position' => 'Guard', 'age' => 25, 'height' => '1.91 m', 'weight' => '92 kg', 'college' => 'UConn', 'user_id' => $userId],
            ['name' => 'Jaylen Wells', 'number' => 0, 'position' => 'Forward', 'age' => 22, 'height' => '2.01 m', 'weight' => '93 kg', 'college' => 'Washington State', 'user_id' => $userId],
            ['name' => 'Desmond Bane', 'number' => 22, 'position' => 'Guard', 'age' => 26, 'height' => '1.96 m', 'weight' => '95 kg', 'college' => 'TCU', 'user_id' => $userId],

            // Toegevoegd: vergeten drie spelers
            ['name' => 'Jaren Jackson Jr.', 'number' => 13, 'position' => 'Forward', 'age' => 22, 'height' => '2.11 m', 'weight' => '111 kg', 'college' => 'Michigan State', 'user_id' => $userId],
            ['name' => 'Dillon Brooks', 'number' => 24, 'position' => 'Forward', 'age' => 27, 'height' => '1.96 m', 'weight' => '102 kg', 'college' => 'Oregon', 'user_id' => $userId],
            ['name' => 'Steven Adams', 'number' => 12, 'position' => 'Center', 'age' => 28, 'height' => '2.13 m', 'weight' => '112 kg', 'college' => 'Pittsburgh', 'user_id' => $userId],
        ];

        foreach ($players as $player) {
            Player::create($player);
        }
    }
}