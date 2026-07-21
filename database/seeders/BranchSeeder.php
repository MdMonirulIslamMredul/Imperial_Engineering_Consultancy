<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            'Sector 15, P-25 R 4/A, Uttara, Dhaka, Bangladesh.',
            'Rochester Hills, Michigan 48307, USA.',
            '54 Moundsley Grove . B14 4RE Birmingham, UK',
            '93049 Regensburg, Germany.',
            'Dubai Maritime City, P.O.Box 32111, Dubai, United Arab Emirates',
            '2143 Matsudo, Matsudo City, Chiba Prefecture, Japan',
            'Gyonggi-do, Pyonteak-si, pyonteak 4-ro 123, Sinsagae, 1003-ho, S. Korea.',
            'Rue Mermoz Akwa, DOUALA, Cameroon',
            'Amagerbrogade 268, Copenhagen 2300, Denmark',
            'via Belenzani, 19 - 38122 Trento, Italy',
        ];

        foreach ($branches as $branch) {
            \App\Models\Branch::create([
                'address' => $branch,
                'is_active' => 1,
            ]);
        }
    }
}
