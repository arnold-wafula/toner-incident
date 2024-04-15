@extends('layouts.app')
@include('layouts.nav-approver')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #myTable tbody th,
    #myTable tbody td {
        padding: 1px !important; 
        font-size: 12px;
    }
    p {
        padding: 0px !important;
        margin: 0px !important;
    }
    .form-row{
        padding: 0px !important;
        margin: 0px !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>

    <div class="container-fluid mt-4">
        <table id="myTable" class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Date Modified</th>
                    <th>Account Code</th>
                    <th>Customer</th>
                    <th>Incident No.</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($incidents as $incident)
                <tr>
                    <td>{{ $incident->dCreated }}</td>
                    <td>{{ $incident->dLastModified }}</td>
                    <td>x</td>
                    <td>{{ $incident->ClientName }}</td>
                    <td>{{ $incident->cOurRef }}</td>
                    <td>{{ $incident->Status }}</td>
                    <td>
                        <button type="button" id="salesOrderButton{{ $incident->idIncidents }}" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#salesOrderModal{{ $incident->idIncidents }}" data-incident_id="{{ $incident->idIncidents }}">
                            View
                        </button>
                    </td>
                </tr>
                @include('layouts.salesorder')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "scrollY": "287px",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#salesOrderButton{{ $incident->idIncidents }}').on('click', function (e) {
            e.preventDefault();

            //let  = $(this).attr('incident_id');

            var incidentId = $("input[name=incident_id]").val();
            var url = "{{ route('salesorder', ":idIncidents") }}"

            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    console.log("Success " + data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection