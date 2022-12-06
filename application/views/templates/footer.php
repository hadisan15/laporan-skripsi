
<!-- Footer -->
<section id="footer">
  <div class="footer mt-3" style="background-color: #108bb5; margin-bottom: auto;">
    <div class="container">
      <br>
      <div class="row text-white font-weight-bold">
        <div class="col-lg-2">
          <div class="row">
            <div class="col">
              <img src="<?= base_url('assets/img/logo-tdl22.png'); ?>" width="130px" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-2 presented">
          <div class="row">
            <div class="col">
              <p>Presented by:</p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <img src="<?= base_url('assets/img/footer/prov-kalsel.png'); ?>" width="150px" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-5 supported">
          <div class="row">
            <div class="col">
              <p>Supported by:</p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <img src="<?= base_url('assets/img/footer/kota-bjb.png'); ?>" width="100px" alt="" class="me-2">
              <img src="<?= base_url('assets/img/footer/kab-banjar.png'); ?>" width="100px" alt="" class="me-2">
              <img src="<?= base_url('assets/img/footer/kab-tapin.png'); ?>" width="100px" alt="" class="me-2">
              <img src="<?= base_url('assets/img/footer/kab-hss.png'); ?>" width="100px" alt="" class="">
            </div>
          </div>
        </div>
        <div class="col-lg-3 organized">
          <div class="row">
            <div class="col">
              <p>Organized by:</p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <img src="<?= base_url('assets/img/footer/issi.png'); ?>" width="100px" alt="" class="me-2">
              <img src="<?= base_url('assets/img/footer/valindo-eo.png'); ?>" width="130px" alt="" class="me-2">
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="foot-line mt-2 mb-2"></div>
      </div>
      <div class="row">
        <div class="col">
          <p class="text-center text-white fw-bold">
            Copyright <span class="fw-bolder">&copy;</span> 2022 Hadi Santoso
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Font Awesome Script -->
<script src="https://kit.fontawesome.com/b099bf10fc.js" crossorigin="anonymous"></script>

<!-- Chart Page level plugins -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

<!-- Chart Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-bar-demo.js'); ?>"></script>

<!-- Datatable Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

<!-- Datatable Page level custom scripts -->
<script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

<!-- sf js -->
<script src="<?= base_url('assets/js/sf.js'); ?>"></script>

<script>
  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/changeAccess'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
      }
    })
  })
</script>






</body>

</html>