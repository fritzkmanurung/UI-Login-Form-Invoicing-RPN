<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
List Invoice
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h6 class="text-muted mb-3"><i class="ti-file"></i> List Invoice </h6>

<div class="stretch-card">
    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary float-right" onclick="window.location.href='<?= base_url('list-invoice/tambah') ?>';">
                <i class="ti-plus"></i> Tambah
            </button>
            <div class="table-responsive pt-3">
                <h4 class="table-title">List Invoice</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No Urut </th>
                            <th>Jenis</th>
                            <th>Pemohon</th>
                            <th>Generated Date</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>1</td>
                            <td>Proforma Invoice</td>
                            <td>Fritz Kevin Manurung</td>
                            <td>27/04/2024</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                    <i class="ti-eye"></i> Lihat
                                </button>
                            </td>
                        </tr>
                        <tr class="">
                            <td>2</td>
                            <td>Proforma Invoice</td>
                            <td>Fritz Kevin Manurung</td>
                            <td>27/04/2024</td>
                            <td><span class="badge badge-success">Approved</span></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                    <i class="ti-eye"></i> Lihat
                                </button>
                            </td>
                        </tr>
                        <tr class="">
                            <td>3</td>
                            <td>Invoice</td>
                            <td>Fritz Kevin Manurung</td>
                            <td>27/04/2024</td>
                            <td><span class="badge badge-success">Approved</span></td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                    <i class="ti-eye"></i> Lihat
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
