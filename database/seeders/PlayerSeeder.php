<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\User;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            return;
        }

        $players = [

            // Guards
            ['name' => 'Ja Morant', 'number' => 12, 'position' => 'Guard', 'age' => 25, 'height' => '1.88m', 'weight' => '79kg', 'college' => 'Murray State'],
            ['name' => 'Desmond Bane', 'number' => 22, 'position' => 'Guard', 'age' => 26, 'height' => '1.96m', 'weight' => '98kg', 'college' => 'TCU'],
            ['name' => 'Marcus Smart', 'number' => 36, 'position' => 'Guard', 'age' => 30, 'height' => '1.93m', 'weight' => '100kg', 'college' => 'Oklahoma State'],
            ['name' => 'Scotty Pippen Jr.', 'number' => 1, 'position' => 'Guard', 'age' => 24, 'height' => '1.85m', 'weight' => '77kg', 'college' => 'Vanderbilt'],
            ['name' => 'Luke Kennard', 'number' => 10, 'position' => 'Guard', 'age' => 28, 'height' => '1.96m', 'weight' => '93kg', 'college' => 'Duke'],

            // Forwards
            ['name' => 'Jaren Jackson Jr.', 'number' => 13, 'position' => 'Forward', 'age' => 25, 'height' => '2.11m', 'weight' => '111kg', 'college' => 'Michigan State'],
            ['name' => 'GG Jackson', 'number' => 45, 'position' => 'Forward', 'age' => 20, 'height' => '2.06m', 'weight' => '95kg', 'college' => 'South Carolina'],
            ['name' => 'Santi Aldama', 'number' => 7, 'position' => 'Forward', 'age' => 24, 'height' => '2.11m', 'weight' => '102kg', 'college' => 'Loyola Maryland'],
            ['name' => 'Brandon Clarke', 'number' => 15, 'position' => 'Forward', 'age' => 28, 'height' => '2.03m', 'weight' => '97kg', 'college' => 'Gonzaga'],
            ['name' => 'Vince Williams Jr.', 'number' => 5, 'position' => 'Forward', 'age' => 24, 'height' => '1.98m', 'weight' => '93kg', 'college' => 'VCU'],

            // Centers
            ['name' => 'Zach Edey', 'number' => 14, 'position' => 'Center', 'age' => 23, 'height' => '2.24m', 'weight' => '136kg', 'college' => 'Purdue'],
            ['name' => 'Steven Adams', 'number' => 12, 'position' => 'Center', 'age' => 31, 'height' => '2.13m', 'weight' => '120kg', 'college' => 'Pittsburgh'],

            // Oud-spelers (zoals jij wilde)
            ['name' => 'Dillon Brooks', 'number' => 24, 'position' => 'Forward', 'age' => 28, 'height' => '1.96m', 'weight' => '102kg', 'college' => 'Oregon'],
            ['name' => 'Kyle Anderson', 'number' => 5, 'position' => 'Forward', 'age' => 31, 'height' => '2.06m', 'weight' => '104kg', 'college' => 'UCLA'],
            ['name' => 'Tyus Jones', 'number' => 21, 'position' => 'Guard', 'age' => 28, 'height' => '1.83m', 'weight' => '89kg', 'college' => 'Duke'],

        ];

        foreach ($players as $player) {
            Player::create([
                'name' => $player['name'],
                'number' => $player['number'],
                'position' => $player['position'],
                'age' => $player['age'],
                'height' => $player['height'],
                'weight' => $player['weight'],
                'college' => $player['college'],
                'user_id' => $user->id,
            ]);
        }
    }
}