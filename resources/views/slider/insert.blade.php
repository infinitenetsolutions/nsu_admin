<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">Slider Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('slider.insert')}}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Title</b> </label>
                                <input required name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                            <!-- <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>sub_title</b> </label> -->
                                <input required name="sub_title" type="hidden"  value="Netaji Subhas Univerty" class="form-control"
                                    placeholder="sub_title">
                            <!-- </div> -->
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>image_name</b> </label>
                                <input required name="image_name" type="file" class="form-control"
                                    placeholder="image_name">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Image Link</b> </label>
                                <input required name="virtual_image_name" type="text" class="form-control"
                                    placeholder="Image Link">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>status</b> </label>
                                <select required name="is_deleted" type="text" class="form-control"
                                    placeholder="Title">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="" class="text-dark"> <b>Description</b> </label>
                                <textarea required name="description" type="text" class="form-control"
                                    placeholder="description"></textarea>
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
