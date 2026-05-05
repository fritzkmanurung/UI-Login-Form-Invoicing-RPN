<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
List Invoice
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb bg-transparent mb-0 px-0 py-1" style="border: none;">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>"><i class="ti-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="ti-view-list"></i> List Invoice</li>
        </ol>
    </nav>
    <button type="button" class="btn btn-primary btn-rounded btn-icon-text font-weight-bold shadow-sm" onclick="window.location.href='<?= base_url('list-invoice/tambah') ?>';">
        <i class="ti-plus btn-icon-prepend"></i> Tambah Invoice Baru
    </button>
</div>

<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered custom-table">
                        <thead class="thead-light border-bottom">
                            <tr>
                                <th class="font-weight-bold">No Urut</th>
                                <th class="font-weight-bold">Jenis</th>
                                <th class="font-weight-bold">Pemohon</th>
                                <th class="font-weight-bold">Generated Date</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-3">1</td>
                                <td class="py-3">Proforma Invoice</td>
                                <td class="py-3">Fritz Kevin Manurung</td>
                                <td class="text-muted py-3">27/04/2024</td>
                                <td class="py-3"><span class="badge badge-warning badge-pill px-3 py-2">Pending</span></td>
                                <td class="text-center py-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon-text shadow-sm" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                        <i class="ti-eye"></i> Lihat
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3">2</td>
                                <td class="py-3">Proforma Invoice</td>
                                <td class="py-3">Fritz Kevin Manurung</td>
                                <td class="text-muted py-3">27/04/2024</td>
                                <td class="py-3"><span class="badge badge-success badge-pill px-3 py-2">Approved</span></td>
                                <td class="text-center py-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon-text shadow-sm" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                        <i class="ti-eye"></i> Lihat
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3">3</td>
                                <td class="py-3">Invoice</td>
                                <td class="py-3">Fritz Kevin Manurung</td>
                                <td class="text-muted py-3">27/04/2024</td>
                                <td class="py-3"><span class="badge badge-success badge-pill px-3 py-2">Approved</span></td>
                                <td class="text-center py-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-icon-text" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
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
</div>
<?= $this->endSection() ?>
