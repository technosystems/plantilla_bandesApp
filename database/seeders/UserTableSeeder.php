<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new \App\Models\User();
      $user->tx_nombres = 'Theizer';
      $user->tx_apellidos = 'Gonzalez';
      $user->nb_usuario = 'tgonzalez';
      $user->tx_email = 'tgonzalez@bandes.gob.ve';
      $user->password = bcrypt('password');
      $user->nu_status = 1;
      $user->save();

      $user->assignRole('Tecnologia');
    }
}
