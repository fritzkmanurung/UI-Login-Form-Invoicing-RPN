<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
Tambah Invoice
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h6 class="text-muted mb-3"><i class="ti-file"></i> List Invoice </h6>

<div class="stretch-card">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Invoice</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" id="invoiceForm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jenisDokumen">Jenis Dokumen<span style="color: red;">*</span></label>
                        <select class="form-control w-100" id="jenisDokumen" name="jenisDokumen" required>
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="proforma">Proforma Invoice</option>
                            <option value="invoice">Invoice</option>
                        </select>
                    </div>
                    <div id="additionalInput" class="form-group col-md-6"></div>
                </div>
                <div id="formContent"></div>
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary float-right" id="submitProforma" style="display: none;"><i class="ti-save"></i> Submit Proforma Invoice</button>
                    <button type="submit" class="btn btn-primary float-right" id="submitInvoice" style="display: none;"><i class="ti-save"></i> Submit Invoice</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <label for="date">Date<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" id="date" name="date" required>
                `;

                rows = `
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenisCustomer">Jenis Customer<span style="color: red;">*</span></label>
                            <select class="form-control" id="jenisCustomer" name="jenisCustomer" required>
                                <option value="">Pilih Jenis Customer</option>
                                <option value="PTP Nusantara">PTP Nusantara</option>
                                <option value="Retail">Retail</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="customer">Customer (Name/institution)<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="customer" name="customer" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="profilCenterArea">Profil Center Area<span style="color: red;">*</span></label>
                            <select class="form-control" id="profilCenterArea" name="profilCenterArea" required>
                                <option value="">Pilih Profil Center Area</option>
                                <option value="PPKS0202">PPKS0202</option>
                                <option value="PPKS0206">PPKS0206</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="subBagian">Sub Bagian<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="subBagian" name="subBagian" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="unitKerja">Unit Kerja<span style="color: red;">*</span></label>
                            <select class="form-control" id="unitKerja" name="unitKerja" required>
                                <option value="">Pilih Unit Kerja</option>
                                <option value="SDM TI">SDM TI</option>
                                <option value="SDM Kandir">SDM Kandir</option>
                            </select>
                        </div>
                    </div>
                `;
                document.getElementById('submitProforma').style.display = 'block';
                document.getElementById('submitInvoice').style.display = 'none';
            } else if (jenisDokumen === 'invoice') {
                additionalInput.innerHTML = `
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="noProformaInvoice">No. Proforma Invoice<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="noProformaInvoice" name="noProformaInvoice" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                    </div>
                `;

                rows = `
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenisCustomer">Jenis Customer<span style="color: red;">*</span></label>
                            <select class="form-control" id="jenisCustomer" name="jenisCustomer" required>
                                <option value="">Pilih Jenis Customer</option>
                                <option value="PTP Nusantara">PTP Nusantara</option>
                                <option value="Retail">Retail</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="customer">Customer (Name/institution)<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="customer" name="customer" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="profilCenterArea">Profil Center Area<span style="color: red;">*</span></label>
                            <select class="form-control" id="profilCenterArea" name="profilCenterArea" required>
                                <option value="">Pilih Profil Center Area</option>
                                <option value="PPKS0202">PPKS0202</option>
                                <option value="PPKS0206">PPKS0206</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="subBagian">Sub Bagian<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="subBagian" name="subBagian" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="unitKerja">Unit Kerja<span style="color: red;">*</span></label>
                            <select class="form-control" id="unitKerja" name="unitKerja" required>
                                <option value="">Pilih Unit Kerja</option>
                                <option value="SDM TI">SDM TI</option>
                                <option value="SDM Kandir">SDM Kandir</option>
                            </select>
                        </div>
                    </div>
                `;
                document.getElementById('submitProforma').style.display = 'none';
                document.getElementById('submitInvoice').style.display = 'block';
            }

            const itemCard = `
                <div class="form-group">
                    <label>Item<span style="color: red;">*</span></label>
                    <div class="card item-isi border-primary" style="border-color: #039BE5; background-color: #E1F5FE; border-radius: 0;">
                        <div class="card-body">
                            <table class="table" id="itemTable" style="display: none;">
                                <thead style="background-color: #757575; color: #FFFFFF; font-weight: bold;">
                                    <tr>
                                        <th>Deskripsi</th>
                                        <th>Nominal</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="itemTableBody" style="background-color: #FFFFFF;"></tbody>
                            </table>
                            <div class="form-row mt-5">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control shadow" id="deskripsi" placeholder="Deskripsi">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control shadow" id="nominal" placeholder="Nominal" step="0.01">
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="number" class="form-control shadow" id="quantity" placeholder="Quantity">
                                </div>
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-primary" id="addItemBtn">+</button>
                                </div>
                            </div>
                            <div class="form-group" id="totalContainer" style="display: none;">
                                <label for="total">Total = Rp <span id="total">0,00</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            formContent.innerHTML = rows + itemCard;

            document.getElementById('addItemBtn').addEventListener('click', function() {
                const deskripsi = document.getElementById('deskripsi').value;
                const nominal = parseFloat(document.getElementById('nominal').value);
                const quantity = parseInt(document.getElementById('quantity').value);

                if (deskripsi && nominal && quantity) {
                    const subtotal = nominal * quantity;

                    const newRow = `
                        <tr>
                            <td>${deskripsi}</td>
                            <td>${nominal.toFixed(2)}</td>
                            <td>${quantity}</td>
                            <td>Rp ${subtotal.toFixed(2)}</td>
                            <td><button type="button" class="btn btn-danger btn-sm removeItemBtn"><i class="ti-close"></i></button></td>
                        </tr>
                    `;

                    document.getElementById('itemTableBody').insertAdjacentHTML('beforeend', newRow);

                    const totalElement = document.getElementById('total');
                    totalElement.textContent = (parseFloat(totalElement.textContent.replace(/,/g, '')) + subtotal).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                    document.getElementById('itemTable').style.display = '';
                    document.getElementById('totalContainer').style.display = '';

                    document.getElementById('deskripsi').value = '';
                    document.getElementById('nominal').value = '';
                    document.getElementById('quantity').value = '';

                    document.querySelectorAll('.removeItemBtn').forEach(button => {
                        button.addEventListener('click', function() {
                            const row = this.closest('tr');
                            const subtotal = parseFloat(row.cells[3].textContent.replace(/,/g, ''));
                            totalElement.textContent = (parseFloat(totalElement.textContent.replace(/,/g, '')) - subtotal).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

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
</script>
<?= $this->endSection() ?>
