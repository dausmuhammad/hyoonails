app.User = {
	controller: "Controller_user/",
	init: function () {
        var file = this;
		file.getUser();
		tableUser = $('#tbl-user').DataTable({
			responsive: true
		});

		$("#btn-simpan-user").click(function(){
			file.insertUser();
		})

		$("#btn-reset-user").click(function(){
			$(".div-user").val("");
		})

		
	},

	insertUser: function(){
		let file = app.User;
		let username = $("#inp-username").val();
		let password =  $("#inp-password").val();
		let nama_lengkap = $("#inp-nama-lengkap").val();
		let role = $("#slc-role").val();
		alert = "";

		if(username.length == 0){
			alert+="Username tidak boleh kosong !<br/>";
		}

		if(password.length == 0){
			alert+="Password tidak boleh kosong !<br/>";
		}

		if(nama_lengkap.length == 0){
			alert+="Nama Lengkap tidak boleh kosong !<br/>";
		}

		if(role.length == 0){
			alert+="Role belum di pilih !<br/>";
		}

		if(alert.length !=0){
			Swal.fire(
				'Peringatan',
				alert,
				'warning'
			)
		}else{
			$.ajax({
				url: app.base_url + this.controller + "insertUser",
				data: {
					username: username,
					password: password,
					nama_lengkap : nama_lengkap,
					role : role
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
						if(this['role'] == 1){
							role = "Admin";
						}else if(this['role'] == 2){
							role = "Kasir";
						}
						user.push([
							this['username'],
							this['nama_lengkap'],
							role
							// '<a href="#" class="btn-edit-user"><span class="fa fa-pen"></span></a> <a href="#" class="btn-hapus-user"><span class="fa fa-trash-alt delete"></span></a>'
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
