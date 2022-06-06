<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center"> STUDENT ALUMNI
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</b></label></button>

            </div>
            <div class="modal-body text">
                <form action="{{ route('alumni.insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label><b>Registration Number</b></label>
                            <input required class="form-control" onkeyup="check_id(this.value)" id="reg_no"
                                name="reg_no" placeholder="Enter Name" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label><b>Phone Number</b></label>
                            <input required class="form-control" id="phone" name="phone" placeholder="Enter Name"
                                type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label><b>Name</b></label>
                            <input required class="form-control" id="testimonial_name" name="testimonial_name"
                                placeholder="Enter Name" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label><b>Course</b></label>
                            <input required class="form-control" id="testimonial_course" name="testimonial_course"
                                placeholder="Enter Course" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label><b>Batch Year</b></label>
                            <input required class="form-control" id="testimonial_batch" name="testimonial_batch"
                                placeholder="Enter Batch Year" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label><b>Current Designation</b></label>
                            <input required class="form-control" id="testimonial_desig" name="testimonial_desig"
                                placeholder="Enter Current Designation" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label><b>Company Currently Working</b></label>
                            <input required class="form-control" id="testimonial_company" name="testimonial_company"
                                placeholder="Enter Current Company" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label><b>Upload Image</b></label>
                            <input required class="form-control" id="testimonial_image" name="testimonial_image"
                                type="file" accept="image/*">
                            <small class="form-text text-muted" id="image_err">Please upload your image. </small>
                        </div>

                        <div class="form-group col-sm-4">
                            <label><b> Status </b></label>
                            <select class="form-control" name="is_deleted" id="">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="message">Message</b></label>
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
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
</div>
