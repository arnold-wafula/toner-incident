@extends('layouts.app')
@include('layouts.nav-approver')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #approvedTable tbody th,
    #approvedTable tbody td {
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
    .align-middle {
        vertical-align: middle !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6"> 
        </div>
    </div>

    <div class="container-fluid mt-4">
        <table id="approvedTable" class="table table-striped table-light">
            <thead>
                <tr>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Account Code</th>
                    <th>OrderNum</th>
                    <th>Customer</th>
                    <th>Incident</th> 
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="approvedTableBody">
                @foreach($incidents as $incident)
                <tr>
                    <td>{{ $incident->dCreated }}</td>
                    <td>{{ $incident->dLastModified }}</td>
                    <td>{{ $incident->AccountCode }}</td>
                    <td>{{ $incident->OrderNum }}</td>
                    <td>{{ $incident->ClientName }}</td>
                    <td>{{ $incident->cOurRef }}</td>
                    <td>{{ $incident->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#approvedTable').DataTable({
            "scrollY": "287px",
            "scrollCollapse": true,
            "paging": false,
            "columnDefs": [
                { "className": "align-middle", "targets": "_all" }
            ]
        });
    });
</script>