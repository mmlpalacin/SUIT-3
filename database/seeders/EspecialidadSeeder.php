<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('especialidads')->insert([
        'name' => 'Informatica']);
        
        DB::table('especialidads')->insert([
        'name' => 'Automotores']);
        
        DB::table('especialidads')->insert([
        'name' => 'Electronica']);
        
        DB::table('especialidads')->insert([
        'name' => 'Electromecanica']);
        
        DB::table('especialidads')->insert([
            'name' => 'Quimica']);
            
        DB::table('especialidads')->insert([
            'name' => 'Construciones']);
    }
}
