<?php

use Illuminate\Database\Seeder;
//use App\Models\Cliente;
use App\Certificado;
use App\User;

class DatabaseSeeder extends Seeder
{
    private $arrayCertificados = array(
        array(
            'nombre' => 'raul',
            'apellidos' => 'perez',
            'certificado' => 'raulcertified.pdf'
        ),
        array(
            'nombre' => 'andres',
            'apellidos' => 'rodriguez',
            'certificado' => 'andrescertified.pdf'
        ),
        array(
            'nombre' => 'ivan',
            'apellidos' => 'hdez',
            'certificado' => 'ivancertificado.pdf'
        )
    );

    private $arrayUsers = array(
        array(
            'name' => 'ivan',
            'email' => 'ivan@gmail.es',
            'password' => '1234'
        ),
        array(
            'name' => 'andres',
            'email' => 'andres@gmail.es',
            'password' => '123456'
        )
    );
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        self::seedCertificado();
        $this->command->info('Tabla Certificados inicializadas con datos!');
        self::seedUsers();
        $this->command->info('Tabla Usuarios inicializada con datos!');
        // $this->call(UsersTableSeeder::class);

    }

    private function seedCertificado(){ //campos base de datos
//      DB::table('clientes')->delete();
//      $c->nombre(columna en BD)
        foreach( $this->arrayCertificados as $certificado ) {
            $c = new Certificado;
            $c->nombre = $certificado['nombre'];
            $c->apellidos = $certificado['apellidos'];
            $c->certificado = $certificado['certificado'];
            $c->save();
        }
    }

    private function seedUsers(){
        DB::table('users')->delete();
        foreach( $this->arrayUsers as $user ) {
            $c = new User;
            $c->name = $user['name'];
            $c->email = $user['email'];
            $c->password = bcrypt($user['password']);
            $c->save();
        }
    }
}
