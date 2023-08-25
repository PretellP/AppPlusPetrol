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
    Role,
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
        $dataRoles = [
            ['id' => '1', 'name' => 'ADMINISTRADOR'],
            ['id' => '2', 'name' => 'SOLICITANTE'],
            ['id' => '3', 'name' => 'APROBANTE'],
            ['id' => '4', 'name' => 'RECEPTOR'],
            ['id' => '5', 'name' => 'SUPERVISOR'],
            ['id' => '6', 'name' => 'GESTOR']
        ];

        foreach($dataRoles as $role)
        {
            Role::create($role);
        }

        User::create([
            'id_role' => '1',
            'user_name' => 'admin',
            'password' => Hash::make('123456'),
            'name' => 'Daniel Pretell',
            'email' => 'elw.danielpretell@gmail.com',
            'phone' => '987654321',
            'comment' => null,
            'url_signature' => '',
            'status' => 1
        ]);

        $dataLots = [
            ['name' => 'L56'],
            ['name' => 'L88'],
        ];

        foreach($dataLots as $lot)
        {
            Lot::create($lot);
        }

        $dataStages = [
            ['name' => 'AID'],
            ['name' => 'Operación'],
            ['name' => 'Well Service'],
            ['name' => 'Abandono'],
        ];

        foreach($dataStages as $stage)
        {
            Stage::create($stage);
        }

        $dataLocations = [
            ['name' => 'Garita principal'],
            ['name' => 'Comedor de empleados'],
            ['name' => 'Pérgola'],
            ['name' => 'Comedor de obreros'],
            ['name' => 'Oficinas administrativas'],
            ['name' => 'Oficinas de Seguridad, Salud Ocupacional y Medio Ambiente'],
            ['name' => 'Almacén principal de Logistica'],
            ['name' => 'Oficinas de Mantto Planta y Proyectos'],
            ['name' => 'Laboratorio Quimico'],
            ['name' => 'Grifo antiguo'],
            ['name' => 'Molino N° 07'],
            ['name' => 'Chancado primaria'],
            ['name' => 'Chancado cuaternario - colector de polvo'],
            ['name' => 'Balanza de Planta Concentradora'],
            ['name' => 'Taller Maestranza'],
            ['name' => 'Taller Confipetrol'],
            ['name' => 'Oficinas de MGA y Unicontrol'],
            ['name' => 'Tópico'],
            ['name' => 'Nv. +235 comedor y sala de capacitación'],
            ['name' => 'Planta de oxigeno'],
            ['name' => 'Lavadero de equipo en superficie'],
            ['name' => 'Oficinas Topacio y Master Drillyng'],
            ['name' => 'Oficinas Pienik'],
            ['name' => 'Oficinas Opermin'],
            ['name' => 'Oficinas CNSAC'],
            ['name' => 'Oficinas Acoinsa'],
            ['name' => 'Oficinas BJ operaciones'],
            ['name' => 'Oficinas Rock Drill'],
            ['name' => 'Molino de Cal'],
            ['name' => 'Vestuario Raúl'],
            ['name' => 'Oficinas Geología'],
            ['name' => 'Sala de logeo'],
            ['name' => 'Oficinas Mantto Mina'],
            ['name' => 'Taller mecánico'],
            ['name' => 'Talle herreria'],
            ['name' => 'Pozo de agua N° 03'],
            ['name' => 'Caseta Relaver N° 5'],
            ['name' => 'Master Energy'],
            ['name' => 'Oficina Tuku'],
            ['name' => 'Ingreso a la garita principal'],
            ['name' => 'Loza deportiva - carpa blanca'],
            ['name' => 'Ingreso comedor de empleados'],
            ['name' => 'Ingreso comedor de obreros'],
            ['name' => 'Estacionamiento de buses Trackles'],
            ['name' => 'Oficinas de Mantto Mina'],
            ['name' => 'Chancado cuaternario - colector de polvo'],
            ['name' => "Pozo de agua N° 01"],
            ['name' => 'Laboratorio Quimico (interior)'],
            ['name' => 'Tolva de Cal'],
            ['name' => 'Oficina entrega de EPPs - bocamina'],
            ['name' => 'Patio N° 06 - principal'],
            ['name' => 'Patio N° 07'],
            ['name' => 'Patio Raúl'],
            ['name' => 'Malvinas'],
        ];

        foreach($dataLocations as $location){
            Location::create($location);
        }

        $dataProjects = [
            ['name' => 'Administración'],
            ['name' => 'Asuntos Ambientales'],
            ['name' => 'Geología'],
            ['name' => 'Laboratorio'],
            ['name' => 'Logística'],
            ['name' => 'Mantto Mina'],
            ['name' => 'Mantto Planta'],
            ['name' => 'Mina'],
            ['name' => 'Planta Concentradora'],
            ['name' => 'Proyectos'],
            ['name' => 'Seguridad'],
            ['name' => 'Mantenimiento'],
            ['name' => 'IT'],
            ['name' => 'EHS'],
            ['name' => 'RR.HH.'],
        ];

        foreach($dataProjects as $project){
            ProjectArea::create($project);
        }

        $dataCompanies = [
            ['name' => 'Acoinsa'],
            ['name' => 'Administración'],
            ['name' => 'Asuntos Ambientales'],
            ['name' => 'CNSAC'],
            ['name' => 'Cominco'],
            ['name' => 'Confipetrol'],
            ['name' => 'Geología'],
            ['name' => 'Geología y Logística'],
            ['name' => 'Laboratorio'],
            ['name' => 'Logística'],
            ['name' => 'Mantto Mina y Overprime'],
            ['name' => 'Mantto Planta'],
            ['name' => 'Mantto Planta y Proyectos'],
            ['name' => 'Master Energy'],
            ['name' => 'MGA y Unicontrol'],
        ];

        foreach($dataCompanies as $company){
            Company::create($company);
        }

        $dataFronts = [
            ['name' => 'Workshop'],
            ['name' => 'Campamento'],
            ['name' => 'Almacén de Residuos'],
            ['name' => 'Topping'],
            ['name' => 'TD2'],
            ['name' => 'Estación de Radio'],
            ['name' => 'Pileta API'],
            ['name' => 'Pozo 1006'],
            ['name' => 'Sala de Ingeniería'],
            ['name' => 'Campamento C1'],
            ['name' => 'Abandono'],
            ['name' => 'AID'],
            ['name' => 'Operación'],
            ['name' => 'Well Service'],
        ];

        foreach($dataFronts as $front){
            Front::create($front);
        }

        $dataWasteTypes = [
            ['name' => 'RNPD-01-Viveres vencidos (frutas, verduras, cereales y otros)'],
            ['name' => 'RNPD-02-Restos orgánicos (residuos de cocina)'],
            ['name' => 'RNPD-03-Residuos orgánicos'],
            ['name' => 'RNPD-04-LOCACIONES Viveres vencidos (frutas, verduras, cereales y otros)'],
            ['name' => 'RNPD-05-LOCACIONES Restos orgánicos (residuos de cocina)'],
            ['name' => 'RNPD-06-MADERA'],
            ['name' => 'RNPI-01-Plástico 1-PET (botellas de bebidas)'],
            ['name' => 'RNPI-02-Plástico 2-HDPE (tuberías /Geomembrana )'],
            ['name' => 'RNPI-03-Plástico 3-PVC (tuberías y accesorios; Baldes, galoneras, cascos; Acrilicos y geogrilla)'],
            ['name' => 'RNPI-04-GENERALES: Bolsas Plasticas, Stretch film, descartables, Envases Pasticos, Carpas, toldos, sacos; bolsas aluminizadas y de papel cemento.'],
            ['name' => 'RNPI-05-Jebes (Mangueras, Botas y similares)'],
            ['name' => 'RNPI-06-Papel usado'],
            ['name' => 'RNPI-07-Cartón'],
            ['name' => 'RNPI-08-Residuos metálicos Tipo A'],
            ['name' => 'RNPI-09-Residuos metálicos Tipo B'],
            ['name' => 'RNPI-10-Residuos metálicos Tipo C'],
            ['name' => 'RNPI-11-Residuos metálicos Tipo D'],
            ['name' => 'RPSO-01-Papel higienico usado'],
            ['name' => 'RPSO-02-Residuos Solidos contaminados con Hidrocarburos'],
            ['name' => 'RPSO-03-Residuos Solidos contaminados con Aceite'],
            ['name' => 'RPSO-04-Residuos Solidos contaminados con Pintura'],
            ['name' => 'RPSO-05-Grasa y Residuos Solidos contaminados con Grasa'],
            ['name' => 'RPSO-06-Pegamento y Residuos Solidos contaminados con Pegamentos'],
            ['name' => 'RPSO-07-Residuos Solidos contaminados Solventes (Thinner, diluyentes y similares)'],
            ['name' => 'RPSO-08-Residuos Solidos contaminados con Cloro o Lejia'],
            ['name' => 'RPSO-09-Borra solida de Hidrocarburo'],
            ['name' => 'RPSO-10-Residuos Solidos contaminados con Becorin'],
            ['name' => 'RPLI-01-Solventes (tienner, diluyentes y similares)'],
            ['name' => 'RPLI-02-Grasas (Trampas de cocina)'],
            ['name' => 'RPLI-03-Aceite Mineral residual (aceite quemado)'],
            ['name' => 'RPLI-04-Aceite vegetal (Frituras)'],
            ['name' => 'RPLI-05-Diesel contaminado con aceite'],
            ['name' => 'RPLI-06-JP1 Residual / Contaminado'],
            ['name' => 'RPLI-07-Agua contaminada con Hidrocarburo'],
            ['name' => 'RPLI-08-Agua contaminada con Aceite residual'],
            ['name' => 'RPLI-09-Agua contaminada con Diesel'],
            ['name' => 'RPLI-10-Agua con Floculante'],
            ['name' => 'RPSO-32-Tierra contaminada con Hidrocarburo'],
            ['name' => 'RPSO-35-Arena/Grava Cama de Secado y/o TD2 (PDG) Contam. HC'],
            ['name' => 'RPSO-15-Baterias Niquel-Cadmio'],
            ['name' => 'RPLI-24-Otros RPL: Biocida Residual'],
            ['name' => 'RNPI-42-Residuos electronicos RAEE'],
            ['name' => 'RNPI-24-Cajas de madera']
        ];

        foreach($dataWasteTypes as $waste){
            WasteType::create($waste);
        }
    }
}
