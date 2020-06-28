            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rifki Imanudin Maulana <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


            <script src="<?= base_url('assets/'); ?>js/jquery.dataTables.js"></script>
            <script src="<?= base_url('assets/'); ?>js/dataTables.bootstrap4.js"></script>
            <script src="<?= base_url('assets/'); ?>js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


            <script src="http://rekadata.com/asset/js/jquery.min.js"></script>
            <script src="http://rekadata.com/asset/js/jquery-migrate-3.0.1.min.js"></script>
            <script src="http://rekadata.com/asset/js/popper.min.js"></script>
            <script src="http://rekadata.com/asset/js/bootstrap.min.js"></script>
            <script src="http://rekadata.com/asset/js/jquery.easing.1.3.js"></script>
            <script src="http://rekadata.com/asset/js/jquery.waypoints.min.js"></script>
            <script src="http://rekadata.com/asset/js/jquery.stellar.min.js"></script>
            <script src="http://rekadata.com/asset/js/owl.carousel.min.js"></script>
            <script src="http://rekadata.com/asset/js/jquery.magnific-popup.min.js"></script>
            <script src="http://rekadata.com/asset/js/aos.js"></script>
            <script src="http://rekadata.com/asset/js/jquery.animateNumber.min.js"></script>
            <script src="http://rekadata.com/asset/js/jquery.mb.YTPlayer.min.js"></script>
            <script src="http://rekadata.com/asset/js/scrollax.min.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
            <script src="http://rekadata.com/asset/js/google-map.js"></script>
            <script src="http://rekadata.com/asset/js/main.js"></script>


            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>





            <script type="text/javascript">
                $.extend(true, $.fn.dataTable.defaults, {
                    "searching": true,
                    "ordering": true,
                    paging: true
                });
                $(document).ready(function() {
                    $('#mese').dataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                    });
                });
            </script>
            <script type="text/javascript">
                $.extend(true, $.fn.dataTable.defaults, {
                    "searching": true,
                    "ordering": true,
                    paging: true
                });
                $(document).ready(function() {
                    $('#example').DataTable({
                        "lengthMenu": [5, 10, 15, 20, 25, 30, 35, 50, 75, 100],
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });
            </script>

            </body>

            </html>