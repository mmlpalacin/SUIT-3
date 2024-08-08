<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('divisions')->insert([
            'name' => '1']);
        DB::table('divisions')->insert([
            'name' => '2']);
        DB::table('divisions')->insert([
            'name' => '3']);
        DB::table('divisions')->insert([
            'name' => '4']);
        DB::table('divisions')->insert([
            'name' => '5']);
        DB::table('divisions')->insert([
            'name' => '6']);
        DB::table('divisions')->insert([
            'name' => '7']);
        DB::table('divisions')->insert([
            'name' => '8']);
        DB::table('divisions')->insert([
            'name' => '9']);
        DB::table('divisions')->insert([
            'name' => '10']);
        DB::table('divisions')->insert([
            'name' => '11']);
        DB::table('divisions')->insert([
            'name' => '12']);
    }
}
