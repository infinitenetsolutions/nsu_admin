<x-layout>
    @slot('title', 'table')
        @slot('body')


            <!-- Page Wrapper -->
            <div id="wrapper">

                @include('include.aside')

                <!-- Page Wrapper -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Topbar -->


                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- 404 Error Text -->
                            <div class="text-center">
                                <div class="error mx-auto" data-text="404">404</div>
                                <p class="lead text-gray-800 mb-5">Page Not Found</p>
                                <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                                <a href="/">&larr; Back to Dashboard</a>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2020</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>

        @endslot
    </x-layout>
