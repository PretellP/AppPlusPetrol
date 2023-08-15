@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>PUNTOS VERDES</h4>
                </div>
            </div>
        </div>


        <div class="principal-container card-body card z-index-2">

            <ul class="nav nav-tabs" id="warehouses-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="warehouses-tab" data-toggle="tab" href="#warehouses" role="tab"
                        aria-controls="warehouses" aria-selected="true">
                        <i class="fa-solid fa-dumpster"></i> &nbsp;
                        General
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="lots-tab" data-toggle="tab" href="#lots" role="tab" aria-controls="lots"
                        aria-selected="false">
                        <i class="fa-solid fa-map"></i> &nbsp; Lote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="stages-tab" data-toggle="tab" href="#stages" role="tab"
                        aria-controls="stages" aria-selected="false">
                        <i class="fa-solid fa-map"></i> &nbsp; Etapa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="locations-tab" data-toggle="tab" href="#locations" role="tab"
                        aria-controls="locations" aria-selected="false">
                        <i class="fa-solid fa-map-location-dot"></i> &nbsp; Locación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="projects-tab" data-toggle="tab" href="#projects" role="tab"
                        aria-controls="projects" aria-selected="false">
                        <i class="fa-solid fa-building"></i> &nbsp; Área Proyecto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="companies-tab" data-toggle="tab" href="#companies" role="tab"
                        aria-controls="companies" aria-selected="false">
                        <i class="fa-solid fa-city"></i> &nbsp; Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="fronts-tab" data-toggle="tab" href="#fronts" role="tab"
                        aria-controls="fronts" aria-selected="false">
                        <i class="fa-solid fa-city"></i> &nbsp; Frente</a>
                </li>
            </ul>


            <div class="tab-content" id="warehouses-tab-container">

                <div class="tab-pane fade show active" id="warehouses" role="tabpanel" aria-labelledby="warehouses-tab">

                    <div class="mb-4">
                        <button id="registerWarehouseBtn" class="btn btn-primary" data-toggle="modal"
                            data-url="{{route('warehouses.create')}}">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                            <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                        </button>
                    </div>

                    <table id="warehouses-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Lote</th>
                                <th>Etapa</th>
                                <th>Locación</th>
                                <th>Área Proyecto</th>
                                <th>Empresa</th>
                                <th>Frente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>

                </div>

                <div class="tab-pane fade" id="lots" role="tabpanel" aria-labelledby="lots-tab">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-text="Registrar Lote" data-placeholder="Nombre de lote"
                            data-url="{{route('lots.store')}}" data-toggle="modal" data-target="#RegisterLotsModal">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                        </button>
                    </div>

                    <table id="lots-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Descripción lote</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane fade" id="stages" role="tabpanel" aria-labelledby="stages-tab">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-text="Registrar Etapa" data-placeholder="Nombre de etapa"
                            data-url="{{route('stages.store')}}" data-toggle="modal" data-target="#RegisterStagesModal">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                        </button>
                    </div>
                    <table id="stage-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Descripción etapa</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane fade" id="locations" role="tabpanel" aria-labelledby="locations-tab">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-text="Registrar locación"
                            data-placeholder="Nombre de locación" data-url="{{route('locations.store')}}"
                            data-toggle="modal" data-target="#RegisterLocationsModal">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                        </button>
                    </div>
                    <table id="location-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Descripción locación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-text="Registrar área de proyecto"
                            data-placeholder="nombre de área de proyecto" data-url="{{route('projects.store')}}"
                            data-toggle="modal" data-target="#RegisterProjectsModal">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                        </button>
                    </div>
                    <table id="project-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Descripción área proyecto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane fade" id="companies" role="tabpanel" aria-labelledby="companies-tab">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-text="Registrar empresa"
                            data-placeholder="Nombre de empresa" data-url="{{route('companies.store')}}"
                            data-toggle="modal" data-target="#RegisterCompaniesModal">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                        </button>
                    </div>
                    <table id="company-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Descripción compañía</th>
                                <th>No. RUC</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="tab-pane fade" id="fronts" role="tabpanel" aria-labelledby="fronts-tab">
                    <div class="mb-4">
                        <button class="btn btn-primary" data-text="Registrar frente" data-placeholder="Nombre de frente"
                            data-url="{{route('fronts.store')}}" data-toggle="modal" data-target="#RegisterFrontsModal">
                            <i class="fa-solid fa-square-plus"></i> &nbsp; Registrar
                        </button>
                    </div>
                    <table id="front-table" class="table table-hover" data-url="{{route('warehouses.index')}}">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Descripción frente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@section('modals')

{{--------------- WAREHOUSE -------------------}}

<div class="modal fade" id="RegisterWarehouseModal" data-context='' tabindex="-1"
    aria-labelledby="RegisterWarehouseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterWarehouseTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">
                            Registrar Punto verde
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="{{route('warehouses.store')}}" id="registerWarehouseForm" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Lote *</label>

                            <select name="lot_id" class="form-control select2" id="registerLotSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Etapa *</label>

                            <select name="stage_id" class="form-control select2" id="registerStageSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Locación *</label>

                            <select name="location_id" class="form-control select2" id="registerLocationSelect"
                                required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Área de proyecto *</label>

                            <select name="project_id" class="form-control select2" id="registerProjectSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Empresa *</label>

                            <select name="company_id" class="form-control select2" id="registerCompanySelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Frente *</label>

                            <select name="front_id" class="form-control select2" id="registerFrontSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
        </div>


        </form>
    </div>
