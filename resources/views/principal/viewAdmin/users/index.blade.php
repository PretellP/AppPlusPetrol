@extends('principal.common.layouts.masterpage')

@section('content')


<div class="row content">

    <div class="title-page-header">
        <div class="card page-title-container">
            <div class="card-header">
                <div class="total-width-container">
                    <h4>USUARIOS</h4>
                </div>
            </div>
        </div>

        <div class="principal-container card-body card z-index-2">

            <div class="mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#RegisterUserModal">
                    <i class="fa-solid fa-user-plus"></i> &nbsp; Registrar
                </button>
            </div>

            <table id="users-table" class="table table-hover" data-url="{{route('users.index')}}">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Num. cel</th>
                        <th>Perfil</th>
                        <th>Empresa</th>
                        <th>Notas / Obervaciones</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</div>

@endsection

@section('modals')

<div class="modal fade" id="RegisterUserModal" tabindex="-1" aria-labelledby="RegisterUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="RegisterUserModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-user-plus"></i> &nbsp;
                        Registrar Usuario
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('users.store')}}" enctype="multipart/form-data" id="registerUserForm" method="POST">
                @csrf

                <input type="hidden" name='user_id'>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputUserName">Usuario *</label>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control user-name"
                                    placeholder="Nombre de usuario" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword">Contraseña *</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="inputPassword"
                                    placeholder="Contraseña" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Nombre completo *</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder='Ingrese su nombre'
                                    required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email *</label>
                            <div class="input-group">
                                <input name="email" type="email" class="form-control" placeholder="Ingrese su email"
                                    required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" id="selects-container-register">
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Celular *</label>
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control"
                                    placeholder="Ingrese su número celular" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Perfil *</label>

                            <select data-url="{{route('users.getApprovings')}}" name="id_role"
                                class="form-control select2" id="registerProfileSelect" required>
                                <option></option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}"> {{$role->name}} </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-12">
                            <label for="inputProfile">Empresa *</label>

                            <div id="select-company-container-register">
                                <select data-url="" name="id_user_company"
                                    class="form-control select2" id="registerCompanySelect" required>
                                    <option></option>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputName">Nota (opcional)</label>
                            <textarea name="userComment" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">Subir firma <span class="col-form-label info-signature-required">*</span> </label>
                        <div class="col-12">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Subir Imagen</label>
                                <input type="file" name="userImageSignatureRegister" id="image-upload-register"
                                    required>
                                <div class="img-signature-holder">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="user-status-checkbox" id="register-user-status-checkbox"
                                checked class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span id="txt-register-description-user" class="custom-switch-description">Activo</span>
                        </label>
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



<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="EditUserModalLabel">
                    <div class="section-title mt-0">
                        <i class="fa-solid fa-user-pen"></i> &nbsp;
                        Editar Usuario
                    </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" enctype="multipart/form-data" id="EditUserForm" method="POST">
                @csrf
                <input type="hidden" name='user_id' id="user_id">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputUserName">Usuario *</label>
                            <div class="input-group">
                                <input id="inputUserName" type="text" name="username" class="form-control user-name"
                                    placeholder="Nombre de usuario" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputPasswordEdit">Nueva contraseña: </label>
                            <div class="input-group">
                                <input type="password" id="inputPasswordEdit" name="password" class="form-control">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Nombre completo *</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id="inputName"
                                    placeholder='Ingrese su nombre' required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-id-card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email *</label>
                            <div class="input-group">
                                <input name="email" type="email" class="form-control" id="inputEmail"
                                    placeholder="Ingrese su email" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" id="selects-container-edit">
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Celular *</label>
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control" id="inputPhone"
                                    placeholder="Ingrese su número celular" required>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputProfile">Perfil *</label>

                            <div id="profile-show-edit">
                            </div>

                        </div>

                        <div class="form-group col-12">
                            <label>Empresa: </label>
                            <div id="company-user-edit-txt" class="disabled-txt-input">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputComment">Nota (opcional)</label>
                            <textarea id="inputComment" name="userComment" class="form-control" cols="30" rows="10">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label col-12 col-md-6 col-lg-6">Actualizar firma (opcional) </label>
                        <div class="col-12">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Subir Imagen</label>
                                <input type="file" name="userImageSignatureEdit" id="image-upload-edit">
                                <div class="img-signature-holder">
                                    <img id="image-signature-edit" src="" alt="" class="img-fluid signature_img">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="user-status-checkbox" id="edit-user-status-checkbox"
                                class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span id="txt-edit-description-user" class="custom-switch-description">Activo</span>
                        </label>

                        <span class="last-login-container">
                            Último login
                            <div id="txt-last-login">

                            </div>
                        </span>
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


@section('extra-script')

<script src="{{asset('assets/principal/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

@endsection