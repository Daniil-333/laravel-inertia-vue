<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            'title' => 'Безалкогольные напитки',
            'slug' => Str::of('Безалкогольные напитки')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'Сладкие напитки',
            'slug' => Str::of('Сладкие напитки')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'Фруктовые напитки',
            'slug' => Str::of('Фруктовые напитки')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'Ягодные напитки',
            'slug' => Str::of('Ягодные напитки')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'Мужские напитки',
            'slug' => Str::of('Мужские напитки')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'Овощные напитки',
            'slug' => Str::of('Овощные напитки')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'IT',
            'slug' => Str::of('IT')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => '9 мая',
            'slug' => Str::of('9 мая')->slug('-'),
        ]);

        DB::table('tags')->insert([
            'title' => 'СССР',
            'slug' => Str::of('СССР')->slug('-'),
        ]);
    }
}
