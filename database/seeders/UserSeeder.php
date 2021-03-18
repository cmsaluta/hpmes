<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $users = [
        [
            'name' => 'Christian Saluta',
            'username' => 'admin',
            'email' => 'cmsaluta@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',        
            'details' => [
                'is_active' => 1,                
                'first_name' => 'Christian',
                'middle_name' => 'Monton',
                'last_name' => 'Saluta',
                'mobile' => '+639468590139',
                'address' => 'Butuan City',
                'division' => 'Policy and Plans Division',
                'section' => 'Policy Development and Planning Section',
                'position' => 'Computer Maintenance Technologist II',
                'user_role' => 'admin',
                'access_form' => 'all',
            ]
        ]
    ];


    public function run()
    {
        $users = $this->users;
        foreach ($users as $key => $data) {
            $details = Arr::pull($data, 'details');
            $user = User::where('email', $data['email'])->first();
            // create new record if empty
            if (empty($user))
                $user = User::create($data);
            // create if empty, update if not
            if (empty($user->details))
                $user->details()->create($details);
            else
                $user->details()->update($details);
        }
    }
}
