 <!-- partial:partials/_footer.html -->
 <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
   <p class="text-muted text-center text-md-left">Copyright © 2021 <a href="https://www.nobleui.com" target="_blank">ST Peters</a>. All rights reserved</p>
   <!-- <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p> -->
 </footer>
 <!-- partial -->

 </div>
 </div>

 <!-- core:js -->
 <script src="<?php echo $site_url; ?>assets/vendors/core/core.js"></script>
  <script src='<?php echo $site_url; ?>assets/vendors/tinymce/tinymce.min.js'></script>

 <!-- endinject -->
 <!-- plugin js for this page -->
 <script src="<?php echo $site_url; ?>assets/vendors/chartjs/Chart.min.js"></script>
 <script src="<?php echo $site_url; ?>assets/vendors/jquery.flot/jquery.flot.js"></script>
 <script src="<?php echo $site_url; ?>assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
 <script src="<?php echo $site_url; ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
 <script src="<?php echo $site_url; ?>assets/vendors/apexcharts/apexcharts.min.js"></script>
 <script src="<?php echo $site_url; ?>assets/vendors/progressbar.js/progressbar.min.js"></script>
 <!-- end plugin js for this page -->
 <!-- inject:js -->
 <script src="<?php echo $site_url; ?>assets/vendors/feather-icons/feather.min.js"></script>
 <script src="<?php echo $site_url; ?>assets/js/template.js"></script>
 <!-- endinject -->
 <!-- custom js for this page -->
 <script src="<?php echo $site_url; ?>assets/js/dashboard.js"></script>
 <script src="<?php echo $site_url; ?>assets/js/datepicker.js"></script>
 <!-- end custom js for this page -->
 <script src="<?= $site_url ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
 <script src="<?= $site_url ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
 <script src="<?= $site_url ?>assets/js/data-table.js"></script>




 <!--
<script src="<?php echo $site_url; ?>assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo $site_url; ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?php echo $site_url; ?>assets/vendors/feather-icons/feather.min.js"></script>
<script src="<?php echo $site_url; ?>assets/js/data-table.js"></script>
-->
<script src="<?php echo $site_url; ?>assets/vendors/select2/select2.min.js"></script>
<script src="<?php echo $site_url; ?>assets/js/select2.js"></script>
<script>
  tinymce.init({
    selector: '#n_des',
    menubar:false,
    statusbar: false,
  });
</script>


 </body>

 </html>