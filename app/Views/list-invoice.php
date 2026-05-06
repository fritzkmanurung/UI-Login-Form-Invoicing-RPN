<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Daftar Invoice
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb bg-transparent mb-0 px-0 py-1" style="border: none;">
            <li class="breadcrumb-item"><i class="ti-home"></i></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Invoice</li>
        </ol>
    </nav>
</div>

<!-- Action bar -->
<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary btn-rounded btn-icon-text font-weight-bold shadow-sm btn-sm" onclick="window.location.href='<?= base_url('list-invoice/tambah') ?>';">
        <i class="ti-plus btn-icon-prepend"></i> Tambah Invoice
    </button>
</div>

<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered custom-table" style="font-size: 13px;">
                        <thead class="thead-light border-bottom">
                            <tr>
                                <th class="font-weight-bold">No</th>
                                <th class="font-weight-bold">Jenis</th>
                                <th class="font-weight-bold">Pemohon</th>
                                <th class="font-weight-bold">Tanggal Dibuat</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2">1</td>
                                <td class="py-2">Proforma Invoice</td>
                                <td class="py-2">Fritz Kevin Manurung</td>
                                <td class="text-muted py-2">27/04/2024</td>
                                <td class="py-2"><span class="badge badge-warning badge-pill px-2 py-1">Menunggu</span></td>
                                <td class="text-center py-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded shadow-sm" style="font-size: 12px;" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                        <i class="ti-eye"></i> Lihat
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">2</td>
                                <td class="py-2">Proforma Invoice</td>
                                <td class="py-2">Fritz Kevin Manurung</td>
                                <td class="text-muted py-2">27/04/2024</td>
                                <td class="py-2"><span class="badge badge-success badge-pill px-2 py-1">Disetujui</span></td>
                                <td class="text-center py-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded shadow-sm" style="font-size: 12px;" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
                                        <i class="ti-eye"></i> Lihat
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2">3</td>
                                <td class="py-2">Invoice</td>
                                <td class="py-2">Fritz Kevin Manurung</td>
                                <td class="text-muted py-2">27/04/2024</td>
                                <td class="py-2"><span class="badge badge-success badge-pill px-2 py-1">Disetujui</span></td>
                                <td class="text-center py-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded shadow-sm" style="font-size: 12px;" onclick="window.location.href='<?= base_url('/kontrak-view') ?>'">
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
