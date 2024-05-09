<div class="modal fade" id="salesOrderModal" tabindex="-1" role="dialog" aria-labelledby="salesOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-center" id="salesOrderModalLabel">Confirm Sales Order Details</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="flash-message" style="display: none;"></div>
            <div>
                <div class="modal-body">
                    <div class="container-fluid mb-5 mt-3">
                        <div class="row d-flex align-items-baseline">
                            <div class="col-xl-9">
                                <p style="color: #000000;font-size: 14px;">Customer Name: <strong id="cname"></strong></p>
                                <p style="color: #000000;font-size: 14px;">Order Number: <strong id="ordernum"></strong></p>
                                <p style="color: #000000;font-size: 14px;">Serial Number: <strong id="serialno"></strong></p>
                            </div>
                            <div class="col-xl-3 float-end">
                                <p style="color: #000000;font-size: 14px;">Date: <strong id="date"></strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-light">
                                <thead>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Mono CMR</th>
                                    <th>Mono PMR</th>
                                    <th>Mono Copies Done</th>
                                    <th>Color CMR</th>
                                    <th>Color PMR</th>
                                    <th>Color Copies Done</th>
                                    <th>Yield</th>
                                    <th>Consumption</th>
                                </thead>
                                <tbody id="orderTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row mt-4">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <a type="button" class="btn btn-danger btn-sm mr-4 reject-btn" data-id="{{ $incident->idIncidents }}">Reject</a>
                        </div>
                        <div class="col-md-2">
                            <a type="button" class="btn btn-success btn-sm ml-4 approve-btn" data-id="{{ $incident->idIncidents }}">Approve</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>