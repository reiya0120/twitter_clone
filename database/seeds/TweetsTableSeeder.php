<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 1; $i <= 10; $i++) {
          App\Models\Tweet::create([
              'user_id'    => $i,
              'text'       => 'これはテスト投稿' .$i,
              'created_at' => now(),
              'updated_at' => now()
          ]);
        }
    }
}
