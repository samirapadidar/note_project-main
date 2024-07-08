<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Note;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $user = User::create(array(
            'name'               => 'admin',
            'email'              => 'admin@gmail.com',
            'password'           => Hash::make('Samira123!@#$&*({'),
            'remember_token'     => '12345678',
        ));
        $user->save();


        $categoryProgramming = Category::create([
            'name' => 'برنامه نویسی',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $categoryDatabase = Category::create([
            'name' => 'پایگاه داده',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $categoryWeb = Category::create([
            'name' => 'توسعه وب',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // ایجاد تگ‌ها
        $tagMySQL = Tag::create([
            'name' => 'مای‌اسکیوال',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $tagPostgreSQL = Tag::create([
            'name' => 'پست‌گرس‌کیوال',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $tagHTML = Tag::create([
            'name' => 'اچ‌تی‌ام‌ال',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $tagCSS = Tag::create([
            'name' => 'سی‌اس‌اس',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // ایجاد نوت‌ها
        Note::create([
            'title' => 'آموزش مقدماتی مای‌اسکیوال',
            'category_id' => $categoryProgramming->id,
            'content' => 'این یک آموزش مقدماتی برای مای‌اسکیوال است که بر روی اصول پایگاه داده متمرکز می‌شود.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Note::create([
            'title' => 'بررسی ویژگی‌های پیشرفته پست‌گرس‌کیوال',
            'category_id' => $categoryDatabase->id,
            'content' => 'در این مقاله ویژگی‌های پیشرفته پست‌گرس‌کیوال را بررسی می‌کنیم و نکات مهم را به اشتراک می‌گذاریم.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Note::create([
            'title' => 'آموزش مبانی اچ‌تی‌ام‌ال',
            'category_id' => $categoryWeb->id,
            'content' => 'مبانی اچ‌تی‌ام‌ال یکی از اصول اساسی برای هر توسعه دهنده وب است که باید به آن آشنا باشد.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Note::create([
            'title' => 'تکنیک‌های پیشرفته سی‌اس‌اس',
            'category_id' => $categoryWeb->id,
            'content' => 'تکنیک‌های پیشرفته سی‌اس‌اس به توسعه دهندگان وب کمک می‌کند تا استایل‌دهی به وبسایت‌ها را بهبود بخشند.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info('دیتابیس با داده‌های فارسی پر شد!');
    }   
}