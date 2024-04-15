<div class="modal fade" id="salesOrderModal{{ $incident->idIncidents }}" tabindex="-1" role="dialog" aria-labelledby="salesOrderModalLabel{{ $incident->idIncidents }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-center" id="salesOrderModalLabel{{ $incident->idIncidents }}">Confirm Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <form class="row g-3" id="salesOrderForm{{ $incident->idIncidents }}" method="POST" action="#">
                        @csrf
                        @method('PUT')
                        <!-- Hidden input for incident ID -->
                        <input type="hidden" name="incident_id" value="{{ $incident->idIncidents }}">
                        
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label for="cname">Client Name</label>
                                <input type="text" class="form-control" name="cname" value="" disabled/>
                            </div>

                            <div class="col-md-4">
                                {{-- {{ $salesorder->OrderNumber }} --}}
                                <label for="ordernum">Order Number</label>
                                <input type="text" class="form-control" name="ordernum" value="" disabled/>
                                
                            </div>

                            <div class="col-md-4">
                                <label for="partnum">Part Number</label>
                                <input type="text" class="form-control" name="partnum" value="" disabled/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="itemdesc">Item Description</label>
                                <input type="text" class="form-control" name="itemdesc" value="" disabled/>
                            </div>

                            <div class="col-md-4">
                                <label for="warehouse">Warehouse</label>
                                <input type="text" class="form-control" name="warehouse" value="" disabled/>
                            </div>

                            <div class="col-md-4">
                                <label for="qty">Quantity</label>
                                <input type="text" class="form-control" name="qty" value="" disabled/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="monocmr">Mono CMR</label>
                                <input type="text" class="form-control" name="monocmr" value="" disabled/>
                            </div>
                            <div class="col-md-4">
                                <label for="monopmr">Mono PMR</label>
                                <input type="text" class="form-control" name="monopmr" value="" disabled/>
                            </div>
                            <div class="col-md-4">
                                <label for="copies">Mono Copies Done</label>
                                <input type="text" class="form-control" name="copies" value="" disabled/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="colocmr">Color CMR</label>
                                <input type="text" class="form-control" name="colocmr" value="" disabled/>
                            </div>
                            <div class="col-md-4">
                                <label for="colopmr">Color PMR</label>
                                <input type="text" class="form-control" name="colopmr" value="" disabled/>
                            </div>
                            <div class="col-md-4">
                                <label for="copies">Color Copies Done</label>
                                <input type="text" class="form-control" name="copies" value="" disabled/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <label for="serialno">Serial No</label>
                                <input type="text" class="form-control" name="seriano" value="" disabled/>
                               
                            </div>
                            <div class="col-md-8">
                                <label for="attachment">Attachment</label>
                                <input type="file" class="form-control" name="attachment" value="" />
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label for="linenote">Line Note</label>
                                <textarea class="form-control" id="linenote" name="linenote" rows="4" cols="50" disabled>
                                
                                </textarea>
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
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     // $('#salesOrderForm').on('submit', function() {
    //     //     $.ajax({
    //     //         url: "{{ route('approve', )}}",
    //     //         type: POST,
    //     //         data: {_token: "{{ csrf_token() }}"},
    //     //         success: function(data) {

    //     //         },
    //     //         error : function(xhr, status, error) {
    //     //             console.error(error);
    //     //         }
    //     //     });
            
    //     //     $.ajax({
    //     //         url: "{{ route('reject')}}",
    //     //         type: POST,
    //     //         data: {_token: "{{ csrf_token() }}"},
    //     //         success: function(data) {

    //     //         },
    //     //         error : function(xhr, status, error) {
    //     //             console.error(error);
    //     //         }
    //     //     });
    //     // });
    // });
</script>