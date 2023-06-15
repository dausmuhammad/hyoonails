app.LapKeuangan = {
	controller: "Controller_lap_keuangan/",
	init: function () {
		var file = this;
		file.getAllLapKeuangan();
		var flag_insert_update = 0;
		tableLapKeuangan = $('#tbl-lap-keuangan').DataTable({
			responsive: true
		});

		// file.getKodeBarang();
		// file.getWarna();

		$("#btn-simpan-lap-keuangan").click(function () {
			file.insertLapKeuangan(flag_insert_update);
		})

		$('#tbl-lap-keuangan tbody').on('click', '.btn-cetak', function () {
			let data = tableLapKeuangan.row($(this).parents('tr')).data();
			console.log(data);
			file.cetakLaporanKeuangan(data);
		});

		$("#inp-uang-masuk").focus(function () {
			$(this).val(accounting.unformat($(this).val()))
		})

		$("#inp-uang-masuk").blur(function () {
			$(this).val(accounting.formatMoney($(this).val(), '', 2, ',', '.'),)
		})

        $("#inp-uang-keluar").focus(function () {
			$(this).val(accounting.unformat($(this).val()))
		})

		$("#inp-uang-keluar").blur(function () {
			$(this).val(accounting.formatMoney($(this).val(), '', 2, ',', '.'),)
		})

		$("#btn-reset-produk").click(function () {
			$(".div-produk").val("");
			file.getKodeBarang();
		})


	},

	insertLapKeuangan: function (flag_insert_update) {
		var uang_masuk = accounting.unformat($("#inp-uang-masuk").val());
		var tanggal_uang_masuk = $("#inp-tanggal-masuk").val();
		var uang_keluar = accounting.unformat($("#inp-uang-keluar").val());
		var tanggal_uang_keluar = $("#inp-tanggal-keluar").val();
		var keterangan = $("#txt-keterangan").val();

		var alert = "";
		var link_controller = "";

		// if (flag_insert_update == 1) {
		// 	link_controller = "updateProduk";
		// } else {
		// 	link_controller = "insertProduk";
		// }

		if (uang_masuk.length == 0) {
			alert += "Uang Masuk Tidak Boleh Kosong</br>";
		}

		if (tanggal_uang_masuk == "") {
			alert += "Tanggal Uang Masuk tidak boleh kosong</br>";
		}

		if (uang_keluar.length == 0) {
			alert += "Uang Keluar tidak boleh kosong</br>";
		}

		if (tanggal_uang_keluar == "") {
			alert += "Tanggal Uang Keluar tidak boleh kosong</br>";
		}


		if (keterangan.length == "") {
			alert += "Keterangan tidak boleh kosong</br>";
		}


		if (alert.length != 0) {
			toastr.error(alert);
			return false;
		} else {
			$.ajax({
				url: app.base_url + this.controller + "insertUangMasuk",
				type: "POST",
				data: {
					uang_masuk: uang_masuk,
					tanggal_uang_masuk: tanggal_uang_masuk,
					uang_keluar: uang_keluar,
					tanggal_uang_keluar: tanggal_uang_keluar,
					keterangan : keterangan
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

									$(".div-produk").val("");
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

	getAllLapKeuangan: function () {
		let unit = [];
		$.ajax({
			url: app.base_url + this.controller + "getLapKeuangan",
			success: function (response) {
				try {
					console.log(response);
					$.each(response, function () {
                        let total = this['uang_masuk'] - this['uang_keluar'];
						unit.push([
							accounting.formatMoney(this['uang_masuk'], '', 2, ',', '.'),
							this['tgl_uang_masuk'],
							accounting.formatMoney(this['uang_keluar'], '', 2, ',', '.'),
							this['tgl_uang_keluar'],
							this['keterangan'],
                            accounting.formatMoney(total, '', 2, ',', '.'),
							'<a href="#" class="btn-cetak"><span class="fa fa-file"></span></a>'
						]);
					})

					tableLapKeuangan.clear();
					tableLapKeuangan.rows.add(unit).draw(false);
					console.log(tableLapKeuangan.data().rows().length);
				} catch (e) {
					console.log(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},
	cetakLaporanKeuangan: function (data) {
		$.ajax({
			url: app.base_url + this.controller + "cetakLaporanKeuangan",
			// async: false,
			type: "POST",
			data: {
				uang_masuk: data[0],
				tanggal_uang_masuk : data[1],
				uang_keluar: data[2],
				tanggal_uang_keluar : data[3],
				keterangan : data[4],
				total : data[5],
			},
			success: function (response) {
				try {
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
	app.LapKeuangan.init();
})
