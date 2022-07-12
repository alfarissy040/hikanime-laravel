<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => '#',
            'img_bg' => '#',
            'judul' => $this->faker->sentence(mt_rand(1,3)),
            'alter_judul' => $this->faker->sentence(mt_rand(1,3)),
            'slug' => $this->faker->slug(mt_rand(1,3)),
            'deskripsi' => collect($this->faker->paragraphs(mt_rand(9,20)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'excerpt' => $this->faker->sentence(mt_rand(15,30)),
            'produser' => $this->faker->name(),
            'studio' => $this->faker->userAgent(),
            'genre' => 'Shounen, Comedy',
            'skor' => mt_rand(1,10),
            'tipe' => 'tv',
            'status' => 'Airing',
            'total_episode' => mt_rand(12,24),
            'durasi' => '24',
            'tanggal_rilis' => $this->faker->dateTime(),
        ];
    }
}
