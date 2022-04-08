<x-layout>
    @slot('title', 'Career')
    @slot('body')


        <!-- Page Wrapper -->
        <div id="wrapper">

            @include('include.aside')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    @include('include.navbar')
                    <!-- End of Topbar -->
                    {{-- adding the model --}}
                    @include('career.insert')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h2>Career</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active">Career</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Career </h6>
                                </div>
                                <div class="col-6"> <button type="button"
                                        class="btn btn-primary btn-sm float-right " data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Add</button>
                                </div>
                            </div>
                            @if (session('store'))
                                <div class="alert alert-success">
                                    {{ session('store') }}
                                </div>
                            @endif
                            @if (session('delete'))
                                <div class="alert alert-danger">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            @if (session('update'))
                                <div class="alert alert-success">
                                    {{ session('update') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-secondary">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('status1'))
                                <div class="alert alert-success">
                                    {{ session('status1') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Name </th>
                                                <th>Email address </th>
                                                <th>Phone no. </th>
                                                <th>Career Name</th>
                                                <th>Resume </th>
                                                <th>Action 1</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot class="text-dark">
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Name </th>
                                                <th>Email address </th>
                                                <th>Phone no. </th>
                                                <th>Career Name</th>
                                                <th>Resume </th>
                                                <th>Action 1</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($data as $career)
                                                <tr>


                                                    <td>{{ $loop->iteration }}</td>

                                                    <td> {{ $career->name }} </td>
                                                    <td> {{ $career->email }} </td>
                                                    <td> {{ $career->phone }} </td>
                                                    <?php $career_name = DB::table('career_tbl')->find($career->career_id); ?>

                                                    <td> {{ $career_name->sub_title }} </td>

                                                    <td> <a href="https://nsuniv.ac.in/nsularavel1/public/upload/career/{{$career->resume }}"
                                                            target="_blank">
                                                            <object
                                                                data="https://nsuniv.ac.in/nsularavel1/public/upload/career/{{$career->resume }}"
                                                                type="application/pdf" width="100" height="100">

                                                            </object></a></td>

                                                    <td><a href="{{ route('career_destroy.delete',$career->id ) }}"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                    <td><a href="{{ route('career_status.status',$career->id) }}"
                                                            class="btn @if ($career->status == 'accept')
                                                                    btn-success
                                                                    @endif btn-secondary  btn-sm">
                                                            @if ($career->status == 'accept') Accepted @else Pandding @endif</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

            </div>

        </div>
        <!-- Scroll to Top Button-->



    @endslot
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</x-layout>
