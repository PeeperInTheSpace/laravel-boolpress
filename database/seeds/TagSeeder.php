<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Rock','Blues', 'Metal', 'House', 'Jazz', 'Punk', 'Trento', 'Milano', 'Roma', 'Catania'];

        foreach($tags as $model) {

            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($tag->name);
            $tag->save();
        }
    }
}
