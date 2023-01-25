 </main><!-- End #main -->

 <?php
  use \Model\Auth;
  $app = get_app_details();
  ?>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      <?php foreach($app as $row):?>
      &copy;<?=date('Y')?> Copyright <strong><span><a href="<?=ROOT?>"> <?=$row->appname?></a></span></strong>. All Rights Reserved
    <?php endforeach;?>
    </div>
    <div class="credits">
      Designed by <a href="" title="0548214842" class="mx-2">WofaSam</a>
      <span class="social-links">
        <a href="#" class="facebook" title="0548214842"><i class="bi bi-whatsapp"></i></a>
        <a href="#" class="facebook" title="contact developer on 0548214842"><i class="bi bi-telephone"></i></a>
      </span>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
    <script src="<?=ROOT?>/assets/script/canvasjs.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="<?=ROOT?>/niceadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/php-email-form/validate.js"></script>

   <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script data-cfasync="false" src="<?=ROOT?>/admindash/../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?=ROOT?>/admindash/vendor/global/global.min.js"></script>
  <script src="<?=ROOT?>/admindash/vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- Required vendors -->
    <script data-cfasync="false" src="<?=ROOT?>/admindash/../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="<?=ROOT?>/admindash/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  
  <!-- Chart piety plugin files -->
    <script src="<?=ROOT?>/admindash/vendor/peity/jquery.peity.min.js"></script>
  
  <!-- Dashboard 1 -->
  <script src="<?=ROOT?>/admindash/js/dashboard/dashboard-1.js"></script>
  
  <script src="<?=ROOT?>/admindash/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?=ROOT?>/admindash/js/custom.min.js"></script>
  <script src="<?=ROOT?>/admindash/js/deznav-init.js"></script>

    <!-- Toastr -->
    <script src="<?=ROOT?>/admindash/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="<?=ROOT?>/admindash/js/plugins-init/toastr-init.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=ROOT?>/niceadmin/assets/js/main.js"></script>

</body>

</html>     