<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'General',
                'hashtags' => [
                    ['hashtag' => 'photooftheday', 'priority' => 874000000],
                    ['hashtag' => 'picoftheday', 'priority' => 620000000],
                    ['hashtag' => 'smile', 'priority' => 388000000],
                    ['hashtag' => 'happy', 'priority' => 613000000],
                    ['hashtag' => 'goodtime', 'priority' => 66000000],
                    ['hashtag' => 'goodvibes', 'priority' => 102000000],
                    ['hashtag' => 'instagood', 'priority' => 1000000000],
                    ['hashtag' => 'instaphoto', 'priority' => 106000000],
                    ['hashtag' => 'daily', 'priority' => 140000000],
                    ['hashtag' => 'bestday', 'priority' => 5000000],
                    ['hashtag' => 'follow', 'priority' => 614000000],
                ]
            ],
            [
                'title' => 'Cats',
                'hashtags' => [
                    ['hashtag' => 'catsofinstagram', 'priority' => 152000000],
                    ['hashtag' => 'catoftheday', 'priority' => 29000000],
                    ['hashtag' => 'instacat', 'priority' => 52000000],
                    ['hashtag' => 'instagramcats', 'priority' => 10000000],
                    ['hashtag' => 'cat', 'priority' => 228000000],
                    ['hashtag' => 'catlife', 'priority' => 22000000],
                    ['hashtag' => 'catlover', 'priority' => 28000000],
                    ['hashtag' => 'catloversclub', 'priority' => 7000000],
                    ['hashtag' => 'pets', 'priority' => 41000000],
                    ['hashtag' => 'meow', 'priority' => 41000000],
                    ['hashtag' => 'meowmeow', 'priority' => 2000000],
                    ['hashtag' => 'indoorcat', 'priority' => 246000],
                ]
            ],
            [
                'title' => 'Cats - Little One',
                'hashtags' => [
                    ['hashtag' => 'balinesecat', 'priority' => 83000],
                    ['hashtag' => 'balinesecats', 'priority' => 8000],
                    ['hashtag' => 'balinese', 'priority' => 2000000],
                    ['hashtag' => 'balinesecatsofinstagram', 'priority' => 15000],
                    ['hashtag' => 'whitecats', 'priority' => 582000],
                    ['hashtag' => 'whitecat', 'priority' => 4000000],
                ]
            ],
            [
                'title' => 'Cats - Mama',
                'hashtags' => [
                    ['hashtag' => 'tortiesofinstagram', 'priority' => 2000],
                    ['hashtag' => 'tortoiseshell', 'priority' => 10000],
                    ['hashtag' => 'tortoiseshellcat', 'priority' => 14000],
                    ['hashtag' => 'torties', 'priority' => 163000],
                    ['hashtag' => 'tortietude', 'priority' => 368000],
                ]
            ],
            [
                'title' => 'Cats - Kitten',
                'hashtags' => [
                    ['hashtag' => 'greycatsofinstagram', 'priority' => 285000],
                    ['hashtag' => 'greycat', 'priority' => 2000000],
                    ['hashtag' => 'greycats', 'priority' => 306000],
                    ['hashtag' => 'greycatsrule', 'priority' => 74000],
                    ['hashtag' => 'greycatclub', 'priority' => 53000],
                ]
            ],
            [
                'title' => 'Pittsburgh',
                'hashtags' => [
                    ['hashtag' => 'pittsburgh', 'priority' => 7000000],
                    ['hashtag' => 'pittsburghpa', 'priority' => 258000],
                    ['hashtag' => 'burgh', 'priority' => 98000],
                    ['hashtag' => 'pgh', 'priority' => 876000],
                    ['hashtag' => 'steelcity', 'priority' => 525000],
                    ['hashtag' => 'lovepgh', 'priority' => 92000],
                    ['hashtag' => 'pennsylvania', 'priority' => 5000000],
                    ['hashtag' => 'lawrenceville', 'priority' => 286000],
                ]
            ],
            [
                'title' => 'Friends',
                'hashtags' => [
                    ['hashtag' => 'friends', 'priority' => 412000000],
                    ['hashtag' => 'bff', 'priority' => 61000000],
                    ['hashtag' => 'bestfriends', 'priority' => 63000000],
                ]
            ],
            [
                'title' => 'Family',
                'hashtags' => [
                    ['hashtag' => 'family', 'priority' => 381000000],
                    ['hashtag' => 'familyphotos', 'priority' => 2000000],
                ]
            ],
            [
                'title' => 'Gay - General',
                'hashtags' => [
                    ['hashtag' => 'gay', 'priority' => 88000000],
                    ['hashtag' => 'lgbt', 'priority' => 39000000],
                    ['hashtag' => 'loveislove', 'priority' => 32000000],
                    ['hashtag' => 'gayman', 'priority' => 12000000],
                    ['hashtag' => 'gaymen', 'priority' => 9000000],
                    ['hashtag' => 'gayboy', 'priority' => 29000000],
                    ['hashtag' => 'gaypride', 'priority' => 13000000],
                    ['hashtag' => 'pittsburghgay', 'priority' => 3000],
                    ['hashtag' => 'gaypittsburgh', 'priority' => 4000],
                    ['hashtag' => 'gayworld', 'priority' => 3000000],
                ]
            ],
            [
                'title' => 'Gay - Couple',
                'hashtags' => [
                    ['hashtag' => 'boyfriend', 'priority' => 40000000],
                    ['hashtag' => 'couple', 'priority' => 61000000],
                    ['hashtag' => 'gaycouple', 'priority' => 4000000],
                ]
            ],
            [
                'title' => 'Gay - Bearded',
                'hashtags' => [
                    ['hashtag' => 'bearded', 'priority' => 11000000],
                    ['hashtag' => 'beardedgay', 'priority' => 2000000],
                    ['hashtag' => 'beardedmen', 'priority' => 4000000],
                ]
            ],
            [
                'title' => 'Wellness / Self Care / Self Love',
                'hashtags' => [
                    ['hashtag' => 'selfcare', 'priority' => 40000000],
                    ['hashtag' => 'selfcareday', 'priority' => 577000],
                    ['hashtag' => 'selfcarefirst', 'priority' => 770000],
                    ['hashtag' => 'selflove', 'priority' => 55000000],
                    ['hashtag' => 'loveyourself', 'priority' => 73000000],
                    ['hashtag' => 'beyourself', 'priority' => 16000000],
                    ['hashtag' => 'wellness', 'priority' => 44000000],
                    ['hashtag' => 'wellnessweek', 'priority' => 30000],
                    ['hashtag' => 'selfhealing', 'priority' => 1000000],
                    ['hashtag' => 'gratitude', 'priority' => 28000000],
                    ['hashtag' => 'awareness', 'priority' => 9500000],
                    ['hashtag' => 'mindset', 'priority' => 30000000],
                    ['hashtag' => 'selfworth', 'priority' => 4000000],
                    ['hashtag' => 'natural', 'priority' => 76000000],
                ]
            ],
            [
                'title' => 'Face Mask',
                'hashtags' => [
                    ['hashtag' => 'facemask', 'priority' => 7000000],
                    ['hashtag' => 'facecream', 'priority' => 417000],
                    ['hashtag' => 'skinlove', 'priority' => 536000],
                    ['hashtag' => 'exfoliate', 'priority' => 1000000],
                ]
            ],
            [
                'title' => 'Throwback - General',
                'hashtags' => [
                    ['hashtag' => 'throwback', 'priority' => 116000000],
                    ['hashtag' => 'retroaesthetic', 'priority' => 1800000],
                    ['hashtag' => 'retrovibes', 'priority' => 305000],
                    ['hashtag' => 'retro', 'priority' => 40000000],
                    ['hashtag' => 'oldschool', 'priority' => 27000000],
                ]
            ],
            [
                'title' => 'Throwback - 90s',
                'hashtags' => [
                    ['hashtag' => '90s', 'priority' => 20000000],
                    ['hashtag' => '90saesthetic', 'priority' => 4000000],
                    ['hashtag' => '90sbaby', 'priority' => 881000],
                ]
            ],
        ];

        foreach($data as $item)
        {
            $group1 = \App\Group::create(['title' => $item['title'], 'user_id' => 1]);
            $group2 = \App\Group::create(['title' => $item['title'], 'user_id' => 2]);

            foreach($item['hashtags']  as $tag)
            {
                $group1->hashtags()->create(['hashtag' => $tag['hashtag'], 'priority' => $tag['priority'], 'user_id' => 1]);
                $group2->hashtags()->create(['hashtag' => $tag['hashtag'], 'priority' => $tag['priority'], 'user_id' => 2]);
            }
        }
    }
}
