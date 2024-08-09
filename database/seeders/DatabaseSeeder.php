<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Image;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Storage::deleteDirectory('anuncio');
        Storage::makeDirectory('anuncio');

        $this->call(RoleSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(EspecialidadSeeder::class);

        User::factory()->create([
        'name' => 'Milagros',
        'lastname' => 'Palacin',
        'email' => 'milagrosp.urena@gmail.com',
        'password' =>bcrypt('47297143')
        ])->assignRole('alumno');

        User::factory()->create([
            'name' => 'Mili',
            'lastname' => 'Palacin',
            'email' => 'milagrospalacinurena@gmail.com',
            'password' =>bcrypt('47297143')
            ])->assignRole('admin');

        User::factory()->create([
        'name' => 'Milagros',
        'lastname' => 'Ureña',
        'email' => 'mlmstylinson@gmail.com',
        'password' =>bcrypt('47297143')
        ])->assignRole('preceptor');

        User::factory()->create([
            'name' => 'M',
                'lastname' => 'Palacin',
            'email' => 'mmlstylinson@gmail.com',
            'password' =>bcrypt('47297143')
            ])->assignRole('profesor');

        $users = User::factory(10)->create();
        $roles = Role::all();

        foreach ($users as $user) {
            $randomRole = $roles->random(); 
            $user->assignRole($randomRole);
        }

        $cursos = [
            ['name' => '7', 'especialidad_id' => 2, 'division_id' => 11],
            ['name' => '1', 'especialidad_id' => 1, 'division_id' => 2],
        ];
        
        DB::table('cursos')->insert($cursos);

        $anuncios = Anuncio::factory(10)->create();

        foreach ($anuncios as $anuncio){
            Image::factory(1)->create([
                'imageable_id' => $anuncio ->id,
                'imageable_type' => Anuncio::class
            ]);
        }
    }
}
