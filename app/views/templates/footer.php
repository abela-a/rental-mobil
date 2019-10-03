<!-- JQUERY -->
<script src="<?= BASEURL; ?>/vendor/MaterialBootstrap/js/jquery-3.4.1.min.js"></script>
<!-- POPPER -->
<script src="<?= BASEURL; ?>/vendor/MaterialBootstrap/js/popper.min.js"></script>
<!-- BS4 CORE -->
<script src="<?= BASEURL; ?>/vendor/MaterialBootstrap/js/bootstrap.min.js"></script>
<!-- MATERIAL DESIGN -->
<script src="<?= BASEURL; ?>/vendor/MaterialBootstrap/js/mdb.min.js"></script>
<!-- DATATABLES -->
<script src="<?= BASEURL; ?>/vendor/MaterialBootstrap/js/addons/datatables.js"></script>
<!-- SWEET ALERT -->
<script src="<?= BASEURL; ?>/vendor/SweetAlert2/dist/sweetalert2.all.min.js"></script>

<?= SweetAlert::SwalAlert() ?>
<?= SweetAlert::SwalToast() ?>

<!-- MASK -->
<script src="<?= BASEURL; ?>/vendor/MaterialBootstrap/js/jquery.mask.min.js"></script>
<!-- MY SCRIPT -->
<script src="<?= BASEURL; ?>/js/script.js"></script>

<script>
  $(document).ready(function() {
    // GET TYPE
    $("#KdMerk").change(function() {
      var merk = $('#KdMerk').val();
      $('#type').load("<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/getType/" + merk);
    });
  });
</script>

</body>

</html>