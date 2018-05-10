<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Bitcoin news';
        $t2 = 'Etherum price is ...';
        $t3 = 'Verge is avesome';
        $t4 = 'Dash peace of shit';
        $t5 = 'MIOTA new incomings';


        $d1 = [
            'title' => $t1,
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)

        ];

        $d2 = [
            'title' => $t2,
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but',
            'channel_id' => 7,
            'user_id' => 2,
            'slug' => str_slug($t2)

        ];

        $d3 = [
            'title' => $t3,
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but',
            'channel_id' => 5,
            'user_id' => 2,
            'slug' => str_slug($t3)

        ];

        $d4 = [
            'title' => $t4,
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but',
            'channel_id' => 6,
            'user_id' => 2,
            'slug' => str_slug($t4)

        ];

        $d5 = [
            'title' => $t5,
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but',
            'channel_id' => 3,
            'user_id' => 2,
            'slug' => str_slug($t5)

        ];

    Discussion::create($d1);
    Discussion::create($d2);
    Discussion::create($d3);
    Discussion::create($d4);
    Discussion::create($d5);

    }
}
