<div class="modal fade" id="viewApproval" tabindex="-1" role="dialog" aria-labelledby="viewApprovalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-center" id="viewApprovalModal">Confirm Incident Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div id="flashMessages">
                        @if (session('success'))
                            <div class="alert alert-sucess" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <form class="row g-3" id="confirmForm" method="POST" action="#">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label for="cname">Client Name</label>
                                <input type="text" name="cname" class="form-control" placeholder=""/>
                            </div>

                            <div class="col-md-4">
                                <label for="extorder">External Order</label>
                                <input type="text" name="extorder" class="form-control" placeholder=""/>
                            </div>

                            <div class="col-md-4">
                                <label for="ordertype">Order Type</label>
                                <input type="ordertype" name="text" class="form-control" placeholder=""/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="serialno">Serial No</label>
                                <input type="text" name="seriano" class="form-control" placeholder=""/>
                            </div>
                            <div class="col-md-4">
                                <label for="cmr">CMR</label>
                                <input type="text" name="cmr" class="form-control" placeholder=""/>
                            </div>
                            <div class="col-md-4">
                                <label for="pmr">PMR</label>
                                <input type="text" name="pmr" class="form-control" placeholder=""/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label for="takenby">Taken By</label>
                                <input type="text" name="takenby" class="form-control" placeholder=""/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <textarea class="form-control" id="linenote" name="linenote" rows="4" cols="50">
                                
                                </textarea>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label for="upload">Attach form</label>
                                <input type="file" name="takenby" class="form-control" placeholder=""/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-danger btn-block">Reject</button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success btn-block">Approve</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        
        $.ajax({
            url: "{{ route('approve')}}",
            type: POST,
            data: {_token: "{{ csrf_token() }}"},
            success: function(data) {

            },
            error : function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: "{{ route('reject')}}",
            type: POST,
            data: {_token: "{{ csrf_token() }}"},
            success: function(data) {

            },
            error : function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>