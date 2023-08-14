app.User = {
	controller: "Controller_user/",
	init: function () {
		var file = this;
		var flag_insert_update = 0;
		file.getUser();
		tableUser = $('#tbl-user').DataTable({
			responsive: true
		});

		$("#btn-simpan-user").click(function () {
			file.insertUser(flag_insert_update);
		})

		$("#btn-reset-user").click(function () {
			$(".div-user").val("");
			$("#inp-username").prop("disabled",false)
		})

		$('#tbl-user tbody').on('click', '.btn-edit-user', function () {
			flag_insert_update = 1;
			let data = tableUser.row($(this).parents('tr')).data();
			let session = $("#session-username").val();

			$("#inp-username").val(data[0]).prop("disabled",true);
			$("#inp-password").val(data[1]);
			$("#inp-nama-lengkap").val(data[2]);
			$("#slc-role").val(data[3]);

		});

		$('#tbl-user tbody').on('click', '.btn-hapus-user', function () {
			let data = tableUser.row($(this).parents('tr')).data();
			let sessionRole = $("#inp-role").val();
			let sessionUsername = $("#session-username").val();
			if (sessionRole != "1") {
				Swal.fire(
					'Peringatan',
					'Hanya Role Admin yang dapat menghapus user !',
					'warning'
				)
			} else {
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
						file.hapusUser(data[0]);
					}
				})
			}
		});


	},

	hapusUser: function (username) {
		$.ajax({
			url: app.base_url + this.controller + "hapusUser",
			type: "POST",
			data: {
				username: username,
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
	},

	insertUser: function (flag_insert_update) {
		let file = app.User;
		let username = $("#inp-username").val();
		let password = $("#inp-password").val();
		let nama_lengkap = $("#inp-nama-lengkap").val();
		let role = $("#slc-role").val();
		let link = "";
		alert = "";
		if (flag_insert_update == 0) {
			link = "insertUser";
		} else if (flag_insert_update == 1) {
			link = "updateUser";
		}
		if (username.length == 0) {
			alert += "Username tidak boleh kosong !<br/>";
		}

		if (password.length == 0) {
			alert += "Password tidak boleh kosong !<br/>";
		}

		if (nama_lengkap.length == 0) {
			alert += "Nama Lengkap tidak boleh kosong !<br/>";
		}

		if (role.length == 0) {
			alert += "Role belum di pilih !<br/>";
		}

		if (alert.length != 0) {
			Swal.fire(
				'Peringatan',
				alert,
				'warning'
			)
		} else {
			$.ajax({
				url: app.base_url + this.controller + link,
				data: {
					username: username,
					password: password,
					nama_lengkap: nama_lengkap,
					role: role
				},
				type: "POST",
				success: function (response) {
					try {
						console.log(response);
						if (response) {
							Swal.fire(
								'Berhasil',
								"Data User berhasil di simpan",
								'success'
							)
							file.getUser();
							$(".div-user").val("");
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
	},
	getUser: function () {
		$.ajax({
			url: app.base_url + this.controller + "getAllUser",
			success: function (response) {
				try {
					console.log(response);
					let role = "";
					let user = [];
					$.each(response, function () {
						if (this['role'] == 1) {
							role = "Admin";
						} else if (this['role'] == 2) {
							role = "Kasir";
						} else if (this['role'] == 3) {
							role = "Keuangan";
						}
						user.push([
							this['username'],
							this['password'],
							this['nama_lengkap'],
							this['role'],
							role,
							'<a href="#" class="btn-edit-user"><span class="fa fa-pen"></span></a> <a href="#" class="btn-hapus-user"> <span class="fa fa-trash-alt delete"></span></a>'
						]);
					})

					tableUser.clear();
					tableUser.rows.add(user).draw(false);
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
	app.User.init();
})
