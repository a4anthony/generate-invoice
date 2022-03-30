<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            Template::factory()->create([
                'name' => 'Template ' . $i,
                'image' => '/images/bg.jpg',
                'form_name' => 'default',
            ]);
        }
    }
}
