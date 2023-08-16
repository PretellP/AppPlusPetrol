@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>RESIDUOS</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            <div class="mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#RegisterClassModal">
                    <i class="fa-solid fa-circle-plus"></i> &nbsp; Nueva Clase
                </button>

                <button class="ms-3 btn btn-primary" data-toggle="modal" data-target="#RegisterWasteModal">
                    <i class="fa-solid fa-biohazard"></i> &nbsp; Tipos de residuo
                </button>
            </div>



            <table id="waste-class-table" class="table table-hover" data-url="{{route('wastes.index')}}">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Clase</th>
                        <th>Símbolo</th>
                        <th>Tipos de residuo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

@endsection

@section('modals')

<div class="modal fade" id="RegisterClassModal" aria-labelledby="RegisterClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterWarehouseTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-square-plus"></i> &nbsp;
                        <span id="txt-context-element">
                            Registrar nueva clase de residuo
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>


            <form action="{{route('wastes.store')}}" id="registerWasteClassForm" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputNameWasteClass"> Nombre: *</label>
                            <input id="inputNameWasteClass" name="className" class="form-control" type="text"
                                placeholder="Nombre de clase de residuo" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputSymbolWasteClass"> Símbolo: *</label>
                            <input id="inputSymbolWasteClass" name="classSymbol" class="form-control" type="text"
                                placeholder="Símbolo de la clase" required>
                        </div>

                    </div>

                    <div class="form-row" id="row-select-container">

                        <div class="form-group col-12" id="selectWasteTypes">
                            <label> Selecciona uno o más tipos de residuos *</label>
                            <select name="id_waste_types[]" class="form-control select2" multiple
                                id="registerWasteTypesSelect" required>
                                <option></option>
                                @foreach ($wasteTypes as $wasteType)
                                <option value="{{$wasteType->id}}"> {{$wasteType->name}}</option>
                                @endforeach
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

            </form>
        </div>

    </div>
</div>

<div class="modal fade" id="EditClassModal" tabindex="-1" aria-labelledby="EditClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditWasteClassTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-pen-to-square"></i> &nbsp;
                        <span id="txt-context-element">
                            Editar clase de residuo
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>


            <form action="" id="EditWasteClassForm" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputEditNameWasteClass"> Nombre: * </label>
                            <input id="inputEditNameWasteClass" name="className" class="form-control" type="text"
                                placeholder="Nombre de clase de residuo" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputSymbolWasteClass"> Símbolo: *</label>
                            <input id="inputSymbolWasteClass" name="classSymbol" class="form-control" type="text"
                                placeholder="Símbolo de la clase" required>
                        </div>

                    </div>

                    <div class="form-row" id="row-select-container">

                        <div class="form-group col-12" id="selectWasteTypes">
                            <label> Selecciona uno o más tipos de residuos *</label>
                            <select name="id_waste_types[]" class="form-control select2" multiple
                                id="editWasteTypesSelect" required>
                                
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

            </form>
        </div>

    </div>
</div>



<div class="modal fade" id="RegisterWasteModal" tabindex="-1" aria-labelledby="RegisterWasteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterWarehouseTitle">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-biohazard"></i> &nbsp;
                        <span id="txt-context-element">
                            Registros de tipos de residuo
                        </span>
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>


            <div class="modal-body">

                <form action="{{route('wastesType.store')}}" id="registerWasteTypeForm" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputNameWasteType">Agregar tipo de residuo: </label>
                            <div class="input-group">
                                <input id="inputNameWasteType" name="typeName" class="form-control" type="text"
                                    placeholder="Nombre de tipo de residuo" required>
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary btn-save">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        <i class="fa-solid fa-spinner fa-spin loadSpinner"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <table id="waste-type-table" class="table table-hover" data-url="{{route('wastes.index')}}">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>



            </div>

        </div>



    </div>
</div>

@endsection