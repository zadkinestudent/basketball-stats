<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class GrizzliesSeeder extends Seeder
{
    public function run()
    {
        // Gebruik hier de user_id van de gebruiker waarmee je test
        $userId = 1; // Pas aan naar jouw test-gebruiker ID

        $players = [
            ['name' => 'Santi Aldama', 'number' => 7, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'Kyle Anderson', 'number' => 5, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'Kentavious Caldwell-Pope', 'number' => 3, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Brandon Clarke', 'number' => 15, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'Walter Clayton Jr.', 'number' => 4, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Cedric Coward', 'number' => 23, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'Zach Edey', 'number' => 14, 'position' => 'Center', 'user_id' => $userId],
            ['name' => 'Taylor Hendricks', 'number' => 22, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'GG Jackson', 'number' => 45, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'Ty Jerome', 'number' => 2, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Jahmai Mashack', 'number' => 21, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Ja Morant', 'number' => 12, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Scotty Pippen Jr.', 'number' => 1, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Olivier-Maxence Prosper', 'number' => 18, 'position' => 'Forward', 'user_id' => $userId],
            ['name' => 'Javon Small', 'number' => 10, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Cam Spencer', 'number' => 24, 'position' => 'Guard', 'user_id' => $userId],
            ['name' => 'Jaylen Wells', 'number' => 0, 'position' => 'Forward', 'user_id' => $userId],
        ];

        foreach ($players as $player) {
            Player::create($player);
        }
    }
}