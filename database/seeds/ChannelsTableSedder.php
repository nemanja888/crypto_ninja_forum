<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Bitcoin','slug'=>str_slug('Bitcoin')];
        $channel2 = ['title' => 'ZCash','slug'=>str_slug('ZCash')];
        $channel3 = ['title' => 'MIOTA','slug'=>str_slug('MIOTA')];
        $channel4 = ['title' => 'BitcoinCash','slug'=>str_slug('BitcoinCash')];
        $channel5 = ['title' => 'Verge','slug'=>str_slug('Verge')];
        $channel6 = ['title' => 'Dash','slug'=>str_slug('Dash')];
        $channel7 = ['title' => 'Ethereum','slug'=>str_slug('Ethereum')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
    }
}
