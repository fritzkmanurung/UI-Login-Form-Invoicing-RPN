<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $this->renderSection('title') ?></title>
  <link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('vendors/datatables.net-bs4/dataTables.bootstrap4.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('js/select.dataTables.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('images/favicon.png'); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="container-scroller">
    <?= $this->include('partials/topbar') ?>
    <div class="container-fluid page-body-wrapper">
      <?= $this->include('partials/sidebar') ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <?= $this->renderSection('content') ?>
        </div>
        <!-- Footer -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2024 PT RPN X IT DEL. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="<?= base_url('vendors/js/vendor.bundle.base.js'); ?>"></script>
  <script src="<?= base_url('vendors/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?= base_url('vendors/datatables.net/jquery.dataTables.js'); ?>"></script>
  <script src="<?= base_url('vendors/datatables.net-bs4/dataTables.bootstrap4.js'); ?>"></script>
  <script src="<?= base_url('js/dataTables.select.min.js'); ?>"></script>
  <script src="<?= base_url('js/off-canvas.js'); ?>"></script>
  <script src="<?= base_url('js/hoverable-collapse.js'); ?>"></script>
  <script src="<?= base_url('js/template.js'); ?>"></script>
  <script src="<?= base_url('js/settings.js'); ?>"></script>
  <script src="<?= base_url('js/todolist.js'); ?>"></script>
  <script src="<?= base_url('js/dashboard.js'); ?>"></script>
  <script src="<?= base_url('js/Chart.roundedBarCharts.js'); ?>"></script>
  <!-- Initialize DataTables -->
  <script>
    $(document).ready(function() {
      $('.table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 10,
        "lengthMenu": [5, 10, 25, 50, 75, 100]
      });
    });
  </script>
</body>

</html>
