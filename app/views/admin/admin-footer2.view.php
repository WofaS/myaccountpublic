 <?php
  use \Model\Auth;
  $app = get_app_details();
  ?>

   <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
				<?php foreach($app as $row):?>				    
				<p>
					<strong> <?=$row->appname?></strong> &copy;<?=date('Y')?> All Rights Reserved
				</p>
				<p class="fs-12">Developed by <strong class="text-info">Wofasam</strong>  
					<span class="social-links">
					<span href="#" class="facebook" title="0548214842"><i class="bi bi-whatsapp"></i></span>
					<span href="#" class="facebook" title="0548214842"><i class="bi bi-telephone"></i></span>
					</span>
				</p>
			<?php endforeach;?>
			</div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>


    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Vendor JS Files -->
  <script src="<?=ROOT?>/niceadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/quill/quill.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=ROOT?>/niceadmin/assets/vendor/php-email-form/validate.js"></script>

    <script src="<?=ROOT?>/assets/script/canvasjs.min.js"></script>

    <!-- Required vendors -->
    <script data-cfasync="false" src="<?=ROOT?>/admindash/../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?=ROOT?>/admindash/vendor/global/global.min.js"></script>
	<script src="<?=ROOT?>/admindash/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="<?=ROOT?>/admindash/vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="<?=ROOT?>/admindash/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="<?=ROOT?>/admindash/vendor/apexchart/apexchart.js"></script>
    <!-- Datatable -->
    <script src="<?=ROOT?>/admindash/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=ROOT?>/admindash/js/plugins-init/datatables.init.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?=ROOT?>/admindash/js/dashboard/dashboard-1.js"></script>
	
	<script src="<?=ROOT?>/admindash/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="<?=ROOT?>/admindash/js/custom.min.js"></script>
	<script src="<?=ROOT?>/admindash/js/deznav-init.js"></script>
    <script src="<?=ROOT?>/admindash/js/styleSwitcher.js"></script>
  <!-- Template Main JS File -->
  <script src="<?=ROOT?>/niceadmin/assets/js/main.js"></script>
    <script src="<?=ROOT?>/admindash/js/demo.js"></script>

    <script>
		jQuery(document).ready(function(){
			setTimeout(function() {
				dezSettingsOptions.version = 'dark';
				new dezSettings(dezSettingsOptions);
			},1500)
		});
	</script>

</body>
</html>