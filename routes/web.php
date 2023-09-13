<?php

use App\Http\Controllers\{
    HomeController,
    PDFController
};
use App\Http\Controllers\Admin\{
    AdminController,
    WarehouseController,
    WasteController,
    UserController,
    PackageController,
    AdminIntermentGuideController,
    AdminGeneratedWastesController
};

use App\Http\Controllers\Applicant\{
    IntermentGuideController,
    ApplicantGeneratedWastesController
};

use App\Http\Controllers\Approver\{
    IntermentGuideControllerApprover,
    ApproverGeneratedWastesController
};

use App\Http\Controllers\Reciever\{
    IntermentGuideControllerReciever,
    RecieverGeneratedWastesController
};

use App\Http\Controllers\Verificator\{
    IntermentGuideControllerVerificator,
    VerificatorGeneratedWastesController
};

use App\Http\Controllers\Manager\{
    PackingGuideController,
    DepartureController,
    DispositionController
};

use App\Mail\{
    NotificationApproverMail
};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


Route::get('/', function(){
    return redirect()->route('login');
});



Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth', 'check.valid.user']], function(){
    

    Route::get('/inicio', [AdminController::class, 'index'])->name('home.index');


    Route::get('/generar-pdf/guía-de-internamiento/{guide}', [PDFController::class, 'internmentGuidePdf'])->name('generateIntermentGuidePdf');

   
    Route::group(['middleware' => 'check.role:ADMINISTRADOR,SOLICITANTE'], function(){

        Route::controller(IntermentGuideController::class)->group(function(){
            Route::get('/solicitante/guías-de-internamiento', 'index')->name('guides.index');
            Route::get('/solicitante/guías-de-internamiento/crear', 'create')->name('guides.create');
            Route::get('/solicitante/guías-de-internamiento/pendientes', 'pendingGuides')->name('guidesPending.index');
            Route::get('/solicitante/guías-de-internamiento/aprobados', 'approvedGuides')->name('guidesApproved.index');
            Route::get('/solicitante/guías-de-internamiento/rechazados', 'rejectedGuides')->name('guidesRejected.index');
            Route::get('/solicitante/guías-de-internamiento/pendientes/ver/{guide}', 'pendingShow')->name('guidesPending.show');
            Route::get('/solicitante/guías-de-internamiento/aprobados/ver/{guide}', 'approvedShow')->name('guidesApproved.show');
            Route::get('/solicitante/guías-de-internamiento/rechazados/ver/{guide}', 'rejectedShow')->name('guidesRejected.show');
            Route::get('/solicitante/crear-guía-de-internamiento/getDataWarehouse', 'getDataWarehouse')->name('guides.getDataWarehouse');
            Route::post('/solicitante/crear-guía-de-internamiento/registrar', 'store')->name('guides.store');
        });

        Route::get('/solicitante/residuos-generados', [ApplicantGeneratedWastesController::class, 'index'])->name('generatedWastesApplicant.index');
    });

    Route::group(['middleware' => 'check.role:ADMINISTRADOR,APROBANTE'], function(){

        Route::controller(IntermentGuideControllerApprover::class)->group(function(){
            Route::get('/aprobante/guias-pendientes', 'index')->name('approverGuides.index');
            Route::get('/aprobante/guias-aprobadas', 'indexApproved')->name('approvingApprovedGuides.index');
            Route::get('/aprobante/guias-rechazadas', 'indexRejected')->name('approvingRejectedGuides.index');
            Route::get('/aprobante/guias-aprobadas/ver/{guide}', 'approvedShow')->name('approvingApprovedGuides.show');
            Route::get('/aprobante/guias-rechazadas/ver/{guide}', 'rejectedShow')->name('approvingRejectedGuides.show');
            Route::get('/aprobante/guias-pendientes/ver/{guide}', 'show')->name('approverGuides.show');
            Route::post('/aprobante/guias-rechazadas/deshacer/{guide}', 'undoReject')->name('approverGuides.undoReject');
            Route::post('/aprobante/guias-pendientes/actualizar/{guide}', 'update')->name('approvedGuide.update');
            Route::post('/aprobante/guias-pendientes/rechazar/{guide}', 'updateReject')->name('guides.rejected');
        });

        Route::get('/aprobante/residuos-generados', [ApproverGeneratedWastesController::class, 'index'])->name('generatedWastesApproving.index');
    });

    Route::group(['middleware' => 'check.role:ADMINISTRADOR,RECEPTOR'], function(){

        Route::controller(IntermentGuideControllerReciever::class)->group(function(){
            Route::get('/receptor/guias-pendientes', 'index')->name('recieverGuides.index');
            Route::get('/receptor/guias-recepcionadas', 'recievedIndex')->name('recieverRecievedGuides.index');
            Route::get('/receptor/guias-rechazadas', 'rejectedIndex')->name('recieverRejectedGuides.index');
            Route::get('/receptor/guias-pendientes/ver/{guide}', 'pendingShow')->name('recieverGuides.show');
            Route::get('/receptor/guias-rechazadas/ver/{guide}', 'rejectedShow')->name('recieverRejectedGuides.show');
            Route::get('/receptor/guias-recepcionadas/ver/{guide}', 'recievedShow')->name('recieverRecievedGuides.show');
            Route::post('/receptor/guias-rechazadas/deshacer/{guide}', 'undoReject')->name('recieverGuides.undoReject');
            Route::post('/receptor/guias-pendientes/recepcionar/{guide}', 'updateRecieved')->name('recievedGuide.update');
            Route::post('/receptor/guias-pendientes/rechazar/{guide}', 'updateReject')->name('guides.recieved.rejected');
        });

        Route::get('/receptor/residuos-generados', [RecieverGeneratedWastesController::class, 'index'])->name('generatedWastesReciever.index');
    });

    Route::group(['middleware' => 'check.role:ADMINISTRADOR,SUPERVISOR'], function(){

        Route::controller(IntermentGuideControllerVerificator::class)->group(function(){
            Route::get('/supervisor/guias-pendientes', 'index')->name('verificatorGuides.index');
            Route::get('/supervisor/guias-verificadas', 'verifiedIndex')->name('verificatorVerifiedGuides.index');
            Route::get('/supervisor/guias-rechazadas', 'rejectedIndex')->name('verificatorRejectedGuides.index');
            Route::get('/supervisor/guias-rechazadas/ver/{guide}', 'rejectedShow')->name('verificatorRejectedGuides.show');
            Route::get('/supervisor/guias-pendientes/ver/{guide}', 'pendingShow')->name('verificatorGuides.show');
            Route::get('/supervisor/guias-verificadas/ver/{guide}', 'verifiedShow')->name('verificatorVerifiedGuides.show');
            Route::post('/supervisor/guias-pendientes/verificar/{guide}', 'updateVerified')->name('verifiedGuide.update');
            Route::post('/supervisor/guias-rechazadas/deshacer/{guide}', 'undoReject')->name('verificatorGuides.undoReject');
            Route::post('/supervisor/guias-pendientes/rechazar/{guide}', 'updateRejected')->name('guides.verified.rejected');
        });

        Route::get('/supervisor/residuos-generados', [VerificatorGeneratedWastesController::class, 'index'])->name('generatedWastesVerificator.index');
    });
    
    Route::group(['middleware' => 'check.role:ADMINISTRADOR,GESTOR'], function(){

        Route::controller(PackingGuideController::class)->group(function(){
            Route::get('/gestor/stock-almacén', 'index')->name('stock.index');
            Route::get('/gestor/obtener-guias-seleccionadas', 'loadGuidesSelected')->name('loadGuidesSelected.manager');
            Route::get('/gestor/cargar-detalle-de-guía/{guide}', 'loadGuideDetail')->name('loadGuideDetail.manager');
            Route::get('/gestor/cargar-detalle-de-carga/{guide}', 'loadPackingGuideDetail')->name('loadPackingGuideDetail.manager');
            Route::post('/gestor/stock-almacén/registrar-guia-de-embalaje', 'storePackageGuide')->name('stock.storePg.manager');
            Route::post('/gestor/stock-almacén/registrar-salida', 'updateDeparturePg')->name('updatePackingGuideDeparture.manager');
        });


        Route::controller(DepartureController::class)->group(function(){
            Route::get('/gestor/transporte', 'index')->name('departures.index');
            Route::get('/gestor/transporte/obtener-residuos-seleccionados', 'getWastesDetail')->name('getWastesDepartureDetail.ajax');
            Route::post('/gestor/transporte/actualizar-residuo-llegada', 'updateWastesArrival')->name('managerWastesArrival.update');
            Route::post('/gestor/transporte/actualizar-residuo-salida', 'updateWastesDeparture')->name('managerWastesDeparture.update');
        });

        Route::controller(DispositionController::class)->group(function(){
            Route::get('/gestor/disposición', 'index')->name('dispositions.index');
            Route::get('/gestor/disposición/obtener-residuos-seleccionados', 'getWastesDetail')->name('getWastesDetail.ajax');
            Route::post('/gestor/disposición/registrar', 'update')->name('managerWastesDisposition.update');
        });
    });


    // RUTAS DE LA INTERFAZ ADMINISTRADOR ------------------ 


    Route::group(['middleware' => 'check.role:ADMINISTRADOR'], function(){

        Route::controller(AdminIntermentGuideController::class)->group(function(){
            Route::get('/administrador/guías-de-internamiento', 'index')->name('guidesAdmin.index');
            Route::get('/administrador/guías-de-internamiento/aprobados', 'approvedGuides')->name('guidesAdminApproved.index');
            Route::get('/administrador/guías-de-internamiento/pendientes', 'pendingGuides')->name('guidesAdminPending.index');
            Route::get('/administrador/guías-de-internamiento/rechazadas', 'rejectedGuides')->name('guidesAdminRejected.index');
            Route::get('/administrador/guías-de-internamiento/aprobados/ver/{guide}', 'approvedShow')->name('guidesAdminApproved.show');
            Route::get('/administrador/guías-de-internamiento/pendientes/ver/{guide}', 'pendingShow')->name('guidesAdminPending.show');
            Route::get('/administrador/guías-de-internamiento/rechazadas/ver/{guide}', 'rejectedShow')->name('guidesAdminRejected.show');
        });




        /* ------------ GENERATED WASTES  ----------------*/

        Route::get('/administrador/residuos-generados', [AdminGeneratedWastesController::class, 'index'])->name('generatedWastesAdmin.index');

        Route::controller(UserController::class)->group(function(){
            Route::get('/administrador/usuarios', 'index')->name('users.index');
            Route::post('/administrador/usuario/registrar', 'store')->name('users.store');
            Route::get('/administrador/usuario/editar/{user}', 'edit')->name('users.edit');
            Route::get('/administrador/usuario/registrar/obtener-aprobantes', 'getApprovings')->name('users.getApprovings');
            Route::post('/administrador/usuario/actualizar/{user}', 'update')->name('users.update');
            Route::delete('/administrador/usuario/eliminar/{user}', 'destroy')->name('users.delete');    
        });

        
        Route::controller(WarehouseController::class)->group(function(){

            Route::get('/administrador/puntos-verdes', 'index')->name('warehouses.index');
            /* ------- WAREHOUSE ------*/
            Route::get('/administrador/warehouse/crear', 'create')->name('warehouses.create');
            Route::post('/administrador/warehouse/registrar', 'store')->name('warehouses.store');
            Route::get('/administrador/warehouse/editar/{warehouse}', 'edit')->name('warehouses.edit');
            Route::post('/administrador/warehouse/actualizar/{warehouse}', 'update')->name('warehouses.update');
            Route::delete('/administrador/warehouse/eliminar/{warehouse}', 'destroy')->name('warehouses.delete');
            /* -------- LOT --------*/
            Route::post('/administrador/lot/registrar', 'lotStore')->name('lots.store');
            Route::get('/administrador/lot/editar/{lot}', 'lotEdit')->name('lots.edit');
            Route::post('/administrador/lot/actualizar/{lot}', 'lotUpdate')->name('lots.update');
            Route::delete('/administrador/lot/eliminar/{lot}', 'lotDestroy')->name('lots.delete');
            /* -------- STAGE --------*/
            Route::post('/administrador/stage/registrar', 'stageStore')->name('stages.store');
            Route::get('/administrador/stage/editar/{stage}', 'stageEdit')->name('stages.edit');
            Route::post('/administrador/stage/actualizar/{stage}', 'stageUpdate')->name('stages.update');
            Route::delete('/administrador/stage/eliminar/{stage}', 'stageDestroy')->name('stages.delete');
            /*--------  LOCATION --------*/
            Route::post('/administrador/location/registrar', 'locationStore')->name('locations.store');
            Route::get('/administrador/location/editar/{location}', 'locationEdit')->name('locations.edit');
            Route::post('/administrador/location/actualizar/{location}', 'locationUpdate')->name('locations.update');
            Route::delete('/administrador/location/eliminar/{location}', 'locationDestroy')->name('locations.delete');
            /*---------- PROJECT ------------*/
            Route::post('/administrador/project/registrar', 'projectStore')->name('projects.store');
            Route::get('/administrador/project/editar/{project}', 'projectEdit')->name('projects.edit');
            Route::post('/administrador/project/actualizar/{project}', 'projectUpdate')->name('projects.update');
            Route::delete('/administrador/project/eliminar/{project}', 'projectDestroy')->name('projects.delete');
            /*---------- COMPANY ------------*/
            Route::post('/administrador/company/registrar', 'companyStore')->name('companies.store');
            Route::get('/administrador/company/editar/{company}', 'companyEdit')->name('companies.edit');
            Route::post('/administrador/company/actualizar/{company}', 'companyUpdate')->name('companies.update');
            Route::delete('/administrador/company/eliminar/{company}', 'companyDestroy')->name('companies.delete');
             /*---------- FRONT ------------*/
            Route::post('/administrador/front/registrar', 'frontStore')->name('fronts.store');
            Route::get('/administrador/front/editar/{front}', 'frontEdit')->name('fronts.edit');
            Route::post('/administrador/front/actualizar/{front}', 'frontUpdate')->name('fronts.update');
            Route::delete('/administrador/front/eliminar/{front}', 'frontDestroy')->name('fronts.delete');
        });
      
       
        Route::controller(WasteController::class)->group(function(){
            Route::get('/administrador/residuos', 'index')->name('wastes.index');
            Route::get('/administrador/residuos/crear-nuevo', 'create')->name('wastes.create');
            Route::post('/administrador/residuos/registrar', 'store')->name('wastes.store');
            Route::get('/administrador/residuos/editar/{class}', 'edit')->name('wastes.edit');
            Route::post('/administrador/residuos/actualizar/{class}', 'update')->name('wastes.update');
            Route::delete('/administrador/residuos/eliminar/{class}', 'destroy')->name('wastes.delete');

            Route::post('/administrador/residuos/tipo/registrar', 'typeStore')->name('wastesType.store');
            Route::get('/administrador/residuos/tipo/editar/{type}', 'typeEdit')->name('wastesType.edit');
            Route::post('/administrador/residuos/tipo/actualizar/{type}', 'typeUpdate')->name('wastesType.update');
            Route::delete('/administrador/residuos/tipo/eliminar/{type}', 'typeDestroy')->name('wastesType.delete');
        });


        Route::controller(PackageController::class)->group(function(){
            Route::get('/administrador/residuos/tipo-embalaje', 'index')->name('packages.index');
            Route::post('/administrador/residuos/tipo-embalaje/registrar', 'store')->name('packageType.store');
            Route::post('/administrador/residuos/tipo-embalaje/actualizar/{type}', 'typeUpdate')->name('packageType.update');
            Route::delete('/administrador/residuos/tipo-embalaje/eliminar/{type}', 'typeDestroy')->name('packageType.delete');
        });

       
    });

});
