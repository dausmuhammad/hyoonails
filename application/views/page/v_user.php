<div class="content-wrapper">
    <div class="row content">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah User</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Username :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control form-control-border border-width-1 form-control-sm div-user" maxlength="10" id="inp-username" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Password :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control form-control-border border-width-1 form-control-sm div-user" id="inp-password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Nama Lengkap :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control form-control-border border-width-1 form-control-sm div-user" id="inp-nama-lengkap" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Role :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="form-control form-control-border border-width-1 form-control-sm div-user" id="slc-role">
                                            <option value="">--Silahkan Pilih--</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Kasir</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-lg-right col-lg-3">
                                <button class="btn btn-block btn-danger btn-flat btn-sm " id="btn-reset-user"><span class="fa fa-trash"></span> Reset</button>
                            </div>
                            <div class="form-group float-lg-right col-lg-3">
                                <button class="btn btn-block btn-info btn-flat btn-sm " id="btn-simpan-user"><span class="fa fa-plus-circle"></span> Simpan</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="row content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>List User</h5>
                </div>
                <div class="card-body">
                    <div class="row margin">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table" id="tbl-user" width="100%">
                                        <thead>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Role</th>
                                            <!-- <th>Action</th> -->
                                        </thead>
                                        <!-- <tfoot>
                                            <th>Total Bayar</th>
                                        </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>