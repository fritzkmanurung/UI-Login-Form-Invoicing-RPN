<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Tambah Invoice
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb bg-transparent mb-0 px-0 py-1" style="border: none;">
            <li class="breadcrumb-item"><i class="ti-home"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url('list-invoice') ?>">Daftar Invoice</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Invoice</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12 stretch-card">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-4 p-md-5">
                <form action="" method="post" id="invoiceForm">
                    <div class="row" id="dynamicFormContent">
                        <div class="form-group col-12 col-md-6 mb-4" id="jenisDokumenContainer">
                            <label for="jenisDokumen" class="font-weight-600 text-dark">Jenis Dokumen<span class="text-danger">*</span></label>
                            <select class="form-control border-primary-light shadow-sm" id="jenisDokumen" name="jenisDokumen" required>
                                <option value="">-- Pilih Jenis Dokumen --</option>
                                <option value="proforma">Proforma Invoice</option>
                                <option value="invoice">Invoice</option>
                            </select>
                        </div>
                    </div>
                    
                    <div id="itemDetailSection"></div>
                    
                    <hr class="mt-4 mb-4 border-light">
                    
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light btn-rounded mr-2 px-4 shadow-sm" onclick="window.history.back()">Batal</button>
                        <button type="submit" class="btn btn-primary btn-rounded px-4 shadow-sm" id="submitProforma" style="display: none;"><i class="ti-save mr-2"></i> Simpan</button>
                        <button type="submit" class="btn btn-primary btn-rounded px-4 shadow-sm" id="submitInvoice" style="display: none;"><i class="ti-save mr-2"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('js/invoice-form.js'); ?>"></script>
<?= $this->endSection() ?>

