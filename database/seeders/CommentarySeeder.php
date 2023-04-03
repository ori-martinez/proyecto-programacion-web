<?php

namespace Database\Seeders;

use App\Models\Commentary;
use Illuminate\Database\Seeder;

class CommentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentary::factory()->count(10)->create();
    }
}
