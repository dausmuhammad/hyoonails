<div class="content-wrapper">
    <div class="row content">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Produk</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Kode Produk :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control form-control-border border-width-1 form-control-sm" id="inp-kode-barang" placeholder="Kode Barang" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Nama Produk :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control form-control-border border-width-1 form-control-sm div-produk" id="inp-nama-barang" placeholder="Nama Produk">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Warna :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select class="form-control form-control-border border-width-1 form-control-sm div-produk" id="slc-warna">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Ukuran :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-border border-width-1 form-control-sm div-produk inp-digit" id="inp-ukuran" placeholder="Ukuran">
                                            <!-- <span class="input-group-text border-width-1"><span class="fa fa-tag">ml</span></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Harga Satuan :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-border border-width-1 form-control-sm div-produk inp-digit" id="inp-harga-satuan" placeholder="Harga Satuan">
                                            <span class="input-group-text border-width-1"><span class="fa fa-tag"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Quantity :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control form-control-border border-width-1 form-control-sm div-produk" id="inp-qty-produk" placeholder="Quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-lg-right col-lg-3">
                                <button class="btn btn-block btn-danger btn-flat btn-sm " id="btn-reset-produk"><span class="fa fa-trash"></span> Reset</button>
                            </div>
                            <div class="form-group float-lg-right col-lg-3">
                                <button class="btn btn-block btn-info btn-flat btn-sm " id="btn-simpan-produk"><span class="fa fa-plus-circle"></span> Simpan</button>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>List Produk</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="tbl-produk" width="100%">
                                <thead>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kode Warna</th>
                                    <th>Warna</th>
                                    <th>Ukuran</th>
                                    <th>Harga Satuan</th>
                                    <th>Quantity</th>
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