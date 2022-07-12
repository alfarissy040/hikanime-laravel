<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Download>
 */
class DownloadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $angka = mt_rand(1,12);
        if($angka < 10){
            $data = '0'.$angka;
        }
        else {
            $data = $angka;
        }
        return [
            'anime_id' => mt_rand(1,20),
            'judul' => 'Batch Episode '. $data . '-' . mt_rand(13,24),
            'slug' => $this->faker->slug(mt_rand(1,5)),
        ];
    }
}
