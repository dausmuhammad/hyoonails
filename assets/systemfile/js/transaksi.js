app.Transaksi = {
	controller: "Controller_transaksi/",
	init: function () {
		var file = this;
		var dateNow = new Date();
		var arrMonth = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
		var currentDate = dateNow.getDate() + " " + arrMonth[dateNow.getMonth()] + " " + dateNow.getFullYear();
		$("#btn-cancel-order").prop("disabled", true);
		$("#btn-submit-order").prop("disabled", true);
		$("#inp-tanggal-order").val(currentDate);
		tableOrder = $('#tbl-daftar-pesanan').DataTable({
			responsive: true
		});
		tablePilihProduk = $('#tbl-pilih-produk').DataTable({
			responsive: true
		});
		tableHistoryTrans = $('#tbl-history-trans').DataTable({
			responsive: true
		});
		tableHistoryDetail = $('#tbl-detail-history').DataTable({
			responsive: true
		});
		
		
		file.getNoOrder();
		$("#inp-nama-produk").click(function () {
			$('#inp-jumlah-beli').removeClass('is-invalid');
			$('#inp-jumlah-beli').val("");
			file.getAllProduk();
			$("#modal-barang").modal({ backdrop: 'static', keyboard: false }).show();
		})

		$('#tbl-pilih-produk tbody').on('click', 'tr', function () {
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
			} else {
				tablePilihProduk.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
				console.log(tablePilihProduk.row('.selected').data());
			}
		});

		$('#btn-tambah-tabel-order').click(function () {
			var index = 0;
			let dataBarang = tablePilihProduk.row('.selected').data();
			let dataOrder = tableOrder.rows().data();
			let jumlahBeli = $("#inp-jumlah-beli").val();
			let alert = "";

			$.each(dataOrder, function () {
				if (this[0] == dataBarang[0]) {
					alert += 'Untuk barang dengan kode ' + this[0] + ' sudah ada pada pesanan, silahkan hapus terlebih dahulu di list pesanan</br>'
				}
			})

			if (jumlahBeli.length == 0 || jumlahBeli == 0) {
				$('#inp-jumlah-beli').addClass('is-invalid');
				alert += "Jumlah beli tidak boleh kosong</br>";
			}

			if (dataBarang == undefined) {
				alert += "Anda belum memilih barang</br>";
			} else {
				if (parseInt(jumlahBeli) > parseInt(dataBarang[6])) {
					alert += "Stok " + dataBarang[1] + " tidak mencukupi</br>";
				}
			}

			if (alert.length != 0) {
				Swal.fire(
					'Peringatan',
					alert,
					'warning'
				)
				return false;
			} else {
				let rowCountTable = tableOrder.rows().count();
				// console.log(dataBarang);
				if (rowCountTable == 0) {
					index += 1;
				} else {
					index = rowCountTable + 1;
				}
				var arr = [];
				var total_harga = accounting.unformat(dataBarang[5]) * jumlahBeli;
				arr.push([
					dataBarang[0],
					dataBarang[1],
					dataBarang[2],
					dataBarang[3],
					dataBarang[4],
					accounting.formatMoney(dataBarang[5], '', 2, ',', '.'),
					jumlahBeli,
					accounting.formatMoney(total_harga, '', 2, ',', '.'),
					'<a href="#" class="btn-hapus-pesanan"><span class="fa fa-times-circle"></span></a>'
				]);
				tableOrder.rows.add(arr).draw(false);
				$("#btn-cancel-order").prop("disabled", false);
				$("#btn-submit-order").prop("disabled", false);
			}
		});

		$('#tbl-daftar-pesanan tbody').on('click', '.btn-hapus-pesanan', function () {
			// console.log(tableStokBarang.row($(this).parents('tr')).data());
			Swal.fire({
				title: 'Konfirmasi',
				text: "Anda yakin menghapus pesanan ini ? ",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya',
				cancelButtonText: 'Tidak',
				allowOutsideClick: false

			}).then((result) => {
				if (result.isConfirmed) {
					tableOrder.row($(this).parents('tr')).remove().draw(false);
					$("#btn-cancel-order").prop("disabled", true);
					$("#btn-submit-order").prop("disabled", true);
				}
			})
		});

		$('#tbl-history-trans tbody').on('click', '.btn-detail', function () {
			let data = tableHistoryTrans.row($(this).parents('tr')).data();
			console.log(data);
			file.getHistoryDetail(data[1]);
		});

		$("#btn-submit-order").click(function () {
			Swal.fire({
				title: 'Konfirmasi',
				text: "Anda yakin order sudah sesuai ? ",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya',
				cancelButtonText: 'Tidak',
				allowOutsideClick: false

			}).then((result) => {
				if (result.isConfirmed) {
					let dataOrder = tableOrder.rows().data();
					let jumlah_bayar = 0;
					$.each(dataOrder, function () {
						jumlah_bayar += parseInt(accounting.unformat(this[7]));
					})
					Swal.fire({
						title: 'Total Yang Harus Di Bayar',
						text: 'Rp. ' + accounting.formatMoney(jumlah_bayar, '', 2, ',', '.'),
						input: 'text',
						inputPlaceholder: 'Uang Pembayaran',
						allowOutsideClick: false
					}).then((result) => {
						if (result.value) {
							file.insertOrder(result.value);
						}
					});
				}
			})
		})

		$("#btn-history").click(function(){
			Swal.fire({
				title: 'Pilih Tanggal',
				html: '<input type="date" class ="form-control" id="tanggal-history">',
				// showConfirmButton: false,
				customClass: 'swal2-overflow',
				allowOutsideClick: false,
			  }).then(function(result) {
				if (result.value) {
					let order_date = $("#tanggal-history").val();
					console.log(result.value);
					file.getHistory(order_date);
				}
			  });
		})

		$("#btn-cancel-order").click(function () {
			Swal.fire({
				title: 'Konfirmasi',
				text: "Anda yakin ingin cancel order ini ? ",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Iya',
				cancelButtonText: 'Tidak',
				allowOutsideClick: false

			}).then((result) => {
				if (result.isConfirmed) {
					location.reload();
				}
			})
		})
	},
	getAllProduk: function () {
		let unit = [];
		$.ajax({
			url: app.base_url + "Controller_produk/" + "getAllProduk",
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

					tablePilihProduk.clear();
					tablePilihProduk.rows.add(unit).draw(false);
					console.log(tablePilihProduk.data().rows().length);
				} catch (e) {
					console.log(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},
	insertOrder: function (uang_bayar) {
		let total_price = 0;
		let dataOrder = tableOrder.rows().data();
		let orderDataHeader = [];
		let orderDataDetail = [];
		let alert = "";
		let file = app.Transaksi;
		if (dataOrder.length == 0) {
			alert += "Anda belum memesan apapun !</br>";
		}

		if (alert.length != 0) {
			Swal.fire(
				'Peringatan',
				alert,
				'warning'
			)
		} else {
			for (var i = 0; i < dataOrder.length; i++) {
				total_price += accounting.unformat(dataOrder[i][7]);
				orderDataDetail.push({
					"order_no": $("#inp-no-pesanan").val(),
					"kode_produk": dataOrder[i][0],
					"jumlah_beli": dataOrder[i][6],
					"total_price": accounting.unformat(dataOrder[i][7])
				})
			}

			orderDataHeader.push({
				"order_no": $("#inp-no-pesanan").val(),
				"total_price": total_price,
				"uang_bayar": uang_bayar
			})
			console.log("orderDataHeader : ", orderDataHeader);
			console.log("orderDataDetail : ", orderDataDetail);


			if (uang_bayar < total_price) {
				Swal.fire(
					'Peringatan',
					"Uang Pembayaran < Total yang harus di bayarkan !",
					'warning'
				)
			} else {
				$.ajax({
					url: app.base_url + this.controller + "insertOrder",
					data: {
						orderDataHeader: orderDataHeader,
						orderDataDetail: orderDataDetail
					},
					type: "POST",
					success: function (response) {
						try {
							console.log(response);
							if (response) {
								Swal.fire(
									'Berhasil',
									"Order berhasil di simpan, Terdapat Kembalian dengan total : Rp. " + accounting.formatMoney(uang_bayar - total_price, '', 2, ',', '.'),
									'success'
								).then((result) => {
									if (result.isConfirmed) {
										tableOrder.clear().draw('false');
										file.getNoOrder();
										orderDataDetail = [];
										for (var i = 0; i < dataOrder.length; i++) {
											total_price += accounting.unformat(dataOrder[i][4]);
											orderDataDetail.push({
												"order_no": $("#inp-no-pesanan").val(),
												"kode_produk": dataOrder[i][0],
												"nama_produk": dataOrder[i][1],
												"warna": dataOrder[i][3],
												"ukuran": dataOrder[i][4],
												"harga_satuan": dataOrder[i][5],
												"jumlah_beli": dataOrder[i][6],
												"total_price": accounting.unformat(dataOrder[i][7])
											})
										}
										console.log(orderDataDetail);
										file.cetakInvoice(orderDataHeader, orderDataDetail);
										$("#btn-cancel-order").prop("disabled", true);
										$("#btn-submit-order").prop("disabled", true);
									}
								});

							}
						} catch (e) {
							console.log(e.message);
						}
					},
					error: function (response) {
						console.log(response);
					}
				})
			}


		}

	},
	getNoOrder: function () {
		$.ajax({
			url: app.base_url + this.controller + "getNoOrder",

			success: function (response) {
				try {
					// console.log(response);
					$("#inp-no-pesanan").val(response);
				} catch (e) {
					toastr.error(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},
	cetakInvoice: function (orderDataHeader, orderDataDetail) {
		$.ajax({
			url: app.base_url + this.controller + "cetakInvoice",
			async: false,
			type: "POST",
			data: {
				orderDataHeader: orderDataHeader,
				orderDataDetail: orderDataDetail
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
	},
	getHistory: function (order_date) {
		$.ajax({
			url: app.base_url + this.controller + "getHistory",
			type: "POST",
			data : {
				order_date : order_date
			},
			success: function (response) {
				try {
					console.log(response);
					let index = 1;
					// $("#inp-no-pesanan").val(response);
					let data = [];
					$.each(response, function () {
						data.push([
							index,
							this['order_no'],
							this['order_date'],
							accounting.formatMoney(this['total_price'], '', 2, ',', '.'),
							this['insert_by'],
							'<a href="#" class="btn-detail"><span class="fa fa-eye"></span></a>'
						]);
						index++;
					})

					tableHistoryTrans.clear();
					tableHistoryTrans.rows.add(data).draw(false);
					$("#modal-view-transaksi").modal({ backdrop: 'static', keyboard: false }).show();
				} catch (e) {
					toastr.error(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},
	getHistoryDetail: function (order_no) {
		$.ajax({
			url: app.base_url + this.controller + "getHistoryDetail",
			type: "POST",
			data : {
				order_no : order_no
			},
			success: function (response) {
				try {
					console.log(response);
					let index = 1;
					let data = [];
					$.each(response, function () {
						data.push([
							index,
							this['order_no'],
							this['kode_produk'],
							this['nama_produk'],
							this['jumlah_beli'],
							accounting.formatMoney(this['total_price'], '', 2, ',', '.'),
							'<a href="#" class="btn-detail"><span class="fa fa-eye"></span></a>'
						]);
						index++;
					})

					tableHistoryDetail.clear();
					tableHistoryDetail.rows.add(data).draw(false);
					$("#modal-history-detail").modal({ backdrop: 'static', keyboard: false }).show();
				} catch (e) {
					toastr.error(e.message);
				}
			},
			error: function (response) {
				console.log(response);
			}
		})
	},
	

}

$(document).ready(function () {
	app.Transaksi.init();
})
