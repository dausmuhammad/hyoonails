<div class="content-wrapper">
    <div class="row content">
        <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Laporan Keuangan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Uang Masuk :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control form-control-border border-width-1 form-control-sm" id="inp-uang-masuk" placeholder="Uang Masuk">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Tanggal Uang Masuk :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control form-control-border border-width-1 form-control-sm div-produk" id="inp-tanggal-masuk">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Uang Keluar :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control form-control-border border-width-1 form-control-sm" id="inp-uang-keluar" placeholder="Uang Keluar">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Tanggal Uang Keluar :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control form-control-border border-width-1 form-control-sm div-produk" id="inp-tanggal-keluar" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Keterangan Pengeluaran :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <textarea  class="form-control form-control-border border-width-1 form-control-sm div-produk" name="" id="txt-keterangan" cols="30" rows="5"></textarea>
                                        <!-- <input type="date" class="form-control form-control-border border-width-1 form-control-sm div-produk" id="inp-tanggal-keluar" > -->
                                    </div>
                                </div>
                            </div>

                            <div class="form-group float-lg-right col-lg-3">
                                <button class="btn btn-block btn-danger btn-flat btn-sm " id="btn-reset-lap-keuangan"><span class="fa fa-trash"></span> Reset</button>
                            </div>
                            <div class="form-group float-lg-right col-lg-3">
                                <button class="btn btn-block btn-info btn-flat btn-sm " id="btn-simpan-lap-keuangan"><span class="fa fa-plus-circle"></span> Simpan</button>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>List Laporan Keuangan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="tbl-lap-keuangan" width="100%">
                                <thead>
                                    <th>Uang Masuk</th>
                                    <th>Tanggal Uang Masuk</th>
                                    <th>Uang Keluar</th>
                                    <th>Tanggal Uang Keluar</th>
                                    <th>Keterangan</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>