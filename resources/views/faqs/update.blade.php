<x-layout>
    @slot('title', 'route')
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

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        <!-- Page Heading -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h2>Update</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active">Update</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Update </h6>
                                </div>

                            </div>
                            <div class="card-body">
                                <form action="{{ route('faqs.update') }}" method="POST">
                                    <div class="container">
                                        <div class="row">
                                            @csrf
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>type</b> </label>
                                                <select required name="type" type="text" class="form-control">
                                                    @if ($data->type != '')
                                                        <option value="{{ $data->type }}">{{ $data->type }} Certificate </option>
                                                    @else
                                                        <option selected disabled> -Select- </option>
                                                    @endif

                                                    <option value="cma">Cma Certificate </option>
                                                    <option value="website">Website </option>

                                                </select>

                                            </div>

                                            <div class="form-group col-sm-8">
                                                <label for="" class="text-dark"> <b>Question</b> </label>
                                                <input required name="question" placeholder="Enter name of question"
                                                    value="{{ $data->question }}" type="text" class="form-control">
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="" class="text-dark"> <b>Answare</b> </label>
                                                <textarea required name="ans"  placeholder="Answare " type="text"
                                                    class="form-control">{{ $data->ans }}</textarea>
                                            </div>

                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>status</b> </label>
                                                <select required name="status" type="text" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

            </div>

        </div>
        <!-- Scroll to Top Button-->



    @endslot
</x-layout>
