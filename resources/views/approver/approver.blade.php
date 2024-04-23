@extends('layouts.app')
@include('layouts.nav-approver')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #incidentTable tbody th,
    #incidentTable tbody td {
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
        <table id="incidentTable" class="table table-striped table-light">
            <thead>
                <tr>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Account Code</th>
                    <th>OrderNum</th>
                    <th>Customer</th>
                    <th>Incident</th> 
                    <th>Status</th>
                    <th>Doc</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="incidentTableBody">
                @foreach($incidents as $incident)
                <tr>
                    <td>{{ $incident->dCreated }}</td>
                    <td>{{ $incident->dLastModified }}</td>
                    <td>{{ $incident->AccountCode }}</td>
                    <td>{{ $incident->OrderNum }}</td>
                    <td>{{ $incident->ClientName }}</td>
                    <td>{{ $incident->cOurRef }}</td>
                    <td>{{ $incident->Status }}</td>
                    <td>
                        <a href="{{ route('download', $incident->Document) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                    </td>
                    <td>
                        <a 
                           class="btn btn-success btn-sm salesOrderButton" 
                           data-id="{{ $incident->OrderNum }}"
                           data-toggle="modal" 
                           data-target="#salesOrderModal{{ $incident->idIncidents }}">
                           View
                        </a>
                        @include('layouts.salesordermodal')
                    </td>
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
        $('#incidentTable').DataTable({
            "scrollY": "287px",
            "scrollCollapse": true,
            "paging": false,
            "columnDefs": [
                { "className": "align-middle", "targets": "_all" }
            ]
        });
    });
</script>
<script>
    $('.salesOrderButton').click(function () {
        var orderNumber = $(this).data("id");
                      
        $.ajax({
            url: "{{ route('salesorder')}}",
                type: "POST",
                dataType:'json',
                data: { "orderNumber": orderNumber, "_token":"{{csrf_token()}}" },
                success: function(data) {
                    console.log(data);

                    $('#cname').text(data[0].ClientName);
                    $('#ordernum').text(data[0].OrderNum);
                    $('#serialno').text(data[0].SerialNumber);
                    $('#date').text(data[0].dCreated);

                    // Loop through data and populate table rows
                    $('#orderTableBody').empty();
                    var count = 1;
                    if (data.length > 0) {
                        $.each(data, function(index, item) {
                            var monoCMR = parseInt(item.MonoCMR);
                            var monoPMR = parseInt(item.MonoPMR);
                            var colocmr = parseInt(item.ColoCMR);
                            var colopmr = parseInt(item.ColoPMR);

                            var monoDiff = calcMonoDiff(monoCMR, monoPMR);
                            var coloDiff = calcColorDiff(colocmr, colopmr);

                            var copiesdone = parseFloat(monoDiff);
                            var yield = parseFloat(item.Yield);

                            var consumption = calcConsumption(copiesdone, yield);

                            var row = "<tr>" +
                                "<td>" + count + "</td>" +
                                "<td>" + item.ItemDescription + "</td>" +
                                "<td>" + item.MonoCMR + "</td>" +
                                "<td>" + item.MonoPMR + "</td>" +
                                "<td>" + monoDiff + "</td>" +
                                "<td>" + item.ColoCMR + "</td>" +
                                "<td>" + item.ColoPMR + "</td>" +
                                "<td>" + coloDiff + "</td>" +
                                "<td>" + item.Yield + "</td>" +
                                "<td" + (parseFloat(consumption) < 80 ? ' style="border: 2px solid red;"' : ' style="border: 2px solid green;"') + ">" + consumption + "</td>" +
                                "</tr>";
                            $('#orderTableBody').append(row);
                            count++;
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
</script>
<script>
    function calcMonoDiff(monocmr, monopmr) {
        var monoDiff = 0;

        if (!isNaN(monocmr) && !isNaN(monopmr)) { var monoDiff = monocmr - monopmr; }

        return monoDiff;
    }

    function calcColorDiff(colocmr, colopmr) {
        var coloDiff = 0;

        if (!isNaN(colocmr) && !isNaN(colopmr)) { var coloDiff = colocmr - colopmr; }

        return coloDiff;
    }

    function calcConsumption(monoDiff, yield) {
        var consumption = ((monoDiff / yield) * 100).toFixed(2) + "%"; // Fixed the syntax error here
        return consumption;
    }
</script>
<script>
    $(document).ready(function() {
        $('#reject').click(function() {
            alert('Reject');
        });

        $('.approve-btn').click(function(e) {
            e.preventDefault();

            var incidentId = $(this).data("id");
            console.log("Incident ID:", incidentId);

            $.ajax({
                url: "{{ route('approve') }}",
                type: "POST",
                dataType: "json",
                data: { "incident_id": incidentId, "_token":"{{csrf_token()}}" },
                success: function(data) {
                    console.log("Success:", data);
                    
                    $('.flash-message').html('<div class="alert alert-success">Incident approved successfully!</div>').show();
                    $('#salesOrderModal{{ $incident->idIncidents }}').animate({ scrollTop: 0 }, 'fast');
                    setTimeout(function() {
                        $('.flash-message').fadeOut('slow');
                    }, 3000);
                    
                    $('#salesOrderModal{{ $incident->idIncidents }}').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);

                    $('.flash-message').html('<div class="alert alert-success">Error approving incident. Please try again!</div>').show();
                    $('#salesOrderModal{{ $incident->idIncidents }}').animate({ scrollTop: 0 }, 'fast'); // Scroll to top of modal
                    setTimeout(function() {
                        $('.flash-message').fadeOut('slow'); // Hide flash message after 3 seconds
                    }, 3000); // 3000 milliseconds (3 seconds)
                    $('#salesOrderModal{{ $incident->idIncidents }}').modal('hide');
                }
            });
        });
    });
</script>
@endsection