<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Listing;
use App\SiteSettings;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(DBSeeder::class);

        Model::reguard();
    }
}

class DBSeeder extends Seeder 
{
    public function run() 
    {
        //Clear the user database
        DB::table('users')->delete();
        DB::table('posts')->delete();
        DB::table('files')->delete();
        DB::table('posts')->delete();
        DB::table('password_resets')->delete();
        DB::table('settings')->delete();

        //Create the first user as an Administrator
        $user = User::create(array(
            'author_name'               => 'Web Admin',
            'birthday'                  => '1987-06-12',
            'phone_number'              => '704-999-6255',
            'email'                     => 'webadmin@pureblog.com',
            'create'                    => 'on',
            'edit'                      => 'on',
            'delete'                    => 'on',
            'admin'                     => 'on',
            'password'                  => bcrypt('pleasechangeme'),
            'description'               => 'This is the account you may use to administrate this web interface.',
            ));
        
    
        //Create the first property in the listings
        $post = App\Posts::create(array(
            'user_id'                   => $user->id,
            'post_num'                  => 1,
            'post_name'                 => 'Welcome to your Blog!',
            'post_category'             => 'News',
            'post_content'              => 'Welcome! This is your first post!',
            'post_tags'                 => 'Welcome,Success,Install'
            
        ));

        
        $settings = App\Settings::create(array(
            'blog_name'                 => 'PureBlog',
            'blog_description'          => 'A place for your thoughts.',
            'blog_phone_number'         => '7045990763',
            'blog_email'                => 'webadmin@pureblog.com',
            'blog_facebook'             => 'www.facebook.com',
            'blog_twitter'              => 'www.twitter.com',
            'blog_linkedin'             => 'www.linkedin.com',
            'blog_instagram'            => 'www.instgram.com',
            'blog_github'               => 'www,github.com'
            ));
         
    }
}