</div>


<div class="modal fade" id="EditWarehouseModal" data-context='' tabindex="-1"
    aria-labelledby="EditWarehouseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditWarehouseTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">
                            Editar Punto verde
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editWarehouseForm" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editLotSelect">Lote *</label>

                            <select name="lot_id" class="form-control select2" id="editLotSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editStageSelect">Etapa *</label>

                            <select name="stage_id" class="form-control select2" id="editStageSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editLocationSelect">Locación *</label>

                            <select name="location_id" class="form-control select2" id="editLocationSelect"
                                required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editProjectSelect">Área de proyecto *</label>

                            <select name="project_id" class="form-control select2" id="editProjectSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editCompanySelect">Empresa *</label>

                            <select name="company_id" class="form-control select2" id="editCompanySelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editFrontSelect">Frente *</label>

                            <select name="front_id" class="form-control select2" id="editFrontSelect" required>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
        </div>


        </form>
    </div>
</div>

{{-------------- Lot ----------------}}

<div class="modal fade" id="RegisterLotsModal" data-context='' tabindex="-1" aria-labelledby="RegisterLotsModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterLotsTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">

                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="registerLotForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Nombre *</label>
                            <div class="input-group">
                                <input id="inputName" type="text" name="elementName" class="form-control name"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditLotModal" tabindex="-1" aria-labelledby="EditLotModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditLotModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Editar Lote
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editLotsForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputLotName">Nombre *</label>
                            <div class="input-group">
                                <input type="text" id="inputName" name="elementName" class="form-control name"
                                    placeholder="Nombre de lote" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-------------- stages -----------------}}


<div class="modal fade" id="RegisterStagesModal" data-context='' tabindex="-1" aria-labelledby="RegisterStagesModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterStagesTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">

                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="registerStageForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Nombre *</label>
                            <div class="input-group">
                                <input id="inputName" type="text" name="elementName" class="form-control name"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditStageModal" tabindex="-1" aria-labelledby="EditStageModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditStageModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Editar etapa
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editStageForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputStageName">Nombre *</label>
                            <div class="input-group">
                                <input type="text" id="inputStageName" name="elementName" class="form-control name"
                                    placeholder="Nombre de etapa" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-------------- LOCATIONS -----------------}}

<div class="modal fade" id="RegisterLocationsModal" data-context='' tabindex="-1"
    aria-labelledby="RegisterLocationsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterLocationTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">

                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="registerLocationForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Nombre *</label>
                            <div class="input-group">
                                <input id="inputName" type="text" name="elementName" class="form-control name"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditLocationModal" tabindex="-1" aria-labelledby="EditLocationModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditLocationModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Editar locación
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editLocationForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputLocationName">Nombre *</label>
                            <div class="input-group">
                                <input type="text" id="inputLocationName" name="elementName" class="form-control name"
                                    placeholder="Nombre de locación" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-------------- PROJECTS -----------------}}

<div class="modal fade" id="RegisterProjectsModal" data-context='' tabindex="-1" aria-labelledby="RegisterProjectsModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterProjectTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">

                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="registerProjectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Nombre *</label>
                            <div class="input-group">
                                <input id="inputName" type="text" name="elementName" class="form-control name"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditProjectModal" tabindex="-1" aria-labelledby="EditProjectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditProjectModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Editar área de proyecto
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editProjectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputProjectName">Nombre *</label>
                            <div class="input-group">
                                <input type="text" id="inputProjectName" name="elementName" class="form-control name"
                                    placeholder="Nombre de área de proyecto" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-------------- COMPANIES -----------------}}

<div class="modal fade" id="RegisterCompaniesModal" data-context='' tabindex="-1"
    aria-labelledby="RegisterCompaniesModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterCompanyTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">

                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="registerCompanyForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Nombre *</label>
                            <div class="input-group">
                                <input id="inputName" type="text" name="elementName" class="form-control name"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Ruc (opcional)</label>
                            <div class="input-group">
                                <input id="inputRuc" type="text" name="ruc" class="form-control name"
                                    placeholder="Número de RUC">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditCompanyModal" tabindex="-1" aria-labelledby="EditCompanyModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditCompanyModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Editar empresa
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editCompanyForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputCompanyName">Nombre *</label>
                            <div class="input-group">
                                <input type="text" id="inputCompanyName" name="elementName" class="form-control name"
                                    placeholder="Nombre de empresa" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputCompanyName">Ruc (opcional)</label>
                            <div class="input-group">
                                <input type="text" id="inputCompanyRuc" name="ruc" class="form-control name"
                                    placeholder="Número de RUC">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-------------- FRONT -----------------}}

<div class="modal fade" id="RegisterFrontsModal" data-context='' tabindex="-1" aria-labelledby="RegisterFrontsModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterFrontTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">

                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="registerFrontForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputElementName">Nombre *</label>
                            <div class="input-group">
                                <input id="inputName" type="text" name="elementName" class="form-control name"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditFrontModal" tabindex="-1" aria-labelledby="EditFrontModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditFrontModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        Editar frente
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <form action="" id="editFrontForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputFrontName">Nombre *</label>
                            <div class="input-group">
                                <input type="text" id="inputFrontName" name="elementName" class="form-control name"
                                    placeholder="Nombre de frente" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-save">
                        Guardar
                        <i class="fa-solid fa-spinner fa-spin loadSpinner ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection