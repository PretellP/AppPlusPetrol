<?php

use App\Http\Controllers\{
    HomeController
};
use App\Http\Controllers\Admin\{
    AdminController,
    WarehouseController,
    WasteController,
    UserController,
    IntermentGuideController
};

use App\Http\Controllers\Aprobant\{
    IntermentGuideControllerApproving
};

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return redirect()->route('login');
});

Auth::routes(['register' => false]);


Route::group(['middleware' => 'auth'], function(){

    Route::get('/inicio', [AdminController::class, 'index'])->name('admin.index');

// RUTAS DE LA INTERFAZ ADMINISTRADOR ------------------ 

    Route::group(['middleware' => 'check.role:ADMINISTRADOR,SOLICITANTE'], function(){
        Route::get('/solicitante/crear-guía-de-internamiento', [IntermentGuideController::class, 'index'])->name('guides.index');
        Route::get('/solicitante/crear-guía-de-internamiento/getDataWarehouse', [IntermentGuideController::class, 'getDataWarehouse'])->name('guides.getDataWarehouse');
        Route::post('/solicitante/crear-guía-de-internamiento/registrar', [IntermentGuideController::class, 'store'])->name('guides.store');
    });


    Route::group(['middleware' => 'check.role:ADMINISTRADOR,APROBANTE'], function(){

        Route::get('/aprobante/guias-pendientes', [IntermentGuideControllerApproving::class, 'index'])->name('approvingGuides.index');
        Route::get('/aprobante/guias-aprobadas', [IntermentGuideControllerApproving::class, 'showApproved'])->name('approvingApprovedGuides.index');
        Route::get('/aprobante/guias-rechazadas', [IntermentGuideControllerApproving::class, 'showRejected'])->name('approvingRejectedGuides.index');
        Route::get('/aprobante/guias-pendientes/ver/{guide}', [IntermentGuideControllerApproving::class, 'show'])->name('approvingGuides.show');
        Route::post('/aprobante/guias-pendientes/actualizar/{guide}', [IntermentGuideControllerApproving::class, 'update'])->name('approvedGuide.update');
        Route::post('/aprobante/guias-pendientes/rechazar/{guide}', [IntermentGuideControllerApproving::class, 'updateReject'])->name('guides.rejected');
    });


    
    Route::group(['middleware' => 'check.role:ADMINISTRADOR'], function(){
        
        Route::get('/administrador/usuarios', [UserController::class, 'index'])->name('users.index');
        Route::post('/administrador/usuario/registrar', [UserController::class, 'store'])->name('users.store');
        Route::get('/administrador/usuario/editar/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/administrador/usuario/registrar/obtener-aprobantes', [UserController::class, 'getApprovings'])->name('users.getApprovings');
        Route::post('/administrador/usuario/actualizar/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/administrador/usuario/eliminar/{user}', [UserController::class, 'destroy'])->name('users.delete');

        Route::get('/administrador/puntos-verdes', [WarehouseController::class, 'index'])->name('warehouses.index');
        /* ------- WAREHOUSE ------*/
        Route::get('/administrador/warehouse/crear', [WarehouseController::class, 'create'])->name('warehouses.create');
        Route::post('/administrador/warehouse/registrar', [WarehouseController::class, 'store'])->name('warehouses.store');
        Route::get('/administrador/warehouse/editar/{warehouse}', [WarehouseController::class, 'edit'])->name('warehouses.edit');
        Route::post('/administrador/warehouse/actualizar/{warehouse}', [WarehouseController::class, 'update'])->name('warehouses.update');
        Route::delete('/administrador/warehouse/eliminar/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouses.delete');
        /* -------- LOT --------*/
        Route::post('/administrador/lot/registrar', [WarehouseController::class, 'lotStore'])->name('lots.store');
        Route::get('/administrador/lot/editar/{lot}', [WarehouseController::class, 'lotEdit'])->name('lots.edit');
        Route::post('/administrador/lot/actualizar/{lot}', [WarehouseController::class, 'lotUpdate'])->name('lots.update');
        Route::delete('/administrador/lot/eliminar/{lot}', [WarehouseController::class, 'lotDestroy'])->name('lots.delete');
        /* -------- STAGE --------*/
        Route::post('/administrador/stage/registrar', [WarehouseController::class, 'stageStore'])->name('stages.store');
        Route::get('/administrador/stage/editar/{stage}', [WarehouseController::class, 'stageEdit'])->name('stages.edit');
        Route::post('/administrador/stage/actualizar/{stage}', [WarehouseController::class, 'stageUpdate'])->name('stages.update');
        Route::delete('/administrador/stage/eliminar/{stage}', [WarehouseController::class, 'stageDestroy'])->name('stages.delete');
        /*--------  LOCATION --------*/
        Route::post('/administrador/location/registrar', [WarehouseController::class, 'locationStore'])->name('locations.store');
        Route::get('/administrador/location/editar/{location}', [WarehouseController::class, 'locationEdit'])->name('locations.edit');
        Route::post('/administrador/location/actualizar/{location}', [WarehouseController::class, 'locationUpdate'])->name('locations.update');
        Route::delete('/administrador/location/eliminar/{location}', [WarehouseController::class, 'locationDestroy'])->name('locations.delete');
        /*---------- PROJECT ------------*/
        Route::post('/administrador/project/registrar', [WarehouseController::class, 'projectStore'])->name('projects.store');
        Route::get('/administrador/project/editar/{project}', [WarehouseController::class, 'projectEdit'])->name('projects.edit');
        Route::post('/administrador/project/actualizar/{project}', [WarehouseController::class, 'projectUpdate'])->name('projects.update');
        Route::delete('/administrador/project/eliminar/{project}', [WarehouseController::class, 'projectDestroy'])->name('projects.delete');
        /*---------- COMPANY ------------*/
        Route::post('/administrador/company/registrar', [WarehouseController::class, 'companyStore'])->name('companies.store');
        Route::get('/administrador/company/editar/{company}', [WarehouseController::class, 'companyEdit'])->name('companies.edit');
        Route::post('/administrador/company/actualizar/{company}', [WarehouseController::class, 'companyUpdate'])->name('companies.update');
        Route::delete('/administrador/company/eliminar/{company}', [WarehouseController::class, 'companyDestroy'])->name('companies.delete');
         /*---------- FRONT ------------*/
        Route::post('/administrador/front/registrar', [WarehouseController::class, 'frontStore'])->name('fronts.store');
        Route::get('/administrador/front/editar/{front}', [WarehouseController::class, 'frontEdit'])->name('fronts.edit');
        Route::post('/administrador/front/actualizar/{front}', [WarehouseController::class, 'frontUpdate'])->name('fronts.update');
        Route::delete('/administrador/front/eliminar/{front}', [WarehouseController::class, 'frontDestroy'])->name('fronts.delete');
        


        Route::get('/administrador/residuos', [WasteController::class, 'index'])->name('wastes.index');
        Route::get('/administrador/residuos/crear-nuevo', [WasteController::class, 'create'])->name('wastes.create');
        Route::post('/administrador/residuos/registrar', [WasteController::class, 'store'])->name('wastes.store');
        Route::get('/administrador/residuos/editar/{class}', [WasteController::class, 'edit'])->name('wastes.edit');
        Route::post('/administrador/residuos/actualizar/{class}', [WasteController::class, 'update'])->name('wastes.update');
        Route::delete('/administrador/residuos/eliminar/{class}', [WasteController::class, 'destroy'])->name('wastes.delete');

        Route::post('/administrador/residuos/tipo/registrar', [WasteController::class, 'typeStore'])->name('wastesType.store');
        Route::get('/administrador/residuos/tipo/editar/{type}', [WasteController::class, 'typeEdit'])->name('wastesType.edit');
        Route::post('/administrador/residuos/tipo/actualizar/{type}', [WasteController::class, 'typeUpdate'])->name('wastesType.update');
        Route::delete('/administrador/residuos/tipo/eliminar/{type}', [WasteController::class, 'typeDestroy'])->name('wastesType.delete');
    });
});
