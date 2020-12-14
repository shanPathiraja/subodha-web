<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$faker = \Faker\Factory::create();

        $user = User::create([
            'username' => 'Subodha',
            'name' => 'Subodha Charles',
            'email' => 'subodhatsn@gmail.com',
            'phone' => '3522168940',
            'email_verified_at' => now(),
            'password' => Hash::make('Matrix09'),
            'remember_token' => Str::random(10),
            'photo' => 'img/profile.png',
            'settings' => [
                'notifications_mobile' => 'everything',
                'notifications_email' => [
                    'something',
                ],
            ],
        ]);

        $user->profile()->create([
            'email' => 's.charles@ieee.org',
            'resume' => '/resume',
            'about' => '
                <h4>So who is,</h4>
                <h2>Subodha Charles</h2>
                <p>Subodha is a Ph.D. candidate in the CISE department at University of Florida under the supervision of Prof. Prabhat Mishra researching on System-on-Chip (SoC) security.</p>
                <p>Born in Sri Lanka, he received his bachelor’s degree from University of Moratuwa, Sri Lanka in 2015 before working as a lecturer at the same university and ultimately joining the Embedded Systems Lab at UF. He has also worked as as an intern at Zone24x7 – Colombo, Sri Lanka and at Intel Corporation – Hillsboro, OR, USA.</p>
                <p>He is a co-founder and a member of the board of a Solar PV system installation company based in Sri Lanka. The company has currently invested in other ventures such as a healthcare center in Sri Lanka and a construction firm.</p>
                <p>He is currently reading for his PhD in the CISE department at University of Florida under the supervision of Prof. Prabhat Mishra researching on System-on-Chip architectures.</p>
            ',
        ]);
    }
}
