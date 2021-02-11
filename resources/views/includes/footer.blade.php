

                </div> <!-- container-fluid -->
            </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © CORS TECH.
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->


        <script src="{{ asset('dashboard_assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dashboard_assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('dashboard_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('dashboard_assets/js/pages/dashboard.init.js') }}"></script>

        <script src="{{ asset('dashboard_assets/js/app.js') }}"></script>

        @yield('footer-script')

    </body>
</html>
