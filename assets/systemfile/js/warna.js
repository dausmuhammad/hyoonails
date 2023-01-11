app.Warna = {
    controller: "Controller_warna/",
    init: function () {
        var file = this;
        file.getAllWarna();
        var flag_insert_update = 0;
        tableWarna = $('#tbl-warna').DataTable({
            responsive: true
        });

        $("#btn-simpan-warna").click(function () {
            file.insertWarna(flag_insert_update);
        })

        $('#tbl-warna tbody').on('click', '.btn-edit-warna', function () {
            flag_insert_update = 1;
            // console.log(tableStokBarang.row($(this).parents('tr')).data());
            let data = tableWarna.row($(this).parents('tr')).data();
            console.log(data);
            $(".div-warna").val("");
            $("#inp-kode-warna").val(data[0]);
            $("#inp-nama-warna").val(data[1]);
        })

        $('#tbl-warna tbody').on('click', '.btn-hapus-warna', function () {
            let data = tableWarna.row($(this).parents('tr')).data();
            console.log(data);
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah anda yakin ingin menghapus data ini ? ",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    file.hapusWarna(data[0]);
                }
            })
        });
    },

    getAllWarna: function () {
        var warna = [];
        $.ajax({
            url: app.base_url + this.controller + "getWarna",
            success: function (response) {
                try {
                    console.log(response);
                    // $("#inp-kode-barang").val(response);
                    console.log(response);
                    $.each(response, function () {
                        warna.push([
                            this['kode_warna'],
                            this['nama_warna'],
                            '<a href="#" class="btn-edit-warna"><span class="fa fa-pen"></span></a> <a href="#" class="btn-hapus-warna"><span class="fa fa-trash-alt delete"></span></a>'
                        ]);
                    })
                    tableWarna.clear();
                    tableWarna.rows.add(warna).draw(false);
                    console.log(tableWarna.data().rows().length);
                } catch (e) {
                    toastr.error(e.message);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
    },

    insertWarna: function (flag_insert_update) {
        var kode_warna = $("#inp-kode-warna").val();
        var nama_warna = $("#inp-nama-warna").val();
        var alert = "";
        var link_controller = "";
        if (flag_insert_update == 1) {
            link_controller = "updateWarna";
        } else {
            link_controller = "insertWarna";
        }

        if (kode_warna.length == 0) {
            alert += "Kode Warna tidak boleh kosong</br>";
        }

        if (nama_warna.length == 0) {
            alert += "Nama Warna boleh kosong</br>";
        }

        if (alert.length != 0) {
            toastr.error(alert);
            return false;
        } else {
            $.ajax({
                url: app.base_url + this.controller + link_controller,
                type: "POST",
                data: {
                    kode_warna: kode_warna,
                    nama_warna: nama_warna
                },
                success: function (response) {
                    try {
                        if (response) {
                            Swal.fire(
                                'Berhasil',
                                'Data berhasil di simpan',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    $(".div-warna").val("");
                                    location.reload();
                                }
                            })
                        }
                    } catch (e) {
                        toastr.error(e.message);
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            })
        }


    },
    hapusWarna: function (kode_warna) {
        $.ajax({
            url: app.base_url + this.controller + "hapusWarna",
            type: "POST",
            data: {
                kode_warna: kode_warna,
            },
            success: function (response) {
                try {
                    if (response) {
                        Swal.fire(
                            'Berhasil',
                            'Data berhasil di hapus',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })

                    }
                } catch (e) {
                    toastr.error(e.message);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
    }
}

$(document).ready(function () {
    app.Warna.init();
})
