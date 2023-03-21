<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => '家事',
        ];
        Tag::create($param);

        $param = [
            'id' => '2',
            'name' => '勉強',
        ];
        Tag::create($param);
        $param = [
            'id' => '3',
            'name' => '運動',
        ];
        Tag::create($param);
        $param = [
            'id' => '4',
            'name' => '食事',
        ];
        Tag::create($param);
        $param = [
            'id' => '5',
            'name' => '移動',
        ];
        Tag::create($param);
    }
}
