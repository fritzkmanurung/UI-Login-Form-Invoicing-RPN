<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Tambah Invoice
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb custom-breadcrumb bg-transparent mb-0 px-0 py-1" style="border: none;">
            <li class="breadcrumb-item"><i class="ti-home"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url('list-invoice') ?>"><i class="ti-view-list"></i> Daftar Invoice</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="ti-plus"></i> Tambah Invoice</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12 stretch-card">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-4 p-md-5">
                <form action="" method="post" id="invoiceForm">
                    <div class="row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="jenisDokumen" class="font-weight-600 text-dark">Jenis Dokumen<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg border-primary-light shadow-sm" id="jenisDokumen" name="jenisDokumen" required>
                                <option value="">-- Pilih Jenis Dokumen --</option>
                                <option value="proforma">Proforma Invoice</option>
                                <option value="invoice">Invoice</option>
                            </select>
                        </div>
                        <div id="additionalInput" class="form-group col-md-6 mb-4"></div>
                    </div>
                    
                    <div id="formContent" class="mt-2"></div>
                    
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

<style>
    .font-weight-600 { font-weight: 600; }
    .border-primary-light { border: 1px solid #c9d7ff; }
    .border-primary-light:focus { border-color: #4b49ac; box-shadow: 0 0 0 0.2rem rgba(75, 73, 172, 0.25); }
    .input-shadow-sm { box-shadow: 0 2px 4px rgba(0,0,0,.04); border: 1px solid #e3e3e3;}
    .input-shadow-sm:focus { box-shadow: 0 2px 8px rgba(75, 73, 172,.15); border-color: #4b49ac;}
</style>

<script>
    document.getElementById('jenisDokumen').addEventListener('change', function() {
        const additionalInput = document.getElementById('additionalInput');
        const formContent = document.getElementById('formContent');
        additionalInput.innerHTML = '';
        formContent.innerHTML = '';

        const jenisDokumen = this.value;

        if (jenisDokumen === 'proforma' || jenisDokumen === 'invoice') {
            let rows = '';

            if (jenisDokumen === 'proforma') {
                additionalInput.innerHTML = `
                    <label for="date" class="font-weight-600">Tanggal<span class="text-danger">*</span></label>
                    <input type="date" class="form-control form-control-lg input-shadow-sm" id="date" name="date" required>
                `;

                rows = `
                    <div class="row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="jenisCustomer" class="font-weight-600">Jenis Customer<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg input-shadow-sm" id="jenisCustomer" name="jenisCustomer" required>
                                <option value="">-- Pilih Jenis Customer --</option>
                                <option value="PTP Nusantara">PTP Nusantara</option>
                                <option value="Retail">Retail</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <label for="customer" class="font-weight-600">Nama Customer / Instansi<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg input-shadow-sm" id="customer" name="customer" placeholder="Masukkan nama customer atau instansi" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 mb-4">
                            <label for="profilCenterArea" class="font-weight-600">Profil Center Area<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg input-shadow-sm" id="profilCenterArea" name="profilCenterArea" required>
                                <option value="">-- Pilih Profil Area --</option>
                                <option value="PPKS0202">PPKS0202</option>
                                <option value="PPKS0206">PPKS0206</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label for="subBagian" class="font-weight-600">Sub Bagian<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg input-shadow-sm" id="subBagian" name="subBagian" placeholder="Sub Bagian" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label for="unitKerja" class="font-weight-600">Unit Kerja<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg input-shadow-sm" id="unitKerja" name="unitKerja" required>
                                <option value="">-- Pilih Unit Kerja --</option>
                                <option value="SDM TI">SDM TI</option>
                                <option value="SDM Kandir">SDM Kandir</option>
                            </select>
                        </div>
                    </div>
                `;
                document.getElementById('submitProforma').style.display = 'inline-block';
                document.getElementById('submitInvoice').style.display = 'none';
            } else if (jenisDokumen === 'invoice') {
                additionalInput.innerHTML = `
                    <div class="row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="noProformaInvoice" class="font-weight-600">No. Proforma Invoice<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg input-shadow-sm" id="noProformaInvoice" name="noProformaInvoice" placeholder="Nomor Proforma" required>
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <label for="date" class="font-weight-600">Tanggal<span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg input-shadow-sm" id="date" name="date" required>
                        </div>
                    </div>
                `;

                rows = `
                    <div class="row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="jenisCustomer" class="font-weight-600">Jenis Customer<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg input-shadow-sm" id="jenisCustomer" name="jenisCustomer" required>
                                <option value="">-- Pilih Jenis Customer --</option>
                                <option value="PTP Nusantara">PTP Nusantara</option>
                                <option value="Retail">Retail</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-4">
                            <label for="customer" class="font-weight-600">Nama Customer / Instansi<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg input-shadow-sm" id="customer" name="customer" placeholder="Masukkan nama customer atau instansi" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 mb-4">
                            <label for="profilCenterArea" class="font-weight-600">Profil Center Area<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg input-shadow-sm" id="profilCenterArea" name="profilCenterArea" required>
                                <option value="">-- Pilih Profil Area --</option>
                                <option value="PPKS0202">PPKS0202</option>
                                <option value="PPKS0206">PPKS0206</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label for="subBagian" class="font-weight-600">Sub Bagian<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg input-shadow-sm" id="subBagian" name="subBagian" placeholder="Sub Bagian" required>
                        </div>
                        <div class="form-group col-md-4 mb-4">
                            <label for="unitKerja" class="font-weight-600">Unit Kerja<span class="text-danger">*</span></label>
                            <select class="form-control form-control-lg input-shadow-sm" id="unitKerja" name="unitKerja" required>
                                <option value="">-- Pilih Unit Kerja --</option>
                                <option value="SDM TI">SDM TI</option>
                                <option value="SDM Kandir">SDM Kandir</option>
                            </select>
                        </div>
                    </div>
                `;
                document.getElementById('submitProforma').style.display = 'none';
                document.getElementById('submitInvoice').style.display = 'inline-block';
            }

            const itemCard = `
                <div class="form-group mt-2">
                    <label class="font-weight-bold h5">Detail Item<span class="text-danger">*</span></label>
                    <div class="card bg-light border-0 shadow-sm mt-2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table table-hover" id="itemTable" style="display: none;">
                                    <thead class="bg-primary text-white text-center rounded">
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th>Nominal (Rp)</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal (Rp)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemTableBody" class="bg-white text-center"></tbody>
                                </table>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="row align-items-end">
                                <div class="form-group col-md-4 mb-3">
                                    <label class="text-muted small mb-1">Deskripsi Item</label>
                                    <input type="text" class="form-control shadow-sm" id="deskripsi" placeholder="Masukkan deskripsi...">
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label class="text-muted small mb-1">Nominal / Harga</label>
                                    <div class="input-group shadow-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white border-right-0">Rp</span>
                                        </div>
                                        <input type="text" class="form-control border-left-0" id="nominal" placeholder="0" oninput="formatRupiah(this)">
                                    </div>
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <label class="text-muted small mb-1">Jumlah</label>
                                    <input type="number" class="form-control shadow-sm" id="quantity" placeholder="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                                <div class="form-group col-md-2 mb-3 text-right">
                                    <button type="button" class="btn btn-primary btn-block btn-rounded shadow-sm" id="addItemBtn">
                                        <i class="ti-plus font-weight-bold"></i> Tambah 
                                    </button>
                                </div>
                            </div>
                            <div class="bg-primary text-white p-3 rounded mt-3 text-right shadow-sm" id="totalContainer" style="display: none;">
                                <h5 class="mb-0">Total Keseluruhan = <strong>Rp <span id="total">0,00</span></strong></h5>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            formContent.innerHTML = rows + itemCard;

            document.getElementById('addItemBtn').addEventListener('click', function() {
                const deskripsi = document.getElementById('deskripsi').value;
                const nominalRaw = document.getElementById('nominal').value.replace(/\./g, '');
                const nominal = parseFloat(nominalRaw);
                const quantity = parseInt(document.getElementById('quantity').value);

                if (deskripsi && nominal && quantity) {
                    const subtotal = nominal * quantity;

                    const newRow = `
                        <tr>
                            <td class="text-left">${deskripsi}</td>
                            <td>${nominal.toLocaleString('id-ID', { minimumFractionDigits: 0 })}</td>
                            <td>${quantity}</td>
                            <td><strong>${subtotal.toLocaleString('id-ID', { minimumFractionDigits: 0 })}</strong></td>
                            <td><button type="button" class="btn btn-danger btn-sm rounded-circle px-2 py-1 removeItemBtn shadow-sm" title="Hapus"><i class="ti-close"></i></button></td>
                        </tr>
                    `;

                    document.getElementById('itemTableBody').insertAdjacentHTML('beforeend', newRow);

                    const totalElement = document.getElementById('total');
                    const currentTotal = parseFloat(totalElement.textContent.replace(/\./g, '')) || 0;
                    const newTotal = currentTotal + subtotal;
                    totalElement.textContent = newTotal.toLocaleString('id-ID', { minimumFractionDigits: 0 });

                    document.getElementById('itemTable').style.display = '';
                    document.getElementById('totalContainer').style.display = 'block';

                    document.getElementById('deskripsi').value = '';
                    document.getElementById('nominal').value = '';
                    document.getElementById('quantity').value = '';

                    document.querySelectorAll('.removeItemBtn').forEach(button => {
                        button.addEventListener('click', function() {
                            const row = this.closest('tr');
                            const rowSubtotalText = row.cells[3].textContent;
                            
                            const rowSubtotal = parseFloat(rowSubtotalText.replace(/\./g, '')) || 0;
                            
                            const currentTotalForRemove = parseFloat(totalElement.textContent.replace(/\./g, '')) || 0;
                            const newTotalAfterRemove =  Math.max(0, currentTotalForRemove - rowSubtotal);
                            totalElement.textContent = newTotalAfterRemove.toLocaleString('id-ID', { minimumFractionDigits: 0 });

                            row.remove();

                            if (document.getElementById('itemTableBody').children.length === 0) {
                                document.getElementById('itemTable').style.display = 'none';
                                document.getElementById('totalContainer').style.display = 'none';
                            }
                        });
                    });
                }
            });
        } else {
            // Reset form if 'Pilih Jenis Dokumen' is selected
            formContent.innerHTML = '';
            document.getElementById('submitProforma').style.display = 'none';
            document.getElementById('submitInvoice').style.display = 'none';
        }
    });
    function formatRupiah(input) {
        let value = input.value.replace(/[^0-9]/g, '');
        if (value === "") {
            input.value = "";
            return;
        }
        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
</script>
<?= $this->endSection() ?>
