
<?php

// namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\User;
use App\Category;
use App\Post;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        // $user = $this->call([
        //     UserSeeder::class,
        //     PostSeeder::class,
        //     CommentSeeder::class,
        // ]);
        // // $user = DB::table('users')->insert([
        // //     'name' => Str::random(10),
        // //     'email' => Str::random(10).'@gmail.com',
        // //     'password' => Hash::make('password'),
        // // ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([

            'title' => 'My family post',
            'excerpt' => 'excerpt of post',
            'slug' => 'my-family-post',
            'body' => 'lorem lorem lorem lorem',
            'category_id' => $family->id,
            // 'user_id' => $user->id
        ]);
        Post::create([

            'title' => 'My work post',
            'excerpt' => ' excerpt of post',
            'slug' => 'my-work-post',
            'body' => ' lorem lorem lorem lorem</p>',
            'category_id' => $work->id,
            // 'user_id' => $user->id
        ]);
        Post::create([

            'title' => 'My personal post',
            'excerpt' => ' excerpt of post',
            'slug' => 'my-personal-post',
            'body' => ' lorem lorem lorem lorem',
            'category_id' => $personal->id,
            // 'user_id' => $user->id
        ]);
    }
}
