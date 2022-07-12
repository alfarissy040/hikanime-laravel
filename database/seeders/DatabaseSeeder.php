<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use App\Models\Anime;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Download;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@hikanime.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        Anime::factory(20)->create();
        Link::factory(30)->create();
        Episode::factory(50)->create();
        Download::factory(50)->create();
    
        Genre::create([ 'nama' => 'Action', 'slug' => 'action' ]);
        Genre::create([ 'nama' => 'Adventure', 'slug' => 'adventure' ]);
        Genre::create([ 'nama' => 'Cars', 'slug' => 'cars' ]);
        Genre::create([ 'nama' => 'Comedy', 'slug' => 'comedy' ]);
        Genre::create([ 'nama' => 'Crime', 'slug' => 'crime' ]);
        Genre::create([ 'nama' => 'Demons', 'slug' => 'demons' ]);
        Genre::create([ 'nama' => 'Drama', 'slug' => 'drama' ]);
        Genre::create([ 'nama' => 'Ecchi', 'slug' => 'ecchi' ]);
        Genre::create([ 'nama' => 'Fantasy', 'slug' => 'fantasy' ]);
        Genre::create([ 'nama' => 'Game', 'slug' => 'game' ]);
        Genre::create([ 'nama' => 'Gourmet', 'slug' => 'gourmet' ]);
        Genre::create([ 'nama' => 'Harem', 'slug' => 'harem' ]);
        Genre::create([ 'nama' => 'Historical', 'slug' => 'historical' ]);
        Genre::create([ 'nama' => 'Horror', 'slug' => 'horror' ]);
        Genre::create([ 'nama' => 'Josei', 'slug' => 'josei' ]);
        Genre::create([ 'nama' => 'Kids', 'slug' => 'kids' ]);
        Genre::create([ 'nama' => 'Magic', 'slug' => 'magic' ]);
        Genre::create([ 'nama' => 'Martial Arts', 'slug' => 'martial-arts' ]);
        Genre::create([ 'nama' => 'Mecha', 'slug' => 'mecha' ]);
        Genre::create([ 'nama' => 'Military', 'slug' => 'military' ]);
        Genre::create([ 'nama' => 'Music', 'slug' => 'music' ]);
        Genre::create([ 'nama' => 'Mystery', 'slug' => 'mystery' ]);
        Genre::create([ 'nama' => 'Parody', 'slug' => 'parody' ]);
        Genre::create([ 'nama' => 'Police', 'slug' => 'police' ]);
        Genre::create([ 'nama' => 'Psychological', 'slug' => 'psychological' ]);
        Genre::create([ 'nama' => 'Romance', 'slug' => 'romance' ]);
        Genre::create([ 'nama' => 'Samurai', 'slug' => 'samurai' ]);
        Genre::create([ 'nama' => 'School', 'slug' => 'school' ]);
        Genre::create([ 'nama' => 'Sci-fi', 'slug' => 'sci-fi' ]);
        Genre::create([ 'nama' => 'Seinen', 'slug' => 'seinen' ]);
        Genre::create([ 'nama' => 'Shoujo', 'slug' => 'shoujo' ]);
        Genre::create([ 'nama' => 'Soujo Ai', 'slug' => 'shoujo-ai' ]);
        Genre::create([ 'nama' => 'Shounen', 'slug' => 'shounen' ]);
        Genre::create([ 'nama' => 'Shounen Ai', 'slug' => 'shounen-ai' ]);
        Genre::create([ 'nama' => 'Slice of Life', 'slug' => 'slice-of-life' ]);
        Genre::create([ 'nama' => 'Space', 'slug' => 'space' ]);
        Genre::create([ 'nama' => 'Sports', 'slug' => 'sports' ]);
        Genre::create([ 'nama' => 'Super Power', 'slug' => 'super-power' ]);
        Genre::create([ 'nama' => 'Supernatural', 'slug' => 'supernatural' ]);
        Genre::create([ 'nama' => 'Suspense', 'slug' => 'suspense' ]);
        Genre::create([ 'nama' => 'Thriller', 'slug' => 'thriller' ]);
        Genre::create([ 'nama' => 'Vampire', 'slug' => 'vampire' ]);
        


        // Genre::create(
        //     [
        //         [
        //             'nama' => 'Action',
        //             'slug' => 'action'
        //         ],
        //         [
        //             'nama' => 'Adventure',
        //             'slug' => 'adventure'
        //         ],
        //         [
        //             'nama' => 'Cars',
        //             'slug' => 'cars'
        //         ],
        //         [
        //             'nama' => 'Comedy',
        //             'slug' => 'comedy'
        //         ],
        //         [
        //             'nama' => 'Crime',
        //             'slug' => 'crime'
        //         ],
        //         [
        //             'nama' => 'Demons',
        //             'slug' => 'demons'
        //         ],
        //         [
        //             'nama' => 'Drama',
        //             'slug' => 'drama'
        //         ],
        //         [
        //             'nama' => 'Ecchi',
        //             'slug' => 'ecchi'
        //         ],
        //         [
        //             'nama' => 'Fantasy',
        //             'slug' => 'fantasy'
        //         ],
        //         [
        //             'nama' => 'Game',
        //             'slug' => 'game'
        //         ],
        //         [
        //             'nama' => 'Gourmet',
        //             'slug' => 'gourmet'
        //         ],
        //         [
        //             'nama' => 'Harem',
        //             'slug' => 'harem'
        //         ],
        //         [
        //             'nama' => 'Historical',
        //             'slug' => 'historical'
        //         ],
        //         [
        //             'nama' => 'Horror',
        //             'slug' => 'horror'
        //         ],
        //         [
        //             'nama' => 'Josei',
        //             'slug' => 'josei'
        //         ],
        //         [
        //             'nama' => 'Kids',
        //             'slug' => 'kids'
        //         ],
        //         [
        //             'nama' => 'Magic',
        //             'slug' => 'magic'
        //         ],
        //         [
        //             'nama' => 'Martial Arts',
        //             'slug' => 'martial-arts'
        //         ],
        //         [
        //             'nama' => 'Mecha',
        //             'slug' => 'mecha'
        //         ],
        //         [
        //             'nama' => 'Military',
        //             'slug' => 'military'
        //         ],
        //         [
        //             'nama' => 'Music',
        //             'slug' => 'music'
        //         ],
        //         [
        //             'nama' => 'Mystery',
        //             'slug' => 'mystery'
        //         ],
        //         [
        //             'nama' => 'Parody',
        //             'slug' => 'parody'
        //         ],
        //         [
        //             'nama' => 'Police',
        //             'slug' => 'police'
        //         ],
        //         [
        //             'nama' => 'Psychological',
        //             'slug' => 'psychological'
        //         ],
        //         [
        //             'nama' => 'Romance',
        //             'slug' => 'romance'
        //         ],
        //         [
        //             'nama' => 'Samurai',
        //             'slug' => 'samurai'
        //         ],
        //         [
        //             'nama' => 'School',
        //             'slug' => 'school'
        //         ],
        //         [
        //             'nama' => 'Sci-fi',
        //             'slug' => 'sci-fi'
        //         ],
        //         [
        //             'nama' => 'Seinen',
        //             'slug' => 'seinen'
        //         ],
        //         [
        //             'nama' => 'Shoujo',
        //             'slug' => 'shoujo'
        //         ],
        //         [
        //             'nama' => 'Soujo Ai',
        //             'slug' => 'shoujo-ai'
        //         ],
        //         [
        //             'nama' => 'Shounen',
        //             'slug' => 'shounen'
        //         ],
        //         [
        //             'nama' => 'Shounen Ai',
        //             'slug' => 'shounen-ai'
        //         ],
        //         [
        //             'nama' => 'Slice of Life',
        //             'slug' => 'slice-of-life'
        //         ],
        //         [
        //             'nama' => 'Space',
        //             'slug' => 'space'
        //         ],
        //         [
        //             'nama' => 'Sports',
        //             'slug' => 'sports'
        //         ],
        //         [
        //             'nama' => 'Super Power',
        //             'slug' => 'super-power'
        //         ],
        //         [
        //             'nama' => 'Supernatural',
        //             'slug' => 'supernatural'
        //         ],
        //         [
        //             'nama' => 'Suspense',
        //             'slug' => 'suspense'
        //         ],
        //         [
        //             'nama' => 'Thriller',
        //             'slug' => 'thriller'
        //         ],
        //         [
        //             'nama' => 'Vampire',
        //             'slug' => 'vampire'
        //         ],
        //     ],
        // );
    }
}
