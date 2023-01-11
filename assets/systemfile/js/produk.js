app.Produk = {
	controller: "Controller_produk/",
	init: function () {
		var file = this;
		file.getAllProduk();
		var flag_insert_update = 0;
		tableProduk = $('#tbl-produk').DataTable({
			responsive: true
		});

		file.getKodeBarang();
		file.getWarna();

		$("#btn-simpan-produk").click(function () {
			file.insertProduk(flag_insert_update);
		})

		$('#tbl-produk tbody').on('click', '.btn-edit-produk', function () {
			flag_insert_update = 1;
			// console.log(tableStokBarang.row($(this).parents('tr')).data());
			let data = tableProduk.row($(this).parents('tr')).data();
			console.log(data);
			$(".div-produk").val("");
			$("#inp-kode-barang").val(data[0]);
			$("#inp-nama-barang").val(data[1]);
			$("#slc-warna").val(data[2]);
			$("#inp-ukuran").val(data[4]);
			$("#inp-harga-satuan").val(accounting.unformat(data[5]));
			$("#inp-qty-produk").val(data[6]);
		});

		$('#tbl-produk tbody').on('click', '.btn-hapus-produk', function () {

			let data = tableProduk.row($(this).parents('tr')).data();
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
					file.hapusProduk(data[0]);
				}
			})


		});

		$("#inp-harga-satuan").focus(function () {
			$(this).val(accounting.unformat($(this).val()))
		})

		$("#inp-harga-satuan").blur(function () {
			$(this).val(accounting.formatMoney($(this).val(), '', 2, ',', '.'),)
		})

		$("#btn-reset-produk").click(function () {
			$(".div-produk").val("");
			file.getKodeBarang();
		})


	},

	getKodeBarang: function () {
		$.ajax({
			url: app.base_url + this.controller + "getKodeProduk",
			success: function (response) {
				try {
					// console.log(response);
					$("#inp-kode-barang").val(response);
				} catch (e) {
					toastr.error(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},

	getWarna: function () {
		$.ajax({
			url: app.base_url + this.controller + "getWarna",
			success: function (response) {
				try {
					console.log(response);
					// $("#inp-kode-barang").val(response);
					$("#slc-warna").append("<option value=" + "" + "> -- Pilih Warna --</option>");
					$.each(response, function () {
						$("#slc-warna").append("<option value=" + this['kode_warna'] + ">" + this['nama_warna'] + "</option>");
					})
				} catch (e) {
					toastr.error(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},

	insertProduk: function (flag_insert_update) {
		var kode_produk = $("#inp-kode-barang").val();
		var nama_produk = $("#inp-nama-barang").val();
		var kode_warna = $("#slc-warna").val();
		var ukuran = $("#inp-ukuran").val();
		var harga_satuan = accounting.unformat($("#inp-harga-satuan").val());
		var quantity = $("#inp-qty-produk").val();
		var alert = "";
		var link_controller = "";
		if (flag_insert_update == 1) {
			link_controller = "updateProduk";
		} else {
			link_controller = "insertProduk";
		}

		if (nama_produk.length == 0) {
			alert += "Nama Produk tidak boleh kosong</br>";
		}

		if (kode_warna.length == 0) {
			alert += "Warna tidak boleh kosong</br>";
		}

		if (ukuran.length == 0) {
			alert += "Ukuran tidak boleh kosong</br>";
		}

		if (harga_satuan.length == 0) {
			alert += "Harga Satuan tidak boleh kosong</br>";
		}

		if (quantity.length == 0) {
			alert += "Quantity tidak boleh kosong</br>";
		}

		if (alert.length != 0) {
			toastr.error(alert);
			return false;
		} else {
			$.ajax({
				url: app.base_url + this.controller + link_controller,
				type: "POST",
				data: {
					kode_produk: kode_produk,
					nama_produk: nama_produk,
					kode_warna: kode_warna,
					ukuran: ukuran,
					harga_satuan: harga_satuan,
					quantity: quantity
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

	getAllProduk: function () {
		let unit = [];
		$.ajax({
			url: app.base_url + this.controller + "getAllProduk",
			success: function (response) {
				try {
					console.log(response);
					$.each(response, function () {
						unit.push([
							this['kode_produk'],
							this['nama_produk'],
							this['kode_warna'],
							this['nama_warna'],
							this['ukuran'],
							accounting.formatMoney(this['harga_satuan'], '', 2, ',', '.'),
							this['quantity'],
							'<a href="#" class="btn-edit-produk"><span class="fa fa-pen"></span></a> <a href="#" class="btn-hapus-produk"><span class="fa fa-trash-alt delete"></span></a>'
						]);
					})

					tableProduk.clear();
					tableProduk.rows.add(unit).draw(false);
					console.log(tableProduk.data().rows().length);
				} catch (e) {
					console.log(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},
	hapusProduk: function (kode_produk) {
		$.ajax({
			url: app.base_url + this.controller + "hapusProduk",
			type: "POST",
			data: {
				kode_produk: kode_produk,
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
	app.Produk.init();
})
