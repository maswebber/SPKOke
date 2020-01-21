$(document).ready(function () {
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto2").change(function () {
        readURL(this, 'priv2');
    });
    //TABEL UMUM
    $('table.table-striped').DataTable();
    //TABEL USER
    var tabeluser = $('#tabeluser').DataTable({
        "ajax": { "url": baseurl + 'userjson', "dataSrc": "" },
        "columns": [
            { "data": "nomor" },
            { "data": "usn" },
            { "data": "role" },
            { "data":"foto",
                render:function(data){
                    return '<img class="attachment-img" src="'+baseurl+'assets/images/'+data+'" style="width:128px;height:128px" alt="Image Preview">'
                }

            },
            {
                "data": "status",
                render: function (data) {
                    if (data == 1) {
                        return '<button class="btn btn-success btn-block">Aktif</button></td></td>'
                    }
                    else {
                        return '<button class="btn btn-danger btn-block">Non-Aktif</button></td></td>'
                    }
                }
            },
            {
                "data": "",
                render: function () {
                    return '<div class="btn-group btn-block">' +
                        '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                        '<i class="fa fa-gears"></i> Opsi  ' +
                        '<span class="caret"></span>' +
                        '<span class="sr-only"> Toggle Dropdown</span>' +
                        '</button><ul class="dropdown-menu" role="menu">' +
                        '<li><a href="javascript:void(0)" id="edituser">Edit</a></li>' +
                        '<li><a href="javascript:void(0)" id="deluser">Hapus</a></li>' +
                        '</ul></div>'
                }
            },
        ]
    });
    $('#tabeluser tbody').on('click', '#edituser', function () {
        var data = tabeluser.row($(this).parents('tr')).data();
        $.ajax({
            type: 'GET',
            dataType: "text",
            url: baseurl + 'useredit/' + data['id_ngota'],
            cache: false,
            success: function (data) {
                if (data) {
                    $('#modal_target').html(data);
                    $('#modal').modal('toggle');
                    $("#foto").change(function () {
                        readURL(this, 'priv');
                    });
                    //FORM EDIT DATA USER
                    $("form#editus").submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            url: baseurl + 'Usermanager/edituser',
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                toastr.success(data, 'Sukses');
                                reload_user();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.error(thrownError, 'ERROR');
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    });
                }
                else {
                    console.log(data);
                }
            },
            error: function () {
                toastr.options.onHidden = function () { window.location.reload(); }
                toastr.error('Terjadi Kesalahan Silakan Coba lagi', 'ERROR');
            }
        });
    });
    $('#tabeluser tbody').on('click', '#deluser', function () {
        var data = tabeluser.row($(this).parents('tr')).data();
        $.confirm({
            title: 'Hapus Data',
            columnClass: 'medium',
            content: '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
            type: 'red',
            buttons: {
                hapus: {
                    text: 'Ya , Hapus Data',
                    btnClass: 'btn-danger',
                    action: function () {
                        var options = {
                            url: baseurl + 'Usermanager/deluser/',
                            dataType: "text",
                            type: "POST",
                            data: { iduser: data['id_ngota'] },
                            success: function (data) {
                                toastr.options.onHidden = function () { tabeluser.ajax.reload(); }
                                toastr.success(data, 'Sukses');
                                // tabeldosen.ajax.reload();
                            },
                            error: function (xhr, status, error) {
                                toastr.options.onHidden = function () { window.location.reload(); }
                                toastr.error('Terjadi Kesalahan Silakan Coba lagi', 'ERROR');
                            }
                        };
                        $.ajax(options);
                    }
                },
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-blue',
                    action: function () { },
                }
            }
        });
    });

    //ADD USER
    $('#useradd').click(function () {
        $.ajax({
            type: 'GET',
            url: baseurl + 'Usermanager/adduser',
            cache: false,
            success: function (data) {
                $('#modal_target').html(data);
                $('#modal').modal('toggle');
                $("#foto").change(function () {
                    readURL(this, 'priv');
                });
                $("form#addus").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: baseurl + 'Usermanager/adduser',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            toastr.success(data, 'Sukses');
                            reload_user();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            toastr.error(thrownError, 'ERROR');
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            }
        });
    });
    $("form#gantifoto").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var id=$('#idus').val();
        $.ajax({
            url: baseurl + 'user/foto/'+id,
            type: 'POST',
            data: formData,
            success: function (data) {
                toastr.success(data, 'Sukses');
                window.location = baseurl+'logout';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    $("form#gantipass").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: baseurl + 'home/ppwd',
            type: 'POST',
            data: formData,
            success: function (data) {
                toastr.success(data, 'Sukses');
                window.location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    //TABEL PERIODE
    var tabelperiode = $('#tabelperiode').DataTable({
        "ajax": { "url": baseurl + 'Periode/listperiode', "dataSrc": "" },
        "columns": [
            { "data": "nomor" },
            { "data": "tgl_mulai" },
            { "data": "tgl_selesai" },
            {
                "data": "",
                render: function () {
                    return '<div class="btn-group btn-block">' +
                        '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                        '<i class="fa fa-gears"></i> Opsi  ' +
                        '<span class="caret"></span>' +
                        '<span class="sr-only"> Toggle Dropdown</span>' +
                        '</button><ul class="dropdown-menu" role="menu">' +
                        '<li><a href="javascript:void(0)" id="editp">Edit</a></li>' +
                        '<li><a href="javascript:void(0)" id="delp">Hapus</a></li>' +
                        '</ul></div>'
                }
            },
        ]
    });
    $('#tabelperiode tbody').on('click', '#editp', function () {
        var data = tabelperiode.row($(this).parents('tr')).data();
        $.ajax({
            type: 'GET',
            dataType: "text",
            url: baseurl + 'Periode/editperiode/' + data['id_tahun'],
            cache: false,
            success: function (data) {
                if (data) {
                    $('#modal_target').html(data);
                    $('#modal').modal('toggle');
                    //FORM EDIT DATA USER
                    $("form#editp").submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            url: baseurl + 'Periode/editperiode/',
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                toastr.success(data, 'Sukses');
                                tabelperiode.ajax.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.error(thrownError, 'ERROR');
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    });
                }
                else {
                    console.log(data);
                }
            },
            error: function () {
                toastr.options.onHidden = function () { window.location.reload(); }
                toastr.error('Terjadi Kesalahan Silakan Coba lagi', 'ERROR');
            }
        });
    });
    $('#tabelperiode tbody').on('click', '#delp', function () {
        var data = tabelperiode.row($(this).parents('tr')).data();
        $.confirm({
            title: 'Hapus Data',
            columnClass: 'medium',
            content: '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
            type: 'red',
            buttons: {
                hapus: {
                    text: 'Ya , Hapus Data',
                    btnClass: 'btn-danger',
                    action: function () {
                        var options = {
                            url: baseurl + 'Periode/removeperiode/',
                            dataType: "text",
                            type: "POST",
                            data: { idtahun: data['id_tahun'] },
                            success: function (data) {
                                toastr.options.onHidden = function () { tabelperiode.ajax.reload(); }
                                toastr.success(data, 'Sukses');
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.options.onHidden = function () { window.location.reload(); }
                                toastr.error(thrownError, 'ERROR');
                            }
                        };
                        $.ajax(options);
                    }
                },
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-blue',
                    action: function () { },
                }
            }
        });
    });

    //ADD PERIODE
    $('#periodadd').click(function () {
        $.ajax({
            type: 'GET',
            url: baseurl + 'Periode/addperiode',
            cache: false,
            success: function (data) {
                $('#modal_target').html(data);
                $('#modal').modal('toggle');
                $("form#addp").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: baseurl + 'Periode/addperiode',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            toastr.success(data, 'Sukses');
                            tabelperiode.ajax.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            toastr.error(thrownError, 'ERROR');
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            }
        });
    });

    //TABEL KRITERIA
    var tabelkriteria = $('#tabelkriteria').DataTable({
        "ajax": { "url": baseurl + 'Kriteria/listkriteria', "dataSrc": "" },
        "columns": [
            { "data": "nomor" },
            { "data": "ketkri" },
            { "data": "bobot" },
            { "data": "atribut" },
            { "data": "name" },
            {
                "data": "status",
                render: function (data) {
                    if (data == 1) {
                        return '<button class="btn btn-success btn-block">Aktif</button></td></td>'
                    }
                    else {
                        return '<button class="btn btn-danger btn-block">Non-Aktif</button></td></td>'
                    }
                }
            },
            {
                "data": "",
                render: function () {
                    return '<div class="btn-group btn-block">' +
                        '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                        '<i class="fa fa-gears"></i> Opsi  ' +
                        '<span class="caret"></span>' +
                        '<span class="sr-only"> Toggle Dropdown</span>' +
                        '</button><ul class="dropdown-menu" role="menu">' +
                        '<li><a href="javascript:void(0)" id="editk">Edit</a></li>' +
                        '<li><a href="javascript:void(0)" id="delk">Delete</a></li>' +
                        '</ul></div>'
                }
            },
        ]
    });
    $('#tabelkriteria tbody').on('click', '#editk', function () {
        var data = tabelkriteria.row($(this).parents('tr')).data();
        $.ajax({
            type: 'GET',
            dataType: "text",
            url: baseurl + 'Kriteria/editkriteria/' + data['idkri'],
            cache: false,
            success: function (data) {
                if (data) {
                    $('#modal_target').html(data);
                    $('#modal').modal('toggle');
                    //FORM EDIT DATA USER
                    $("form#editk").submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            url: baseurl + 'Kriteria/editkriteria/',
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                toastr.success(data, 'Sukses');
                                tabelkriteria.ajax.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.error(thrownError, 'ERROR');
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    });
                }
                else {
                    console.log(data);
                }
            },
            error: function () {
                toastr.options.onHidden = function () { window.location.reload(); }
                toastr.error('Terjadi Kesalahan Silakan Coba lagi', 'ERROR');
            }
        });
    });
    $('#tabelkriteria tbody').on('click', '#delk', function () {
        var data = tabelkriteria.row($(this).parents('tr')).data();
        $.confirm({
            title: 'Hapus Data',
            columnClass: 'medium',
            content: '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
            type: 'red',
            buttons: {
                hapus: {
                    text: 'Ya , Hapus Data',
                    btnClass: 'btn-danger',
                    action: function () {
                        var options = {
                            url: baseurl + 'Kriteria/removekriteria/',
                            dataType: "text",
                            type: "POST",
                            data: { kri: data['idkri'] },
                            success: function (data) {
                                toastr.options.onHidden = function () { tabelkriteria.ajax.reload(); }
                                toastr.success(data, 'Sukses');
                                // tabeldosen.ajax.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.options.onHidden = function () { window.location.reload(); }
                                toastr.error(thrownError, 'ERROR');
                            }
                        };
                        $.ajax(options);
                    }
                },
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-blue',
                    action: function () { },
                }
            }
        });
    });

    //ADD KRITERIA
    $('#kritadd').click(function () {
        $.ajax({
            type: 'GET',
            url: baseurl + 'Kriteria/addkriteria',
            cache: false,
            success: function (data) {
                $('#modal_target').html(data);
                $('#modal').modal('toggle');
                $("form#addk").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: baseurl + 'Kriteria/addkriteria',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            toastr.success(data, 'Sukses');
                            tabelkriteria.ajax.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            toastr.error(thrownError, 'ERROR');
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            }
        });
    });

    //TABEL ALTER
    var tabelalter = $('#tabelalter').DataTable({
        "ajax": { "url": baseurl + 'Alternatif/listalter', "dataSrc": "" },
        "columns": [
            { "data": "nomor" },
            { "data": "ket" },
            {
                "data": "status",
                render: function (data) {
                    if (data == 1) {
                        return '<button class="btn btn-success btn-block">Aktif</button></td></td>'
                    }
                    else {
                        return '<button class="btn btn-danger btn-block">Non-Aktif</button></td></td>'
                    }
                }
            },
            {
                "data": "",
                render: function () {
                    return '<div class="btn-group btn-block">' +
                        '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
                        '<i class="fa fa-gears"></i> Opsi  ' +
                        '<span class="caret"></span>' +
                        '<span class="sr-only"> Toggle Dropdown</span>' +
                        '</button><ul class="dropdown-menu" role="menu">' +
                        '<li><a href="javascript:void(0)" id="edital">Edit</a></li>' +
                        '<li><a href="javascript:void(0)" id="delal">Hapus</a></li>' +
                        '</ul></div>'
                }
            },
        ]
    });
    $('#tabelalter tbody').on('click', '#edital', function () {
        var data = tabelalter.row($(this).parents('tr')).data();
        var idnya = data['idalter'];
        $.ajax({
            type: 'GET',
            dataType: "text",
            url: baseurl + 'Alternatif/editalter/' + idnya,
            cache: false,
            success: function (data) {
                if (data) {
                    $('#modal_target').html(data);
                    $('#modal').modal('toggle');
                    //FORM EDIT DATA USER
                    $("form#edital").submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        $.ajax({
                            url: baseurl + 'Alternatif/editalter/' + idnya,
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                toastr.success(data, 'Sukses');
                                tabelalter.ajax.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.error(thrownError, 'ERROR');
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    });
                }
                else {
                    console.log(data);
                }
            },
            error: function () {
                toastr.options.onHidden = function () { window.location.reload(); }
                toastr.error('Terjadi Kesalahan Silakan Coba lagi', 'ERROR');
            }
        });
    });
    $('#tabelalter tbody').on('click', '#delal', function () {
        var data = tabelalter.row($(this).parents('tr')).data();
        var idnya = data['idalter'];
        $.confirm({
            title: 'Hapus Data',
            columnClass: 'medium',
            content: '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
            type: 'red',
            buttons: {
                hapus: {
                    text: 'Ya , Hapus Data',
                    btnClass: 'btn-danger',
                    action: function () {
                        var options = {
                            url: baseurl + 'Alternatif/removealt',
                            dataType: "text",
                            type: "POST",
                            data: { idalter: idnya },
                            success: function (data) {
                                toastr.options.onHidden = function () { tabelalter.ajax.reload(); }
                                toastr.success(data, 'Sukses');
                                // tabeldosen.ajax.reload();
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                toastr.options.onHidden = function () { window.location.reload(); }
                                toastr.error(thrownError, 'ERROR');
                            }
                        };
                        $.ajax(options);
                    }
                },
                batal: {
                    text: 'Batal',
                    btnClass: 'btn-blue',
                    action: function () { },
                }
            }
        });
    });

    //ADD ALTER
    $('#alteradd').click(function () {
        $.ajax({
            type: 'GET',
            url: baseurl + 'Alternatif/addalter',
            cache: false,
            success: function (data) {
                $('#modal_target').html(data);
                $('#modal').modal('toggle');
                $("form#addal").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        url: baseurl + 'Alternatif/addalter',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            toastr.success(data, 'Sukses');
                            tabelalter.ajax.reload();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            toastr.error(thrownError, 'ERROR');
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            }
        });
    });

    $('#carper').on('click', function (event) {
        event.preventDefault();
        var periode = $('#perid').val();
        $.ajax({
            url: baseurl + 'Admin/isihasil',
            type: 'POST',
            data: { param1: periode },
        })
            .done(function (data) {
                toastr.success('Sukses Pencarian', 'Sukses');
                $('#ganti').html(data);
            })
            .fail(function (hr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            });
    });
    $('#carper2').on('click', function (event) {
        event.preventDefault();
        var periode = $('#perid2').val();
        $.ajax({
            url: baseurl + 'Admin/hitung',
            type: 'POST',
            data: { param1: periode },
        })
            .done(function (data) {
                toastr.success('Sukses Pencarian', 'Sukses');
                $('#ganti').html(data);
                $('#printlap').on('click', function () {
                    $('#printpa').printThis();
                });
            })
            .fail(function (hr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'ERROR');
            });
    });
    $('#preview').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            dataType: "text",
            url: baseurl + 'Admin/dummy',
            cache: false,
            success: function (data) {
                if (data) {
                    $('#modal_targetlg').html(data);
                    $('#modallg').modal('toggle');
                }
                else {
                    console.log(data);
                }
            },
            error: function () {
                toastr.options.onHidden = function () { window.location.reload(); }
                toastr.error('Terjadi Kesalahan Silakan Coba lagi', 'ERROR');
            }
        });
    });
    $('#headnote').summernote({
        tableClassName: function () {
            this.className = 'table borderless';
            this.style.cssText = '';
        },
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0], "#headnote");
            },
            onMediaDelete: function (target) {
                deleteImage(target[0].src);
            }
        }
    });
    $('#bodynote').summernote({
        tableClassName: function () {
            this.className = 'table borderless';
            this.style.cssText = '';
        },
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0], "#bodynote");
            },
            onMediaDelete: function (target) {
                deleteImage(target[0].src);
            }
        }
    });
    $('#footnote').summernote({
        tableClassName: function () {
            this.className = 'table borderless';
            this.style.cssText = '';
        },
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0], "#footnote");
            },
            onMediaDelete: function (target) {
                deleteImage(target[0].src);
            }
        }
    });
    function uploadImage(image, idnote) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: baseurl + "admin/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function (url) {
                $(idnote).summernote("insertImage", url);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
    function deleteImage(src) {
        $.ajax({
            data: { src: src },
            type: "POST",
            url: baseurl + "admin/delete_image",
            cache: false,
            success: function (response) {
                console.log(response);
            }
        });
    }
    $('form#format').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: baseurl + 'admin/save',
            type: 'POST',
            data: formData,
            success: function (data) {
                toastr.success(data, 'Sukses');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'Gagal');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $("#logo").change(function () {
        readURL(this, 'previewimg');
    });
    $('form#setting').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: baseurl + 'Admin/savelogo',
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            data: formData,
            success: function (data) {
                toastr.success(data, 'Sukses');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, 'Gagal');
            }
        });
    });

    function reload_user() {
        var tabeluser = $('#tabeluser').DataTable();
        tabeluser.ajax.reload();
    };

    var tablehistory = $('#tablehistory').DataTable({
        "ajax": { "url": baseurl + 'history', "dataSrc": "" },
        "columns": [
            { "data": "nomor" },
            { "data": "menu" },
            { "data": "aksi" },
            { "data": "user_name" },
            { "data": "tanggal_aksi" },
        ]
    });
});
