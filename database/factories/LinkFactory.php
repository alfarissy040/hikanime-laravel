<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $resolusi = ['360p', '480p', '720p'];

        return [
            'episode_id' => mt_rand(1,50),
            'download_id' => mt_rand(1,50),
            'resolusi' => $resolusi[mt_rand(0,2)],
            'g_drive' => '#',
            'g_share' => '#',
            'acefile' => '#',
            'mega' => '#',
            'mirror' => '#',
        ];
    }
}
