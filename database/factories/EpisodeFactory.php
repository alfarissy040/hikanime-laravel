<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $angka = mt_rand(1,24);
        if($angka < 10){
            $episode = '0'.$angka;
        }
        else {
            $episode = $angka;
        }

        return [
            'anime_id' => mt_rand(1,20),
            'episode' => 'Episode '. $episode,
            'slug' => 'Episode-'. $episode,
            'video_360p' => '#',
            'video_480p' => '#',
            'video_720p' => '#',
        ];
    }
}
