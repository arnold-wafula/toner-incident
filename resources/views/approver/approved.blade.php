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
                @foreach($approvedIncidents as $aIncident)
                <tr>
                    <td>{{ $aIncident->dCreated }}</td>
                    <td>{{ $aIncident->dLastModified }}</td>
                    <td>{{ $aIncident->AccountCode }}</td>
                    <td>{{ $aIncident->OrderNum }}</td>
                    <td>{{ $aIncident->ClientName }}</td>
                    <td>{{ $aIncident->cOurRef }}</td>
                    <td style="color: #008000">{{ $aIncident->Status }}</td>
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
            "order" : [[0, 'DESC']],
            "columnDefs": [
                { "className": "align-middle", "targets": "_all" }
            ]
        });
    });
</script>