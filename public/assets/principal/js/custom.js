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

    function validateInput(){
        var passValidation = true;
    
        $('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })
    
        return passValidation;
    }

    function showInvalidateMessage(){
        Swal.fire({
            toast: true,
            icon: 'warning',
            title: 'Advertencia',
            text: '¡Rellena el formulario para continuar!',
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
                {data: 'profile', name:'profile'},
                {data: 'company', name:'company'},
                {data: 'status-btn', name:'status-btn'},
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

            var userCompanySelect = $('#registerCompanySelect');
            userCompanySelect.select2({
                dropdownParent: $("#registerUserForm"),
                placeholder: 'Selecciona una empresa'
            })

            userRegisterSelect.on('change', function(){
                var value_id  = $(this).val();
                var url = $(this).data('url');
                
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        id: value_id,
                        company_id: userCompanySelect.val(),
                        type: 'approving'
                    },
                    dataType: 'JSON',
                    success: function(data){
                        if(data.valid == 'valid')
                        {
                            if(!($('#selectApprovingsRegister').length))
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
                                if(data['approvings'] != null)
                                {
                                    $.each( data['approvings'], function( key, value ) {
                                        selectApprovings.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                                    })
                                }
                            }
                         
                        }else{
                            $('#selectApprovingsRegister').remove();
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });

            })

            userCompanySelect.on('change', function(){

                if($('#selectApprovingsRegister').length)
                {
                    var company_id = $(this).val();
                    var url = $(this).data('url');
                    var selectApprovings = $('#registerApprovingsSelect')
                    selectApprovings.html('');
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            id: company_id,
                            type: 'company'
                        },
                        dataType: 'JSON',
                        success: function(data){
                            
                            selectApprovings.append('<option value=""></option>');
                            $.each( data['approvings'], function( key, value ) {
                                selectApprovings.append('<option value="'+value['id']+'">'+value['name']+'</option>');
                            })
                        },
                        error: function(data){
                            console.log(data);
                        }
                    });
                }
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
                    $('#registerCompanySelect').val('').trigger('change');

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
            var profileShow = modal.find('#profile-show-edit');
            modal.find('#image-signature-edit').remove();
            modal.find('#EditUserForm').attr('action', url);
            profileShow.html('');
            modal.find('#inputPasswordEdit').val('');
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
                    modal.find('#company-user-edit-txt').html(data.company)
                    modal.find('.img-signature-holder').html('<img class="img-fluid signature_img" id="image-signature-edit" src="'+data.url_signature+'"></img>');
                    modal.find('#image-upload-edit').attr('data-value', '<img scr="'+data.url_signature+'" class="img-fluid signature_img"');
                    modal.find('#image-upload-edit').val('');
                    profileShow.html(data.profile);
                   
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

    $('#btn-save-warehouse').on('click', function(e){
        e.preventDefault();
        var form = $('#registerWarehouseForm');
        var passValidation = true;

        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
        }
        else{
            showInvalidateMessage();
        }
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


    var lotsTable;

    $('#lots-tab').on('click', function(){

        if(!($('#lots-table_wrapper').length))
        {
            var lotsTableEle = $('#lots-table');
            var getDataLotsUrl = lotsTableEle.data('url');
                lotsTable = lotsTableEle.DataTable({
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
        }
    })

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

    $('#btn-save-lot').on('click', function(e){
        e.preventDefault();
        var form = $('#registerLotForm');

        var passValidation = true;
        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
                    form.trigger('reset');
                    $('#RegisterLotsModal').modal('hide');

                    lotsTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        }
        else{
            showInvalidateMessage();
        }
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

    var stagesTable;

    $('#stages-tab').on('click', function(){

        if(!($('#stage-table_wrapper').length))
        {
            var stageTableEle = $('#stage-table');
            var getDataStagesUrl = stageTableEle.data('url');
                stagesTable = stageTableEle.DataTable({
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
        }
    })  
    
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

    $('#btn-save-stage').on('click', function(e){
        e.preventDefault();
        var form = $('#registerStageForm');

        var passValidation = true;
        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
                    form.trigger('reset');
                    $('#RegisterStagesModal').modal('hide');

                    stagesTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        }
        else{
            showInvalidateMessage();
        }
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

    var locationsTable;

    $('#locations-tab').on('click', function(){

        if(!($('#location-table_wrapper').length))
        {
            var locationTableEle = $('#location-table');
            var getDataLocationsUrl = locationTableEle.data('url');
                locationsTable = locationTableEle.DataTable({
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
        }
    })

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

    $('#btn-save-location').on('click', function(e){
        e.preventDefault();
        var form = $('#registerLocationForm');

        var passValidation = true;
        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
                    form.trigger('reset');
                    $('#RegisterLocationsModal').modal('hide');

                    locationsTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        }
        else{
            showInvalidateMessage();
        }
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

    var projectTable;

    $('#projects-tab').on('click', function(){

        if(!($('#project-table_wrapper').length))
        {
            var projectTableEle = $('#project-table');
            var getDataProjectsUrl = projectTableEle.data('url');
                projectTable = projectTableEle.DataTable({
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
        }
    })

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

    $('#btn-save-project').on('click', function(e){
        e.preventDefault();
        var form = $('#registerProjectForm');

        var passValidation = true;
        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
                    form.trigger('reset');
                    $('#RegisterProjectsModal').modal('hide');

                    projectTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        }
        else{
            showInvalidateMessage();
        }
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

    var companyTable;

    $('#companies-tab').on('click', function(){

        if(!($('#company-table_wrapper').length))
        {
            var companyTableEle = $('#company-table');
            var getDataCompanysUrl = companyTableEle.data('url');
                companyTable = companyTableEle.DataTable({
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
        }
    })

    
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

    $('#btn-save-company').on('click', function(e){
        e.preventDefault();
        var form = $('#registerCompanyForm');

        var passValidation = true;
        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
                    form.trigger('reset');
                    $('#RegisterCompaniesModal').modal('hide');

                    companyTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        }
        else{
            showInvalidateMessage();
        }
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

    var frontTable;

    $('#fronts-tab').on('click', function(){

        if(!($('#front-table_wrapper').length))
        {
            var frontTableEle = $('#front-table');
            var getDataFrontsUrl = frontTableEle.data('url');
                frontTable = frontTableEle.DataTable({
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
        }
    })

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

    $('#btn-save-front').on('click', function(e){
        e.preventDefault();
        var form = $('#registerFrontForm');

        var passValidation = true;
        form.find('.required-input').each(function(){
            $(this).removeClass('required');
            if($(this).val() == ''){
                $(this).addClass('required');
                passValidation = false;
            }
        })

        if(passValidation)
        {
            var loadSpinner = form.find('.loadSpinner');
            loadSpinner.toggleClass('active');
            var formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
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
                    form.trigger('reset');
                    $('#RegisterFrontsModal').modal('hide');

                    frontTable.draw();
                },
                error: function(data){
                    console.log('Error', data)
                }
            })
        }
        else{
            showInvalidateMessage();
        }
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



    $('#register-wasteClass-btn').on('click', function(e){
        var button = $(this);
        var url = button.data('url');
        var modal = $('#RegisterClassModal');
        var selectTypes = $('#registerWasteTypesSelect');
        var spinner = button.find('.loadSpinner');
        spinner.toggleClass('active');
        selectTypes.html('');

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            success: function(data){
                selectTypes.append('<option value=""></option>');
                $.each(data['wasteTypes'], function(key, values){
                    selectTypes.append('<option value="'+values.id+'">'+values.name+'</option>')
                })
                spinner.toggleClass('active');
                modal.modal('show');
            },
            error: function(data){
                console.log(data);
            }
        })
        
    })



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

        $('#waste-type-table').on('click', '.editType', function(){
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


        $('#waste-type-table').on('click', '#resetWasteTypeEdit', function(){
        var column = $(this).closest('tr');
        column.toggleClass('edit-ready');

        column.find('.input-type-edit').remove();
        $('#form-type-edit-container').remove();
        })

        $('#waste-type-table').on('click', '.btn-update-waste-type', function(){
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

        $('#waste-type-table').on('click', '.deleteType', function(){
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





        /*---------- PACKAGE TYPES -----------*/

        var packageTypeTableEle = $('#package-type-table');
        var getTypeUrl = packageTypeTableEle.data('url');
        var packageTypeTable = packageTypeTableEle.DataTable({
        language: DataTableEs,
        serverSide: true,
        processing: true,
        ajax: {
            "url": getTypeUrl,
        },
        columns:[
            {data: 'id', name:'id'},
            {data: 'name', name:'name', className:"columnType"},
            {data: 'action', name:'action', orderable: false, searchable: false, className:"btnPackageType"},
        ]
        })

    /* ----------- REGISTER ------------*/

    $('#registerPackageTypeForm').on('submit', function(e){
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
                    title: '¡Tipo de embalaje registrado!',
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
                $('#registerPackageTypeForm').trigger('reset');

                packageTypeTable.draw();
            },
            error: function(data)
            {
                console.log(data);
            }
        })

    })


    /* -------------- EDIT ------------ */

    $('#package-type-table').on('click', '.editType', function(){
        var column = $(this).closest('tr');
        var buttons = column.find('.btnPackageType');
        var tdText = column.find('.columnType');
        var value = tdText.text();

        column.addClass('edit-ready').siblings().removeClass('edit-ready');
        column.siblings().find('#form-package-type-edit-container').remove();
        column.siblings().find('.input-type-edit').remove();

        buttons.before('<td class="input-type-edit"> \
                            <input type="text" class="form-control" value="'+value+'" required> \
                        </td>');

        column.append('<td id="form-package-type-edit-container"> \
                            <button type="button"\
                                    class="me-3 edit btn btn-primary btn-sm btn-update-package-type\
                                    "> \
                                    <i class="fa-solid fa-floppy-disk"></i> \
                            </button> \
                            <button id="resetpackageTypeEdit"\
                                    class="ms-3 btn btn-danger btn-sm"> \
                                    <i class="fa-solid fa-x"></i> \
                            </button> \
                        </td>');
        })


        $('#package-type-table').on('click', '#resetpackageTypeEdit', function(){
        var column = $(this).closest('tr');
        column.toggleClass('edit-ready');

        column.find('.input-type-edit').remove();
        $('#form-package-type-edit-container').remove();
        })



        $('#package-type-table').on('click', '.btn-update-package-type', function(){
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

                    packageTypeTable.draw();
                },
                error: function(result){
                    console.log(result)
                }
            });
        }
        });


        /*-------------- DELETE --------------*/

        $('#package-type-table').on('click', '.deleteType', function(){
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
                            packageTypeTable.draw();
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
                                title: '¡Este registro está relacionado a una o más guías de internamiento, no se puede eliminar!',
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




    /* ----------- GUIDES APPLICANTT -----------*/

    if($('#guide-table-applicant').length){
        var guideApplicantTableEle = $('#guide-table-applicant');
    var getDataUrl = guideApplicantTableEle.data('url');
    var guideApplicantTable = guideApplicantTableEle.DataTable({
        order: [[1, 'desc']],
        language: DataTableEs,
        serverSide: true,
        processing: true,
        ajax: getDataUrl,
        columns:[
            {data: 'code', name:'code'},
            {data: 'date', name:'date'},
            {data: 'lot', name:'lot'},
            {data: 'stage', name:'stage'},
            {data: 'location', name:'location'},
            {data: 'proyect', name:'proyect'},
            {data: 'company', name:'company'},
            {data: 'front', name:'front'},
            {data: 'stat_approved', name:'stat_approved'},
            {data: 'stat_recieved', name:'stat_recieved'},
            {data: 'stat_verified', name:'stat_verified'},
            {data: 'action', name:'action', orderable: false, searchable: false},
        ]
    });
    }


     if($('#registerGuideForm').length){


        var guideWarehouseSelect = $('#guide-warehouse-select');
        guideWarehouseSelect.select2({
                placeholder: 'Selecciona un punto verde'
            });


        $('#guide-warehouse-select').on('change', function(){
            var id = $(this).val();
            var url = $(this).data('url');

            $.ajax({
                type: 'GET',
                data: {
                    'id': id,
                    'type': 'warehouse'
                },
                url: url,
                dataType: 'JSON',
                success: function(data){
                    
                    $('#guide-lot-dis').val(data.lot);
                    $('#guide-stage-dis').val(data.stage);
                    $('#guide-location-dis').val(data.location);
                    $('#guide-proyect-dis').val(data.proyect);
                    $('#guide-company-dis').val(data.company);
                    $('#guide-front-dis').val(data.front);

                },
                error: function(data){
                    console.log(data)
                }
            });
        })



        var guideWasteClassSelect = $('#guide-wasteClass-select');
        guideWasteClassSelect.select2({
            placeholder: 'Selecciona una clase de residuo',
        });


        var guideWasteTypesSelect = $('#guide-wasteTypes-select');
        guideWasteTypesSelect.select2({
            placeholder: 'Selecciona uno o más tipos de residuo',
            closeOnSelect: false
        })


        $('#guide-wasteClass-select').on('change', function(){
            var url = $(this).data('url');
            var id = $(this).val();
            var selectWasteTypes = $('#guide-wasteTypes-select');

            $.ajax({
                url: url,
                data: {
                    "id": id,
                    'type': 'wasteClass'
                },
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    selectWasteTypes.html('');
                    selectWasteTypes.append('<option value=""></option>');
                    $.each(data['wasteTypes'], function(key, value){
                        selectWasteTypes.append('<option value="'+value.id+'">'+value.name+'</option>')
                    })
                },
                error: function(data){
                    console.log(data)
                }
            })
        })


        $('#btn-save-classWaste-guide').on('click', function(e){
            e.preventDefault();
            var selectTypes = $('#guide-wasteTypes-select');
            var values = selectTypes.val();
            var url = $(this).data('url');
            var tablePrepend = $('#table-classTypes-body');

            if(values.length == 0)
            {
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Advertencia:',
                    text: '¡Selecciona al menos un tipo de residuo para continuar!',
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
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        "values": values,
                        "type" : 'wasteType'
                    },
                    dataType: 'JSON',
                    success: function(data){

                        $.each(data['wasteTypes'], function(key, value){

                            if(!$('#rowClassType-'+value.id).length){
                                tablePrepend.prepend('<tr id="rowClassType-'+value.id+'"> \
                                                        <input type="hidden" name="wasteTypesId[]" value="'+value.id+'"> \
                                                        <td>'+value['classes_wastes'][0].symbol+'</td> \
                                                        <td>'+value['name']+'</td> \
                                                        <td> \
                                                            <input name="aproxWeightType-'+value.id+'" class="form-control col-6 selects-inputs-wasteType select-weight required-input" type="number" min="0" step="0.01" value=""> \
                                                        </td> \
                                                        <td> <input name="packageQuantity-'+value.id+'" class="form-control col-6 selects-inputs-wasteType select-quantity required-input" onkeypress="return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" type="number" min="0" step="1" value=""> </td> \
                                                        <td> <select name="packageType-'+value.id+'" class="form-control select2 select-packages required-input">\
                                                            </select>\
                                                        </td> \
                                                        <td> \
                                                            <button class="delete-row-wasteype-guide btn btn-danger">\
                                                                <i class="fa-solid fa-trash-can"></i>\
                                                            </button>\
                                                        </td> \
                                                    </tr>');

                                var selectPackages = $('#rowClassType-'+value.id).find('.select-packages');
                                selectPackages.append('<option value=""></option>');

                                $.each(data['packageTypes'], function(key2, value2){
                                    selectPackages.append('<option value="'+value2.id+'">'+value2.name+'</option>');
                                })

                                selectPackages.select2({
                                    placeholder: 'Selecciona un tipo de embalaje',
                                })
                            }
                        })
                    },
                    error: function(data){
                        console.log(data)
                    }
                })
            }
        })


        $('body').on('click', '.delete-row-wasteype-guide', function(e){
            e.preventDefault();
            $(this).closest('tr').remove();
            var totalWeight = 0;
            var totalQuantity = 0

            $('.select-weight').each(function(){
                totalWeight += Number($(this).val());
            })

            $('.select-quantity').each(function(){
                totalQuantity += Number($(this).val());
            })

            $('#info-package-quantity').html(totalQuantity);
            $('#info-total-weight').html(totalWeight.toFixed(2));
        })


        $('body').on('input', '.select-weight', function(){
            var totalWeight = 0

            $('.select-weight').each(function(){
                totalWeight += Number($(this).val());
            })

            $('#info-total-weight').html(totalWeight.toFixed(2));
        })

        $('body').on('input', '.select-quantity', function(){
            var totalQuantity = 0

            $('.select-quantity').each(function(){
                totalQuantity += Number($(this).val());
            })

            $('#info-package-quantity').html(totalQuantity);
        })


        var guideApprovingsSelect = $('#guide-approvings-select');
        guideApprovingsSelect.select2({
            placeholder: 'Selecciona un aprobante',
        });

        $('#guide-approvings-select').on('change', function(){
            $('#info-type-user-guide').html('APROBANTE');
        })




        $('#button-save-guide').on('click', function(e){
            e.preventDefault();

            var form = $('#registerGuideForm');
            var selectInputsLen = $('.selects-inputs-wasteType').length;
            var button = $(this);
            var spinner = button.find('.loadSpinner');
            
            var passValidation = validateInput();

            if(selectInputsLen == 0)
            {
                passValidation = false;
            }

            if(passValidation)
            {
                Swal.fire({
                    title: 'Confirmar solicitud',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                }).then(function(e){
                    if(e.value === true){
                        form.submit();
                    }else{
                        e.dismiss;
                    }
                }, function(dismiss){
                    return false;
                })
            }
            else{
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Advertencia:',
                    text: '¡Rellena el formulario para continuar!',
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
    }










    /* -------------- APPROVING --------------------*/
     

     if($('#guide-pending-table-approvant').length){
        
        var guidePendingTableEle = $('#guide-pending-table-approvant');
        var getDataUrl = guidePendingTableEle.data('url');
        var guidePendingTable = guidePendingTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "pending"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

     }  


     if($('#register-approved-guide-form').length)
     {

        $('#button-save-approved-guide').on('click', function(e){
            e.preventDefault();
            var form = $('#register-approved-guide-form');

            Swal.fire({
                title: 'Confirmar Aprobación',
                text: '¡Esta acción no se podrá deshacer!',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
                }).then((result)=>{
                if (result.isConfirmed) {
                    form.submit();
                    }
                }, function(dismiss){
                return false;
                })
        })

        $('#button-rejected-guide').on('click', function(e){
            e.preventDefault();
            var form = $('#form-reject-guide');
            Swal.fire({
                title: 'Rechazar solicitud',
                text: 'Luego se podrá deshacer esta acción',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Rechazar',
                cancelButtonText: 'Atrás',
                reverseButtons: true,
              }).then((result)=>{
                if (result.isConfirmed) {
                    form.submit();
                  }
              }, function(dismiss){
                return false;
              })

        })
     }


     if($('#guide-approved-table-approvant').length)
     {
        var guideApprovedTableEle = $('#guide-approved-table-approvant');
        var getDataUrl = guideApprovedTableEle.data('url');
        var guideApprovedTable = guideApprovedTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "approved"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }


     if($('#guide-rejected-table-approvant').length)
     {
        var guideRejectedTableEle = $('#guide-rejected-table-approvant');
        var getDataUrl = guideRejectedTableEle.data('url');
        var guideApprovedTable = guideRejectedTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "rejected"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }



  


    /* -------------- RECIEVER ---------------*/

     if($('#guide-pending-table-reciever').length){
        
        var guideRecieverPendingTableEle = $('#guide-pending-table-reciever');
        var getDataUrl = guideRecieverPendingTableEle.data('url');
        var guideRecieverPendingTable = guideRecieverPendingTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "pending"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });

     } 


     if($('#register-recieved-guide-form').length)
     {
        $('body').on('input', '.select-actual-weight', function(){
            var totalWeight = 0
    
            $('.select-actual-weight').each(function(){
                totalWeight += Number($(this).val());
            })
    
            $('#info-actual-total-weight').html(totalWeight.toFixed(2));
        })


        $('#button-save-reciever-guide').on('click', function(e){
            e.preventDefault();

            var form = $('#register-recieved-guide-form');

            var passValidation = validateInput();

            if(passValidation)
            {
                Swal.fire({
                    title: 'Confirmar Recepción',
                    text: '¡Esta acción no se podrá deshacer!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Aprobar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                  }).then((result)=>{
                    if (result.isConfirmed) {
                        form.submit();
                      }
                  }, function(dismiss){
                    return false;
                  })

            }else{
                Swal.fire({
                    toast: true,
                    icon: 'warning',
                    title: 'Advertencia:',
                    text: 'LLena todos los campos para continuar',
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


        $('#button-rejected-reciever-guide').on('click', function(e){
            e.preventDefault();
            var form = $('#form-reject-reciever-guide');
            Swal.fire({
                title: '¿Rechazar guía de internamiento?',
                text: 'Luego se podrá deshacer esta acción',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Rechazar',
                cancelButtonText: 'cerrar',
                reverseButtons: true,
              }).then((result)=>{
                if (result.isConfirmed) {
                    form.submit();
                  }
              }, function(dismiss){
                return false;
              })
        })
     }

     if($('#guide-recieved-table-reciever').length)
     {
        var guideRecieverTableEle = $('#guide-recieved-table-reciever');
        var getDataUrl = guideRecieverTableEle.data('url');
        var guideRecievedTable = guideRecieverTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "recieved"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }


     if($('#guide-rejected-table-reciever').length){
        var guideRejectedRecieverTableEle = $('#guide-rejected-table-reciever');
        var getDataUrl = guideRejectedRecieverTableEle.data('url');
        var guideApprovedTable = guideRejectedRecieverTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "rejected"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }





     /* -------------  VERIFICATOR  -------------*/


     if($('#guide-pending-table-verificator').length)
     {
        var guideVerificatorPendingTableEle = $('#guide-pending-table-verificator');
        var getDataUrl = guideVerificatorPendingTableEle.data('url');
        var guideVerificatorPendingTable = guideVerificatorPendingTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "pending"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }


     if($('#register-verified-guide-form').length){


        $('#button-save-verified-guide').on('click', function(e){
            e.preventDefault();

            var form = $('#register-verified-guide-form');

            Swal.fire({
                title: '¿Verificar Guía de Internamiento?',
                text: 'Esta acción no se podrá deshacer',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Verificar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
                }).then((result)=>{
                if (result.isConfirmed) {
                    form.submit();
                    }
                }, function(dismiss){
                return false;
                })
        })


        $('#button-rejected-verified-guide').on('click', function(e){
            e.preventDefault();
            var form = $('#form-reject-verified-guide');
            Swal.fire({
                title: '¿Rechazar guía de internamiento?',
                text: 'Luego se podrá deshacer esta acción.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Rechazar',
                cancelButtonText: 'cerrar',
                reverseButtons: true,
              }).then((result)=>{
                if (result.isConfirmed) {
                    form.submit();
                  }
              }, function(dismiss){
                return false;
              })

        })


     }


     if($('#guide-verified-table-verificator').length)
     {
        var guideVerifiedTableEle = $('#guide-verified-table-verificator');
        var getDataUrl = guideVerifiedTableEle.data('url');
        var guideVerifiedTable = guideVerifiedTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "verified"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }

     if($('#guide-rejected-table-verificator').length){
        var guideRejectedVerificatorTableEle = $('#guide-rejected-table-verificator');
        var getDataUrl = guideRejectedVerificatorTableEle.data('url');
        var guideApprovedTable = guideRejectedVerificatorTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: {
                "url": getDataUrl,
                "data": {
                    "table" : "rejected"
                }
            },
            columns:[
                {data: 'code', name:'code'},
                {data: 'date', name:'date'},
                {data: 'lot', name:'lot'},
                {data: 'stage', name:'stage'},
                {data: 'location', name:'location'},
                {data: 'proyect', name:'proyect'},
                {data: 'company', name:'company'},
                {data: 'front', name:'front'},
                {data: 'action', name:'action', orderable: false, searchable: false},
            ]
        });
     }







     /* ------------- UNDO REJECT GUIDE -------------*/    
     
     if($('#undoRejected-guide-form').length){

        $('#button-undoReject-guide').on('click', function(e){
            e.preventDefault();
            var form = $('#undoRejected-guide-form');

            Swal.fire({
                title: 'Confirmar',
                text: '¿Deshacer la acción?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
              }).then((result)=>{
                if (result.isConfirmed) {
                    form.submit();
                  }
              }, function(dismiss){
                return false;
              })

        });

     }
});

