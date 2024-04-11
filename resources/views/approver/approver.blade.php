@extends('layouts.app')
@include('layouts.nav-approver')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                {{-- <p class="mt-0">Department: {{ Auth::user()->department->department_name }}</p> --}}
            </div>
        </div>

        <div class="container-fluid mt-4">
            <table id="myTable" class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Incident</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach($incidents as $incident)
                    <tr>
                        <td>{{ $incident->idIncidents }}</td>
                        <td>{{ $incident->cOurRef }}</td>
                        <td>{{ $incident->cOutline }}</td>
                        <td>Completed</td>
                        <td>
                            <button type="button" id="viewApprovalButton" class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#viewApproval">
                                View
                            </button>
                        </td>
                    </tr>
                    @include('layouts.checkapprovals')
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
@endsection