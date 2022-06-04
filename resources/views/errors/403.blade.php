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

                            <!-- 403 Error Text -->
                            <div class="text-center">
                                <div class="error mx-auto" data-text="403">403</div>
                                <p class="lead text-gray-800 mb-5">Forbden</p>
                                <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                                <a href="{{ route('dashboard') }}">&larr; Back to Dashboard</a>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    @include('include.footer')
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>

        @endslot
    </x-layout>
