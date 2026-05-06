/**
 * Invoice Form — Dynamic Fields & Item Management
 * File: public/js/invoice-form.js
 */

document.addEventListener('DOMContentLoaded', function () {

  // ──────────────────────────────────────────────
  // Shared field templates (eliminates duplication)
  // ──────────────────────────────────────────────

  function buildCommonFields() {
    return `
      <div class="form-group col-6 col-md-6 mb-4">
        <label for="jenisCustomer" class="font-weight-600">Jenis Customer<span class="text-danger">*</span></label>
        <select class="form-control input-shadow-sm" id="jenisCustomer" name="jenisCustomer" required>
          <option value="">-- Pilih --</option>
          <option value="PTP Nusantara">PTP Nusantara</option>
          <option value="Retail">Retail</option>
          <option value="Swasta">Swasta</option>
        </select>
      </div>
      <div class="form-group col-12 col-md-6 mb-4">
        <label for="customer" class="font-weight-600">Nama Customer / Instansi<span class="text-danger">*</span></label>
        <input type="text" class="form-control input-shadow-sm" id="customer" name="customer" placeholder="Nama Customer" required>
      </div>
      <div class="form-group col-12 col-md-4 mb-4">
        <label for="profilCenterArea" class="font-weight-600">Profil Center Area<span class="text-danger">*</span></label>
        <select class="form-control input-shadow-sm" id="profilCenterArea" name="profilCenterArea" required>
          <option value="">-- Pilih --</option>
          <option value="PPKS0202">PPKS0202</option>
          <option value="PPKS0206">PPKS0206</option>
        </select>
      </div>
      <div class="form-group col-6 col-md-4 mb-4">
        <label for="subBagian" class="font-weight-600">Sub Bagian<span class="text-danger">*</span></label>
        <input type="text" class="form-control input-shadow-sm" id="subBagian" name="subBagian" placeholder="Sub Bagian" required>
      </div>
      <div class="form-group col-6 col-md-4 mb-4">
        <label for="unitKerja" class="font-weight-600">Unit Kerja<span class="text-danger">*</span></label>
        <select class="form-control input-shadow-sm" id="unitKerja" name="unitKerja" required>
          <option value="">-- Pilih --</option>
          <option value="SDM TI">SDM TI</option>
          <option value="SDM Kandir">SDM Kandir</option>
        </select>
      </div>
    `;
  }

  function buildItemDetailSection() {
    return `
      <div class="form-group mt-3">
        <label class="font-weight-600" style="font-size: 15px;">Detail Item<span class="text-danger">*</span></label>
        <hr class="mt-2 mb-3">

        <div class="row align-items-end">
          <div class="form-group col-12 col-md-5 mb-3 detail-col-deskripsi">
            <label class="text-muted small mb-1">Deskripsi Item</label>
            <input type="text" class="form-control input-shadow-sm" id="deskripsi" placeholder="Masukkan deskripsi...">
          </div>
          <div class="form-group col-6 col-md-3 mb-3 detail-col-nominal">
            <label class="text-muted small mb-1">Nominal / Harga</label>
            <div class="input-group shadow-sm">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0" style="padding: 0 5px; font-size: 12px;">Rp</span>
              </div>
              <input type="text" class="form-control border-left-0" id="nominal" placeholder="0" oninput="formatRupiah(this)" style="font-size: 13px;">
            </div>
          </div>
          <div class="form-group col-6 col-md-2 mb-3 detail-col-jumlah">
            <label class="text-muted small mb-1">Jumlah</label>
            <input type="number" class="form-control input-shadow-sm" id="quantity" value="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" style="font-size: 13px;">
          </div>
          <div class="form-group col-12 col-md-2 mb-3 detail-col-tombol">
            <button type="button" class="btn btn-primary btn-block btn-rounded shadow-sm p-2" id="addItemBtn">
              <i class="ti-plus"></i> Tambah
            </button>
          </div>
        </div>

        <div class="table-responsive mt-3">
          <table class="table table-bordered custom-table table-hover" id="itemTable" style="display: none; font-size: 13px;">
            <thead class="bg-primary text-white text-center">
              <tr>
                <th>Deskripsi</th>
                <th>Nominal</th>
                <th>Jml</th>
                <th>Subtotal</th>
                <th style="width: 40px;">X</th>
              </tr>
            </thead>
            <tbody id="itemTableBody" class="bg-white text-center"></tbody>
          </table>
        </div>
        <div class="bg-primary text-white p-3 rounded mt-3 text-right shadow-sm" id="totalContainer" style="display: none;">
          <span class="mb-0" style="font-size: 14px;">Total: <strong>Rp <span id="total">0</span></strong></span>
        </div>
      </div>
    `;
  }

  // ──────────────────────────────────────────────
  // Document Type Change Handler
  // ──────────────────────────────────────────────

  document.getElementById('jenisDokumen').addEventListener('change', function () {
    const dynamicContent = document.getElementById('dynamicFormContent');
    const itemDetailSection = document.getElementById('itemDetailSection');
    const jenisDokumen = this.value;
    const jenisDokumenContainer = document.getElementById('jenisDokumenContainer');

    // Remove all siblings of jenisDokumenContainer (previous dynamic fields)
    while (jenisDokumenContainer.nextElementSibling) {
      jenisDokumenContainer.nextElementSibling.remove();
    }
    itemDetailSection.innerHTML = '';

    if (jenisDokumen === 'proforma' || jenisDokumen === 'invoice') {
      if (jenisDokumen === 'proforma') {
        // DESKTOP BARIS 1: Jenis Dokumen (50%), Tanggal (50%)
        jenisDokumenContainer.className = 'form-group col-12 col-md-6 mb-4';

        dynamicContent.insertAdjacentHTML('beforeend', `
          <div class="form-group col-6 col-md-6 mb-4">
            <label for="date" class="font-weight-600">Tanggal<span class="text-danger">*</span></label>
            <input type="date" class="form-control input-shadow-sm" id="date" name="date" required>
          </div>
          ${buildCommonFields()}
        `);
        document.getElementById('submitProforma').style.display = 'inline-block';
        document.getElementById('submitInvoice').style.display = 'none';
      } else {
        // DESKTOP BARIS 1: Jenis Dokumen (50%), No Proforma (25%), Tanggal (25%)
        jenisDokumenContainer.className = 'form-group col-12 col-md-6 mb-4';

        dynamicContent.insertAdjacentHTML('beforeend', `
          <div class="form-group col-12 col-md-3 mb-4">
            <label for="noProformaInvoice" class="font-weight-600">No. Proforma Invoice<span class="text-danger">*</span></label>
            <input type="text" class="form-control input-shadow-sm" id="noProformaInvoice" name="noProformaInvoice" placeholder="Nomor Proforma" required>
          </div>
          <div class="form-group col-6 col-md-3 mb-4">
            <label for="date" class="font-weight-600">Tanggal<span class="text-danger">*</span></label>
            <input type="date" class="form-control input-shadow-sm" id="date" name="date" required>
          </div>
          ${buildCommonFields()}
        `);
        document.getElementById('submitProforma').style.display = 'none';
        document.getElementById('submitInvoice').style.display = 'inline-block';
      }

      // Inject Detail Item Section
      itemDetailSection.innerHTML = buildItemDetailSection();

      // Setup listeners for the new item detail section
      setupItemListeners();
    } else {
      document.getElementById('submitProforma').style.display = 'none';
      document.getElementById('submitInvoice').style.display = 'none';
    }
  });

  // ──────────────────────────────────────────────
  // Item Table Listeners
  // ──────────────────────────────────────────────

  function setupItemListeners() {
    // Event delegation for item removal
    document.getElementById('itemDetailSection').addEventListener('click', function (e) {
      if (e.target.closest('.removeItemBtn')) {
        var button = e.target.closest('.removeItemBtn');
        var row = button.closest('tr');
        var totalElement = document.getElementById('total');
        var rowSubtotalText = row.cells[3].textContent;

        var rowSubtotal = parseFloat(rowSubtotalText.replace(/\./g, '')) || 0;
        var currentTotal = parseFloat(totalElement.textContent.replace(/\./g, '')) || 0;
        var newTotal = Math.max(0, currentTotal - rowSubtotal);

        totalElement.textContent = newTotal.toLocaleString('id-ID', { minimumFractionDigits: 0 });
        row.remove();

        if (document.getElementById('itemTableBody').children.length === 0) {
          document.getElementById('itemTable').style.display = 'none';
          document.getElementById('totalContainer').style.display = 'none';
        }
      }
    });

    document.getElementById('addItemBtn').addEventListener('click', function () {
      var deskripsi = document.getElementById('deskripsi').value;
      var nominalRaw = document.getElementById('nominal').value.replace(/\./g, '');
      var nominal = parseFloat(nominalRaw);
      var quantity = parseInt(document.getElementById('quantity').value);

      if (deskripsi && nominal && quantity) {
        var subtotal = nominal * quantity;
        var totalElement = document.getElementById('total');

        var newRow = '<tr>' +
          '<td class="text-left">' + deskripsi + '</td>' +
          '<td>' + nominal.toLocaleString('id-ID', { minimumFractionDigits: 0 }) + '</td>' +
          '<td>' + quantity + '</td>' +
          '<td><strong>' + subtotal.toLocaleString('id-ID', { minimumFractionDigits: 0 }) + '</strong></td>' +
          '<td><button type="button" class="btn btn-danger btn-sm rounded-circle px-2 py-1 removeItemBtn shadow-sm" title="Hapus"><i class="ti-close"></i></button></td>' +
          '</tr>';

        document.getElementById('itemTableBody').insertAdjacentHTML('beforeend', newRow);

        var currentTotal = parseFloat(totalElement.textContent.replace(/\./g, '')) || 0;
        var newTotal = currentTotal + subtotal;
        totalElement.textContent = newTotal.toLocaleString('id-ID', { minimumFractionDigits: 0 });

        document.getElementById('itemTable').style.display = 'table';
        document.getElementById('totalContainer').style.display = 'block';

        document.getElementById('deskripsi').value = '';
        document.getElementById('nominal').value = '';
        document.getElementById('quantity').value = '1';
        document.getElementById('deskripsi').focus();
      }
    });
  }

});

// ──────────────────────────────────────────────
// Global Utility: Rupiah Formatter
// ──────────────────────────────────────────────

function formatRupiah(input) {
  var value = input.value.replace(/[^0-9]/g, '');
  if (value === '') {
    input.value = '';
    return;
  }
  input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}
