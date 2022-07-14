<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle"> Add Faqs  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('faqs.insert') }}" method="POST">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>type</b> </label>
                                <select required name="type" type="text" class="form-control">
                                    <option selected disabled > -Select- </option>
                                    <option value="cma">Cma Certificate </option>
                                    <option value="website">Website </option>

                                </select>

                            </div>

                            <div class="form-group col-sm-8">
                                <label for="" class="text-dark"> <b>Question</b> </label>
                                <input required name="question" placeholder="Enter name of question" type="text" class="form-control">
                            </div>
                          
                            <div class="form-group col-sm-12">
                                <label for="" class="text-dark"> <b>Answare</b> </label>
                                <textarea required name="ans" placeholder="Answare " type="text" class="form-control"></textarea>
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
</div>