<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    Company,
    Front,
    Location,
    Lot,
    ProjectArea,
    Stage,
    User,
    UserType,
    Warehouse,
    WasteType
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $dataTypeUsers = [
            ['id' => '1', 'name' => 'ADMINISTRADOR'],
            ['id' => '2', 'name' => 'SOLICITANTE'],
            ['id' => '3', 'name' => 'APROBANTE'],
            ['id' => '4', 'name' => 'RECEPTOR'],
            ['id' => '5', 'name' => 'SUPERVISOR']
        ];

        foreach($dataTypeUsers as $typeUser)
        {
            UserType::create($typeUser);
        }

        User::create([
            'id_user_type' => '1',
            'user_name' => 'admin',
            'password' => Hash::make('123456'),
            'name' => 'Daniel Pretell',
            'email' => 'elw.danielpretell@gmail.com',
            'phone' => '987654321',
            'comment' => null,
            'url_signature' => '',
            'status' => 1
        ]);
    }
}
