<div class="content-wrapper">
    <div class="row content">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Order</h3>
                </div>
                <div class="card-body">
                    <div class="row margin">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>No Pesanan :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="inpNoOrder"
                                            class="form-control form-control-border border-width-1 form-control-sm"
                                            id="inp-no-pesanan" placeholder="No Pesanan" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Nama Pemesan :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="inpNamaCustomer" class="form-control form-control-border border-width-1 form-control-sm" id="inp-nama-pemesan" placeholder="Nama Pemesan">
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Tanggal Order :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="inpTanggalOrder"
                                                class="form-control form-control-border border-width-1 form-control-sm"
                                                id="inp-tanggal-order" placeholder="Tanggal Order" readonly>
                                            <span class="input-group-text border-width-1"><span
                                                    class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pilih Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row margin">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Nama Produk :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control form-control-border border-width-1 form-control-sm"
                                                id="inp-nama-produk" placeholder="Nama Produk" readonly>
                                            <span class="input-group-text border-width-1"><span
                                                    class="fa fa-search"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
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
                    <h1 class="card-title">List Order</b></h1>
                </div>
                <div class="card-body">
                    <div class="row margin">
                        <div class="col-lg-12">
                        <div class="form-group float-lg-left col-lg-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-block btn-primary btn-flat btn-sm"
                                            id="btn-history"><span class="fa fa-list"></span> History Transaksi</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group float-lg-right col-lg-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-block btn-success btn-flat btn-sm"
                                            id="btn-submit-order"><span class="fa fa-arrow-circle-right"></span> Submit
                                            Order</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <button class="btn btn-block btn-danger btn-flat btn-sm"
                                            id="btn-cancel-order"><span class="fa fa-times-circle"></span> Cancel
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table" id="tbl-daftar-pesanan" width="100%">
                                        <thead>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Kode Warna</th>
                                            <th>Nama Warna</th>
                                            <th>Ukuran</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
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

    <div class="modal  fade" id="modal-view-transaksi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">History Transaksi</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="tbl-history-trans" width="100%">
                                <thead>
                                    <th>No</th>
                                    <th>No Order</th>
                                    <th>Tanggal Order</th>
                                    <th>Total Belanja</th>
                                    <th>Nama Kasir</th>
                                    <th>Action</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-block btn-danger btn-flat btn-sm" data-dismiss="modal"><span
                                class="fa fa-times-circle"></span> Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal  fade" id="modal-history-detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Detail  Transaksi</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="tbl-detail-history" width="100%">
                                <thead>
                                    <th>No Order</th>
                                    <th>Kode Produk</th>
                                    <th>Tanggal Order</th>
                                    <th>Total Belanja</th>
                                    <th>Jumlah Beli</th>
                                    <th>Total Harga</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-block btn-danger btn-flat btn-sm" id="btn-keluar-detail" data-dismiss="modal"><span
                                class="fa fa-times-circle"></span> Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal  fade" id="modal-barang">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Nama Produk</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Jumlah Beli :</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="number"
                                            class="form-control form-control-border border-width-1 form-control-sm tambah-stok-barang"
                                            id="inp-jumlah-beli" placeholder="Jumlah Beli">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table" id="tbl-pilih-produk" width="100%">
                                <thead>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kode Warna</th>
                                    <th>Nama Warna</th>
                                    <th>Ukuran</th>
                                    <th>Harga Satuan</th>
                                    <th>Quantity</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button class="btn btn-block btn-info btn-flat btn-sm " data-dismiss="modal"
                            id="btn-tambah-tabel-order"><span class="fa fa-plus-circle"></span> Tambah</button>
                        <button class="btn btn-block btn-danger btn-flat btn-sm" data-dismiss="modal"><span
                                class="fa fa-times-circle"></span> Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>