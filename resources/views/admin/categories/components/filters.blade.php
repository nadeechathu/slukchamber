

    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#myModal2">
            <i class="fa fa-filter"></i> Filters
        </button>
    <!-- Modal -->
    <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Filters</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body text-start">
                    <form action="{{route('admin.categories.all')}}" method="get" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Filter by name</label>
                        <input type="text" name="searchKey" class="form-control form-control-sm" placeholder="Name" value="{{$searchKey}}">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-search w-100"><i class="fa fa-search"></i> Filter Records</button>
                        <a href="{{route('admin.categories.all')}}"><button type="button" class="btn btn-primary btn-search w-100 mt-1"><i class="fa fa-refresh"></i> Reset Filters</button></a>
                    </div>
                    </form>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

