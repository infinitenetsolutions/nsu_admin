<x-layout>
    @slot('title', 'Testimonial')
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
                                <form action="{{ route('alumni.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input name="id" type="hidden" value="{{ $data->id }}">
                                    <input type="hidden" name="dom" value="{{ date('Y-m-d h:m:s') }}">
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label><b>Registration Number</b></label>
                                            <input readonly required class="form-control" value="{{ $data->reg_no }}"
                                                onkeyup="check_id(this.value)" id="reg_no" name="reg_no"
                                                placeholder="Enter Name" type="text">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><b>Phone Number</b></label>
                                            <input value="{{ $data->phone }}" required class="form-control" id="phone"
                                                name="phone" placeholder="Enter Name" type="text">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label><b>Name</b></label>
                                            <input value="{{ $data->testimonial_name }}" required class="form-control"
                                                id="testimonial_name" name="testimonial_name" placeholder="Enter Name"
                                                type="text">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><b>Course</b></label>
                                            <input value="{{ $data->testimonial_course }}" required class="form-control"
                                                id="testimonial_course" name="testimonial_course" placeholder="Enter Course"
                                                type="text">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><b>Batch Year</b></label>
                                            <input value="{{ $data->testimonial_batch }}" required class="form-control"
                                                id="testimonial_batch" name="testimonial_batch"
                                                placeholder="Enter Batch Year" type="text">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><b>Current Designation</b></label>
                                            <input value="{{ $data->testimonial_desig }}" required class="form-control"
                                                id="testimonial_desig" name="testimonial_desig"
                                                placeholder="Enter Current Designation" type="text">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label><b>Company Currently Working</b></label>
                                            <input value="{{ $data->testimonial_company }}" required class="form-control"
                                                id="testimonial_company" name="testimonial_company"
                                                placeholder="Enter Current Company" type="text">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <div class="row">
                                                <div class="col-sm-6"> <label><b>Upload Image</b></label>
                                                    <input value="{{ $data->testimonial_image }}" required
                                                        class="form-control" id="testimonial_image"
                                                        name="testimonial_image" type="file" accept="image/*">
                                                    <small class="form-text text-muted" id="image_err">Please upload your
                                                        image.
                                                    </small>
                                                </div>
                                                <div class="col-sm-6">
                                                    @if (str_contains($data->testimonial_image, 'admin')  )
                                                    <img width="100" src="{{asset('upload/alumni/'.$data->testimonial_image)}}" alt="" />
                                                   @else
                                                   <img width="100" src="{{asset('upload/appointment/'.$data->testimonial_image)}}" alt="" />

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="message">Message</b></label>
                                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message">{{ $data->message }}</textarea>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group text-center">
                                        <button id="testimonial_button" class="btn btn-primary btn-sm" type="submit">Send
                                            Message </button>
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

    <script>
        function check_id(mobile) {
            id = document.getElementById('reg_no').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                data = JSON.parse(this.responseText)
                document.getElementById('testimonial_name').value = data.admission_first_name + " " + data
                    .admission_middle_name + " " + data.admission_last_name;
                document.getElementById('testimonial_batch').value = data.academic_session;
                document.getElementById('testimonial_course').value = data.course_name;
                mobile = document.getElementById('phone').value = data.admission_mobile_student;
            }
            xmlhttp.open("GET", "/alumni/api/" + id, true);
            xmlhttp.send();
        }
    </script>

</x-layout>
