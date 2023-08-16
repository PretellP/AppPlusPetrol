"use strict";

$(function() {
    var DataTableEs = {
        "processing": "Procesando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "infoThousands": ",",
        "loadingRecords": "Cargando...",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
            },
        "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad",
            "collection": "Colección",
            "colvisRestore": "Restaurar visibilidad",
            "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
            "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %ds fila al portapapeles"
            },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
        "-1": "Mostrar todas las filas",
        "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "renameState": "Cambiar nombre",
        "updateState": "Actualizar",
        "createState": "Crear Estado",
        "removeAllStates": "Remover Estados",
        "removeState": "Remover",
        "savedStates": "Estados Guardados",
        "stateRestore": "Estado %d"
        },
        "autoFill": {
            "cancel": "Cancelar",
            "fill": "Rellene todas las celdas con <i>%d</i>",
            "fillHorizontal": "Rellenar celdas horizontalmente",
            "fillVertical": "Rellenar celdas verticalmentemente"
            },
        "decimal": ",",
        "searchBuilder": {
            "add": "Añadir condición",
            "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
            },
            "clearAll": "Borrar todo",
            "condition": "Condición",
            "conditions": {
        "date": {
            "after": "Despues",
            "before": "Antes",
            "between": "Entre",
            "empty": "Vacío",
            "equals": "Igual a",
            "notBetween": "No entre",
            "notEmpty": "No Vacio",
            "not": "Diferente de"
        },
        "number": {
            "between": "Entre",
            "empty": "Vacio",
            "equals": "Igual a",
            "gt": "Mayor a",
            "gte": "Mayor o igual a",
            "lt": "Menor que",
            "lte": "Menor o igual que",
            "notBetween": "No entre",
            "notEmpty": "No vacío",
            "not": "Diferente de"
        },
        "string": {
            "contains": "Contiene",
            "empty": "Vacío",
            "endsWith": "Termina en",
            "equals": "Igual a",
            "notEmpty": "No Vacio",
            "startsWith": "Empieza con",
            "not": "Diferente de",
            "notContains": "No Contiene",
            "notStartsWith": "No empieza con",
            "notEndsWith": "No termina con"
        },
        "array": {
            "not": "Diferente de",
            "equals": "Igual",
            "empty": "Vacío",
            "contains": "Contiene",
            "notEmpty": "No Vacío",
            "without": "Sin"
        }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
        "0": "Constructor de búsqueda",
        "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
        },
        "searchPanes": {
            "clearMessage": "Borrar todo",
            "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
            },
            "count": "{total}",
            "countFiltered": "{shown} ({total})",
            "emptyPanes": "Sin paneles de búsqueda",
            "loadMessage": "Cargando paneles de búsqueda",
            "title": "Filtros Activos - %d",
            "showMessage": "Mostrar Todo",
            "collapseMessage": "Colapsar Todo"
            },
        "select": {
            "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
            },
            "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
            },
            "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
            }
        },
        "thousands": ".",
        "datetime": {
            "previous": "Anterior",
            "next": "Proximo",
            "hours": "Horas",
            "minutes": "Minutos",
            "seconds": "Segundos",
            "unknown": "-",
            "amPm": [
            "AM",
            "PM"
            ],
            "months": {
            "0": "Enero",
            "1": "Febrero",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre",
            "10": "Noviembre",
            "11": "Diciembre"
            },
            "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
            ]
        },
        "editor": {
            "close": "Cerrar",
            "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
            },
            "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
            },
            "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "1": "¿Está seguro que desea eliminar 1 fila?",
                "_": "¿Está seguro que desea eliminar %d filas?"
            }
            },
            "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\/a&gt;).</a>"
            },
            "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
            }
        },
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "stateRestore": {
            "creationModal": {
            "button": "Crear",
            "name": "Nombre:",
            "order": "Clasificación",
            "paging": "Paginación",
            "search": "Busqueda",
            "select": "Seleccionar",
            "columns": {
                "search": "Búsqueda de Columna",
                "visible": "Visibilidad de Columna"
            },
            "title": "Crear Nuevo Estado",
            "toggleLabel": "Incluir:"
            },
            "emptyError": "El nombre no puede estar vacio",
            "removeConfirm": "¿Seguro que quiere eliminar este %s?",
            "removeError": "Error al eliminar el registro",
            "removeJoiner": "y",
            "removeSubmit": "Eliminar",
            "renameButton": "Cambiar Nombre",
            "renameLabel": "Nuevo nombre para %s",
            "duplicateError": "Ya existe un Estado con este nombre.",
            "emptyStates": "No hay Estados guardados",
            "removeTitle": "Remover Estado",
            "renameTitle": "Cambiar Nombre Estado"
        }
    };



    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /*--------------- USERS ---------------*/

    if($('#users-table').length)
    {
        var usersTableEle = $('#users-table');
        var getDataUrl = usersTableEle.data('url');
        var usersTable = usersTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: getDataUrl,
            columns:[
                {data: 'DT_RowIndex', name:'DT_RowIndex'},
                {data: 'email', name:'email'},
                {data: 'name', name:'name'},
                {data: 'phone', name:'phone'},
                {data: 'status-btn', name:'status-btn'},
                {data: 'profile', name:'profile'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        /* --------  REGISTER USER ---------*/

        if($('#registerProfileSelect').length)
        {
            var userRegisterSelect = $('#registerProfileSelect');
            userRegisterSelect.select2({
                dropdownParent: $("#registerUserForm"),
                placeholder: 'Selecciona un perfil'
            });

            userRegisterSelect.on('change', function(){
                var value_id  = $(this).val();
                var url = $(this).data('url');
                
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: value_id
                    },
                    dataType: 'JSON',
                    success: function(data){
                        if(data.valid == 'valid')
                        {
                            $('#selects-container-register').
                            append('<div class="form-group col-md-12" id="selectApprovingsRegister"> \
                                        <label> Aprobantes *</label> \
                                        <select name="id_approvings[]" class="form-control select2" \
                                            multiple="multiple" id="registerApprovingsSelect" required> \
                                        </select> \
                                    </div>');
                            var selectApprovings = $('#registerApprovingsSelect')
                            selectApprovings.select2({
                                dropdownParent: $("#registerUserForm"),
                                placeholder: 'Selecciona un aprobante',
                                closeOnSelect: false
                            })
                            selectApprovings.append('<option value=""></option>');
                            $.each( data['approvings'], function( key, value ) {
                                selectApprovings.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                            })
                        }else{
                            $('#selectApprovingsRegister').remove();
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });

            })
        }

        $('#register-user-status-checkbox').change(function(){
            var txtDesc = $('#txt-register-description-user');
            if(this.checked){
                txtDesc.html('Activo');
            }else{
                txtDesc.html('Inactivo')
            }
        });
    
        $('#registerUserForm').submit(function(e){
            e.preventDefault();

            var loadSpinner = $(this).find('.loadSpinner');
            var img_holder = $(this).find('.img-signature-holder');

            loadSpinner.toggleClass('active');
            
            var form = this;
            var formData = new FormData($(form)[0]);
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                processData: false,
                dataType: 'JSON',
                contentType: false,
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Usuario registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });

                    $(img_holder).empty();

                    loadSpinner.toggleClass('active');
                    $('#registerUserForm').trigger('reset');
                    $('#RegisterUserModal').modal('hide');
                    $('#registerProfileSelect').val('').trigger('change');

                    if($('#selectApprovingsRegister').length)
                    {
                        $('#selectApprovingsRegister').remove();
                    }

                    usersTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        });

        var inputSignatureRegister = $('input[type="file"][name="userImageSignatureRegister"]');
        inputSignatureRegister.val('');
        inputSignatureRegister.on("change", function(){
            var img_path = $(this)[0].value;
            var img_holder = $(this).closest('#registerUserForm').find('.img-signature-holder');
            var img_extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

            if(img_extension == 'jpeg' || img_extension == 'jpg' || img_extension == 'png')
            {
                if(typeof(FileReader)!= 'undefined'){
                    img_holder.empty()
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>', {'src':e.target.result,'class':'img-fluid signature_img'}).
                        appendTo(img_holder);
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                }else{
                    $(img_holder).html('Este navegador no soporta Lector de Archivos');
                }
            }else{
                $(img_holder).empty();
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: '¡Selecciona una imagen!',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                });
            }
        })


        /* ------ DELETE -------*/

        $('body').on('click', '.deleteUser', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){

                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success === true){
                                usersTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else{
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: '¡Ocurrió un error inesperado!',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })


        /* -------------- EDIT USER ------------*/


        if($('#editProfileSelect').length)
        {
            $('#editProfileSelect').select2({
                dropdownParent: $("#EditUserForm"),
                placeholder: 'Selecciona un perfil'
            });
        }


        $('#edit-user-status-checkbox').change(function(){
            var txtDesc = $('#txt-edit-description-user');
            if(this.checked){
                txtDesc.html('Activo');
            }else{
                txtDesc.html('Inactivo')
            }
        });

        
        $('body').on('click', '.editUser', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            var getDataUrl = $(this).data('send');
            var modal = $('#EditUserModal');
            var profileSelect = modal.find('#editProfileSelect');
            modal.find('#image-signature-edit').remove();
            modal.find('#EditUserForm').attr('action', url);
   
            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    var status = data.status;
                    if(data.validApplicant)
                    {
                        $('#selects-container-edit').
                        append('<div class="form-group col-md-12" id="selectApprovingsEdit"> \
                                    <label> Aprobantes *</label> \
                                    <select name="id_approvings[]" class="form-control select2" \
                                        multiple="multiple" id="editApprovingsSelect" required> \
                                    </select> \
                                </div>');
                        var selectApprovings = $('#editApprovingsSelect');
                        selectApprovings.select2({
                            dropdownParent: $("#EditUserForm"),
                            placeholder: 'Selecciona un aprobante',
                            closeOnSelect: false
                        })
                        selectApprovings.append('<option value=""></option>');
                        $.each(data['approvings'], function(key, value){
                            selectApprovings.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                        })
                        selectApprovings.val(data['selectedApprovings']).change();
                    }
                    else{
                        if($('#selectApprovingsEdit').length)
                        {
                            $('#selectApprovingsEdit').remove();
                        }
                    }
                    modal.find('#inputUserName').val(data.username);
                    modal.find('#inputName').val(data.name);
                    modal.find('#inputEmail').val(data.email);
                    modal.find('#inputPhone').val(data.phone);
                    modal.find('#inputComment').val(data.comment);
                    modal.find('#txt-last-login').html(data.last_login);
                    modal.find('.img-signature-holder').html('<img class="img-fluid signature_img" id="image-signature-edit" src="'+data.url_signature+'"></img>');
                    modal.find('#image-upload-edit').attr('data-value', '<img scr="'+data.url_signature+'" class="img-fluid signature_img"');
                    modal.find('#image-upload-edit').val('');
                    profileSelect.val(data.profile).change();
                   
                    if(status == 1)
                    {
                        modal.find('#edit-user-status-checkbox').prop('checked', true);
                        $('#txt-edit-description-user').html('Activo');
                    }else{
                        modal.find('#edit-user-status-checkbox').prop('checked', false);
                        $('#txt-edit-description-user').html('Inactivo');
                    }
                },
                complete: function (data){
                    modal.modal('show');
                }
            });
        });


        var inputSignatureEdit = $('input[type="file"][name="userImageSignatureEdit"]');
        inputSignatureEdit.on("change", function(){
            var img_path = $(this)[0].value;
            var img_holder = $(this).closest('#EditUserForm').find('.img-signature-holder');
            var currentImagePath = $(this).data('value');
            var img_extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

            if(img_extension == 'jpeg' || img_extension == 'jpg' || img_extension == 'png')
            {
                if(typeof(FileReader)!= 'undefined'){
                    img_holder.empty()
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>', {'src':e.target.result,'class':'img-fluid signature_img'}).
                        appendTo(img_holder);
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                }else{
                    $(img_holder).html('Este navegador no soporta Lector de Archivos');
                }
            }else{
                $(img_holder).html(currentImagePath);
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: '¡Selecciona una imagen!',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                });
            }

        })


        $('#EditUserForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData($(form)[0]),
                processData: false,
                dataType: 'JSON',
                contentType: false,
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Usuario actualizado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });

                    loadSpinner.toggleClass('active');
                    $('#EditUserModal').modal('hide');
                    usersTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                },
            })
        })


        $('#EditUserModal').on('hide.bs.modal', function(e){
            if($('#selectApprovingsEdit').length)
            {
                $('#selectApprovingsEdit').remove();
            }
        })
        
    }

    


     /* --------- WAREHOUSES GENERAL -------*/


     if($('#warehouses-table').length){

        /* ----- WAREHOUSE TABLE ------*/

        if($('#registerLotSelect').length)
        {
            $('#registerLotSelect').select2({
                dropdownParent: $("#registerWarehouseForm"),
                placeholder: 'Selecciona un lote'
            });

            $('#registerStageSelect').select2({
                dropdownParent: $("#registerWarehouseForm"),
                placeholder: 'Selecciona una etapa'
            });

            $('#registerLocationSelect').select2({
                dropdownParent: $("#registerWarehouseForm"),
                placeholder: 'Selecciona una locación'
            });

            $('#registerProjectSelect').select2({
                dropdownParent: $("#registerWarehouseForm"),
                placeholder: 'Selecciona una área de proyecto'
            });

            $('#registerCompanySelect').select2({
                dropdownParent: $("#registerWarehouseForm"),
                placeholder: 'Selecciona una empresa'
            });

            $('#registerFrontSelect').select2({
                dropdownParent: $("#registerWarehouseForm"),
                placeholder: 'Selecciona un frente'
            });

            $('#editLotSelect').select2({
                dropdownParent: $("#editWarehouseForm"),
                placeholder: 'Selecciona un lote'
            });

            $('#editStageSelect').select2({
                dropdownParent: $("#editWarehouseForm"),
                placeholder: 'Selecciona una etapa'
            });

            $('#editLocationSelect').select2({
                dropdownParent: $("#editWarehouseForm"),
                placeholder: 'Selecciona una locación'
            });

            $('#editProjectSelect').select2({
                dropdownParent: $("#editWarehouseForm"),
                placeholder: 'Selecciona una área de proyecto'
            });

            $('#editCompanySelect').select2({
                dropdownParent: $("#editWarehouseForm"),
                placeholder: 'Selecciona una empresa'
            });

            $('#editFrontSelect').select2({
                dropdownParent: $("#editWarehouseForm"),
                placeholder: 'Selecciona un frente'
            });
        }

        var warehousesTableEle = $('#warehouses-table');
        var getDataWarehouseUrl = warehousesTableEle.data('url');
        var warehousesTable = warehousesTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataWarehouseUrl,
                "data" : {
                    "table": "warehouse"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'project', name:'project'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#registerWarehouseBtn').on('click', function(e){
            var modal = $('#RegisterWarehouseModal');
            var lotSelect = modal.find('#registerLotSelect');
            var stageSelect = modal.find('#registerStageSelect');
            var locationSelect = modal.find('#registerLocationSelect');
            var projectSelect =  modal.find('#registerProjectSelect');
            var companySelect =  modal.find('#registerCompanySelect');
            var frontSelect = modal.find('#registerFrontSelect');
            var button = $(this);
            var url = button.data('url');
            var spinner = button.find('.loadSpinner');
            spinner.toggleClass('active');
            lotSelect.html('');
            stageSelect.html('');
            locationSelect.html('');
            projectSelect.html('');
            companySelect.html('');
            frontSelect.html('');
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'JSON',
                success: function(data){
                    lotSelect.append('<option value=""></option>')
                    $.each( data['lots'], function( key, value ) {
                        lotSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    stageSelect.append('<option value=""></option>')
                    $.each( data['stages'], function( key, value ) {
                        stageSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    locationSelect.append('<option value=""></option>')
                    $.each( data['locations'], function( key, value ) {
                        locationSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    projectSelect.append('<option value=""></option>')
                    $.each( data['projects'], function( key, value ) {
                        projectSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    companySelect.append('<option value=""></option>')
                    $.each( data['companies'], function( key, value ) {
                        companySelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    frontSelect.append('<option value=""></option>')
                    $.each( data['fronts'], function( key, value ) {
                        frontSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    spinner.toggleClass('active');
                    modal.modal('show');
                }
            })
        })

        $('#registerWarehouseForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = $(this).serialize();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(e){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Punto verde registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#RegisterWarehouseModal').modal('hide')
                    warehousesTable.draw();
                }
            })
        })

        $('body').on('click', '.editWarehouse', function(){
            var getDataUrl = $(this).data('send');
            var url = $(this).data('url');
            var modal = $('#EditWarehouseModal');
            var lotSelect = modal.find('#editLotSelect');
            var stageSelect = modal.find('#editStageSelect');
            var locationSelect = modal.find('#editLocationSelect');
            var projectSelect =  modal.find('#editProjectSelect');
            var companySelect =  modal.find('#editCompanySelect');
            var frontSelect = modal.find('#editFrontSelect');
            lotSelect.html('');
            stageSelect.html('');
            locationSelect.html('');
            projectSelect.html('');
            companySelect.html('');
            frontSelect.html('');

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data){
                    lotSelect.append('<option value=""></option>')
                    $.each( data['lots'], function( key, value ) {
                        lotSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    stageSelect.append('<option value=""></option>')
                    $.each( data['stages'], function( key, value ) {
                        stageSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    locationSelect.append('<option value=""></option>')
                    $.each( data['locations'], function( key, value ) {
                        locationSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    projectSelect.append('<option value=""></option>')
                    $.each( data['projects'], function( key, value ) {
                        projectSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    companySelect.append('<option value=""></option>')
                    $.each( data['companies'], function( key, value ) {
                        companySelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });
                    frontSelect.append('<option value=""></option>')
                    $.each( data['fronts'], function( key, value ) {
                        frontSelect.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                    });

                    lotSelect.val(data.selecLot).change();
                    stageSelect.val(data.selectStage).change();
                    locationSelect.val(data.selectLocation).change();
                    projectSelect.val(data.selectProject).change();
                    companySelect.val(data.selectCompany).change();
                    frontSelect.val(data.selectFront).change();

                    modal.modal('show');
                }
            });

            $('#editWarehouseForm').attr('action', url)
        });

        $('#editWarehouseForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = $(this);

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Punto verde actualizado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditWarehouseModal').modal('hide');
                    warehousesTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('body').on('click', '.deleteWarehouse', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                warehousesTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este punto de acopio está relacionado a una guía de internamiento',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        });

        /*--------- LOT TABLE -----------*/

        var lotsTableEle = $('#lots-table');
        var getDataLotsUrl = lotsTableEle.data('url');
        var lotsTable =lotsTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataLotsUrl,
                "data" : {
                    "table": "lot"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#RegisterLotsModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var text = button.data('text');
            var placeholder = button.data('placeholder');
            var modal = $(this);
            var form =  modal.find('#registerLotForm');
            form.attr('action', url);
            modal.find('#txt-context-element').html(text);
            modal.find('#inputName').attr('placeholder', placeholder)
        })
        $('#registerLotForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = this;
            var formData = $(form).serialize();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerLotForm').trigger('reset');
                    $('#RegisterLotsModal').modal('hide');

                    lotsTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })

        })

        $('#EditLotModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var getDataUrl = button.data('send');
            var modal = $(this);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    modal.find('#inputName').val(data.name);
                }
            });

            modal.find('#editLotsForm').attr('action', url);
        })
        $('#editLotsForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Lote actualizado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditLotModal').modal('hide');
                    lotsTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })
        
        $('body').on('click', '.deleteLot', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                lotsTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este Lote está relacionado a un punto de acopio',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })

        /* -------- STAGE TABLE -----------*/

        var stageTableEle = $('#stage-table');
        var getDataStagesUrl = stageTableEle.data('url');
        var stagesTable = stageTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataStagesUrl,
                "data" : {
                    "table": "stage"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#RegisterStagesModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var text = button.data('text');
            var placeholder = button.data('placeholder');
            var modal = $(this);
            var form =  modal.find('#registerStageForm');
            form.attr('action', url);
            modal.find('#txt-context-element').html(text);
            modal.find('#inputName').attr('placeholder', placeholder)
        })
        $('#registerStageForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = this;
            var formData = $(form).serialize();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerStageForm').trigger('reset');
                    $('#RegisterStagesModal').modal('hide');

                    stagesTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('#EditStageModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var getDataUrl = button.data('send');
            var modal = $(this);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    modal.find('#inputStageName').val(data.name);
                }
            });

            modal.find('#editStageForm').attr('action', url);
        })
        $('#editStageForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Etapa actualizada exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditStageModal').modal('hide');
                    stagesTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('body').on('click', '.deleteStage', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                stagesTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este registro está relacionado a un punto de acopio',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })

        /* ----------- LOCATION TABLE --------*/

        var locationTableEle = $('#location-table');
        var getDataLocationsUrl = locationTableEle.data('url');
        var locationsTable = locationTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataLocationsUrl,
                "data" : {
                    "table": "location"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#RegisterLocationsModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var text = button.data('text');
            var placeholder = button.data('placeholder');
            var modal = $(this);
            var form =  modal.find('#registerLocationForm');
            form.attr('action', url);
            modal.find('#txt-context-element').html(text);
            modal.find('#inputName').attr('placeholder', placeholder)
        })
        $('#registerLocationForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = this;
            var formData = $(form).serialize();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerLocationForm').trigger('reset');
                    $('#RegisterLocationsModal').modal('hide');

                    locationsTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('#EditLocationModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var getDataUrl = button.data('send');
            var modal = $(this);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    modal.find('#inputLocationName').val(data.name);
                }
            });

            modal.find('#editLocationForm').attr('action', url);
        })
        $('#editLocationForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Locación actualizada exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditLocationModal').modal('hide');
                    locationsTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('body').on('click', '.deleteLocation', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                locationsTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este registro está relacionado a un punto de acopio',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })

        /* ------------  PROJECT TABLE -------------*/

        var projectTableEle = $('#project-table');
        var getDataProjectsUrl = projectTableEle.data('url');
        var projectTable = projectTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataProjectsUrl,
                "data" : {
                    "table": "project"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#RegisterProjectsModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var text = button.data('text');
            var placeholder = button.data('placeholder');
            var modal = $(this);
            var form =  modal.find('#registerProjectForm');
            form.attr('action', url);
            modal.find('#txt-context-element').html(text);
            modal.find('#inputName').attr('placeholder', placeholder)
        })
        $('#registerProjectForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = this;
            var formData = $(form).serialize();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerProjectForm').trigger('reset');
                    $('#RegisterProjectsModal').modal('hide');

                    projectTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('#EditProjectModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var getDataUrl = button.data('send');
            var modal = $(this);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    modal.find('#inputProjectName').val(data.name);
                }
            });

            modal.find('#editProjectForm').attr('action', url);
        })
        $('#editProjectForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Área de proyecto actualizada exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditProjectModal').modal('hide');
                    projectTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('body').on('click', '.deleteProject', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                projectTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este registro está relacionado a un punto de acopio',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })


        /* ------------ COMPANY TABLE -------------*/

        var companyTableEle = $('#company-table');
        var getDataCompanysUrl = companyTableEle.data('url');
        var companyTable = companyTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataCompanysUrl,
                "data" : {
                    "table": "company"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'ruc', name:'ruc'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#RegisterCompaniesModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var text = button.data('text');
            var placeholder = button.data('placeholder');
            var modal = $(this);
            var form =  modal.find('#registerCompanyForm');
            form.attr('action', url);
            modal.find('#txt-context-element').html(text);
            modal.find('#inputName').attr('placeholder', placeholder)
        })
        $('#registerCompanyForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = this;
            var formData = $(form).serialize();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerCompanyForm').trigger('reset');
                    $('#RegisterCompaniesModal').modal('hide');

                    companyTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('#EditCompanyModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var getDataUrl = button.data('send');
            var modal = $(this);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    modal.find('#inputCompanyName').val(data.name);
                    modal.find('#inputCompanyRuc').val(data.ruc);
                }
            });
            modal.find('#editCompanyForm').attr('action', url);
        })
        $('#editCompanyForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Empresa actualizada exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditCompanyModal').modal('hide');
                    companyTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('body').on('click', '.deleteCompany', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                companyTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este registro está relacionado a un punto de acopio',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })

        /* ------- FRONT TABLE -----------*/

        var frontTableEle = $('#front-table');
        var getDataFrontsUrl = frontTableEle.data('url');
        var frontTable = frontTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataFrontsUrl,
                "data" : {
                    "table": "front"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

        $('#RegisterFrontsModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var text = button.data('text');
            var placeholder = button.data('placeholder');
            var modal = $(this);
            var form =  modal.find('#registerFrontForm');
            form.attr('action', url);
            modal.find('#txt-context-element').html(text);
            modal.find('#inputName').attr('placeholder', placeholder)
        })
        $('#registerFrontForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = this;
            var formData = $(form).serialize();
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formData,
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerFrontForm').trigger('reset');
                    $('#RegisterFrontsModal').modal('hide');

                    frontTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('#EditFrontModal').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var url = button.data('url');
            var getDataUrl = button.data('send');
            var modal = $(this);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data)
                {
                    modal.find('#inputFrontName').val(data.name);
                }
            });
            modal.find('#editFrontForm').attr('action', url);
        })
        $('#editFrontForm').on('submit', function(e){
            e.preventDefault();
            var loadSpinner = $(this).find('.loadSpinner')
            loadSpinner.toggleClass('active');
            var form = this;

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(form).serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Frente actualizado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });
                    loadSpinner.toggleClass('active');
                    $('#EditFrontModal').modal('hide');
                    frontTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        })

        $('body').on('click', '.deleteFront', function(){
            var url = $(this).data('url');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){
                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                frontTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else if(result.success == 'invalid'){
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error: Este registro está relacionado a un punto de acopio',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }   
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
        })
     }





     /* ------------- WASTE CLASSES --------*/

     if($('#waste-class-table').length)
     {
        var wasteClassTableEle = $('#waste-class-table');
        var getDataUrl = wasteClassTableEle.data('url');
        var wasteClassTable = wasteClassTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "class"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name'},
                {data: 'symbol', name:'symbol'},
                {data: 'types', name:'types'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });



        if($('#registerWasteTypesSelect').length)
        {
            var registerWasteTypeSelect = $('#registerWasteTypesSelect');
            registerWasteTypeSelect.select2({
                dropdownParent: $("#RegisterClassModal"),
                closeOnSelect: false,
                placeholder: 'Selecciona uno o más tipos de residuo'
            });
        }

        /*------------ REGISTER CLASS -----------*/

        $('#registerWasteClassForm').on('submit', function(e){
            e.preventDefault();
            var form = $(this);
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Clase registrada exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerWasteClassForm').trigger('reset');
                    $('#RegisterClassModal').modal('hide');
                    $('#registerWasteTypesSelect').val([]).trigger('change');

                    wasteClassTable.draw();
                },
                error: function(data){
                    console.log(data)
                }
            })

        })


        /* ------------- DELETE ------------------*/

        $('body').on('click', '.deleteClass', function(){
            var url = $(this).data('url');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){

                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success === true){
                                wasteClassTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }else{
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: '¡Ocurrió un error inesperado!',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })

        })

        if($('#editWasteTypesSelect').length)
        {
            var editWasteTypesSelect = $('#editWasteTypesSelect');
            editWasteTypesSelect.select2({
                dropdownParent: $("#EditClassModal"),
                closeOnSelect: false,
                placeholder: 'Selecciona uno o más tipos de residuo'
            });
        }


        /* ------------- EDIT WASTE CLASS ---------------*/


        $('body').on('click', '.editClass', function(){
            var getDataUrl = $(this).data('send');
            var url = $(this).data('url');
            var modal = $('#EditClassModal');
            var selectTypes = $('#editWasteTypesSelect');
            
            modal.find('#EditWasteClassForm').attr('action', url);

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function(data){
                    modal.find('#inputEditNameWasteClass').val(data.name);
                    modal.find('#inputSymbolWasteClass').val(data.name);

                    selectTypes.append('<option value=""></option>');
                    $.each(data['types'], function(key, value){
                        selectTypes.append('<option value="'+value.id+'">'+value.name+'</option>')
                    })
                    selectTypes.val(data['selectedTypes']).change();
                },
                error: function(data)
                {
                    console.log(data)
                },
                complete: function(data){
                    modal.modal('show');
                }
            });
        })

        $('#EditClassModal').on('hidden.bs.modal', function(e){
            $('#editWasteTypesSelect').html('');
        })


        $('#EditWasteClassForm').on('submit', function(e){
            e.preventDefault();

            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Clase actualizada exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                    });

                    loadSpinner.toggleClass('active');
                    $('#EditClassModal').modal('hide');
                    wasteClassTable.draw();
                },
                error: function(data){
                    console.log(data);
                }
            })

        })





         /* ------------- WASTE TYPES -------------*/

         var wasteTypeTableEle = $('#waste-type-table');
         var getTypeUrl = wasteTypeTableEle.data('url');
         var wasteTypeTable = wasteTypeTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getTypeUrl,
                "data": {
                    "table": "type"
                }
            },
            columns:[
                {data: 'id', name:'id'},
                {data: 'name', name:'name', className:"columnType"},
                {data: 'action', name:'action', orderable: false, searchable: false, className:"btnWasteType"},
            ]
         })

         /* ----------- REGISTER ------------*/

         $('#registerWasteTypeForm').on('submit', function(e){
            e.preventDefault();
            
            var loadSpinner = $(this).find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'JSON',
                success: function(data){
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '¡Tipo de residuo registrado exitosamente!',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                          }
                    });

                    loadSpinner.toggleClass('active');
                    $('#registerWasteTypeForm').trigger('reset');

                    wasteTypeTable.draw();
                },
                error: function(data)
                {
                    console.log(data);
                }
            })

         })


         /* -------------- EDIT ------------ */

         $('body').on('click', '.editType', function(){
            var column = $(this).closest('tr');
            var buttons = column.find('.btnWasteType');
            var tdText = column.find('.columnType');
            var value = tdText.text();

            column.addClass('edit-ready').siblings().removeClass('edit-ready');
            column.siblings().find('#form-type-edit-container').remove();
            column.siblings().find('.input-type-edit').remove();

            buttons.before('<td class="input-type-edit"> \
                                <input type="text" class="form-control" value="'+value+'" required> \
                            </td>');
 
            column.append('<td id="form-type-edit-container"> \
                                <button type="button"\
                                        class="me-3 edit btn btn-primary btn-sm btn-update-waste-type\
                                        "> \
                                        <i class="fa-solid fa-floppy-disk"></i> \
                                </button> \
                                <button id="resetWasteTypeEdit"\
                                        class="ms-3 btn btn-danger btn-sm"> \
                                        <i class="fa-solid fa-x"></i> \
                                </button> \
                            </td>');
         })


         $('body').on('click', '#resetWasteTypeEdit', function(){
            var column = $(this).closest('tr');
            column.toggleClass('edit-ready');

            column.find('.input-type-edit').remove();
            $('#form-type-edit-container').remove();
         })

         $('body').on('click', '.btn-update-waste-type', function(){
            var column = $(this).closest('tr');
            var value = column.find('.input-type-edit input').val();
            var url = column.find('.editType').data('url');

            if(value.length == 0)
            {
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: '¡El campo está vacío!',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                });
            }
            else{
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        "value": value
                    },
                    dataType: "JSON",
                    success: function(result){
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: '¡Registrado exitosamente!',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                              }
                        });

                        wasteTypeTable.draw();
                    },
                    error: function(result){
                        console.log(result)
                    }
                });
            }
         });



         /*-------------- DELETE --------------*/

         $('body').on('click', '.deleteType', function(){
            var url = $(this).data('url');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no podrá ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then(function(e){

                if(e.value === true){
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function(result){
                            if(result.success == true){
                                wasteTypeTable.draw();
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: 'Registro eliminado',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }
                            else if(result.success == 'invalid')
                            {
                                Swal.fire({
                                    toast: true,
                                    icon: 'warning',
                                    title: '¡Este registro está relacionado a una o más clases de residuo, no se puede eliminar!',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }
                            else{
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: '¡Ocurrió un error inesperado!',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                      }
                                });
                            }
                        },
                        error: function(result){
                            console.log('Error', result);
                        }
                    });
                }else{
                    e.dismiss;
                }
              }, function(dismiss){
                return false;
              })
         })


     }



});

