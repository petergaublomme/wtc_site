<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;
use App\Event;
use App\Deadline;
use App\UserDeadline;

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

        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(EventTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['name' => 'foobar', 'email' => 'foo@bar.com', 'password' => Hash::make('bar') ]);
        User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin') ]);
    }
}

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->delete();

        $userRole = Role::create(['role' => 'user', 'description'=> 'Regular user']);
        $captainRole = Role::create(['role' => 'captain-2016', 'description'=> '2016 Team Captain']);
        $adminRole = Role::create(['role' => 'admin',  'description'=> 'WTC Administrator']);

        DB::table('roles_users')->delete();

        User::all()->where('name', 'foobar')->first()->roles()->attach($captainRole);
        $admin = User::all()->where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);
        $admin->roles()->attach($captainRole);
    }
}

class EventTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('events')->delete();

        $wtc2016 = Event::create([
            'name' => 'wtc-2016',
            'description'=> '2016 World Team Championship',
            'start_timestamp'=> Carbon::createFromTimestamp(Carbon::create(2016, 9, 24, 9, 30, 0)->timestamp ),
            'end_timestamp'=> Carbon::createFromTimestamp(Carbon::create(2016, 9, 25, 18, 30, 0)->timestamp ),
        ]);

        $depositDeadline = Deadline::create([
            'event_id' => $wtc2016->id,
            'description' => 'Team deposit (100€)',
            'type' => 'payment',
            'due_timestamp' =>  Carbon::createFromTimestamp(Carbon::create(2016, 4, 1, 23, 59, 59)->timestamp)
        ]);

        $admin = User::all()->where('name', 'admin')->first();

        UserDeadline::create([
            'user_id' => $admin->id,
            'deadline_id' => $depositDeadline->id,
            'completed' => false
        ]);

    }
}