<?php

namespace Database\Seeders;

use App\Models\rolles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = rolles::create(['name'=>'admin']);
        $user = rolles::create(['name'=>'user']);
        $saler =  rolles::create(['name'=>'saler']);                   
    }
}
