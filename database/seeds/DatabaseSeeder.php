<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['guests', 'waitids'];

    public function run()
    {
        Eloquent::unguard();

        if (config('database.default') === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        foreach ($this->toTruncate as $table)
        {
            DB::table($table)->truncate();
        }

        if (App::Environment() === 'local' || App::Environment() === 'testing')
        {
            $this->call('WaitIdTableSeeder');
            $this->call('GuestTableSeeder');
        }
    }
}
