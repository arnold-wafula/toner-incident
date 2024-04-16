<?php

namespace App\Http\Controllers\approver;

use App\Models\Incident;
use App\Models\InvoiceLine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    // Displays the incident details on the Data table
    public function index() {
        $incidents = Incident::select(
            '_rtblIncidents.dCreated',
            '_rtblIncidents.dLastModified',
            '_rtblIncidents.cOurRef',
            'Client.Name as ClientName',
            '_rtblIncidentStatus.cDescription as Status',
            'OrderNum'
        )
        ->join('Client', '_rtblIncidents.iDebtorID', '=', 'Client.DCLink')
        ->join('_rtblIncidentStatus', '_rtblIncidents.iIncidentStatusID', '=', '_rtblIncidentStatus.idIncidentStatus')
        
        ->join('_etblIncidentSourceDocLinks', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID') // Join with the source doc links table
        ->join('InvNum', 'InvNum.AutoIndex', '=', '_etblIncidentSourceDocLinks.iSourceDocID') // Join with the invoice numbers table


        ->where('_rtblIncidents.iIncidentTypeID', '38')
        //->where('_rtblIncidents.iIncidentStatusID', '2') // 1 - not started 2 - in progress 3 - completed
        
        //->whereNotNull('_etblIncidentSourceDocLinks.iIncidentID')
        //->where('_rtblIncidents.cOutline', 'Toner Delivery')
        
        ->orderByDesc('_rtblIncidents.dCreated')
        ->limit(100)
        ->get();

        // Filter incidents with associated sales orders
        // $filteredIncidents = $incidents->filter(function ($incident) {
        //     $salesOrderCount = InvoiceLine::where('_etblIncidentSourceDocLinks.iIncidentID', $incident->idIncidents)->count();
        //     return $salesOrderCount > 0;
        // });

        return view('approver/approver', compact('incidents'));
    }

    // Request $request, 
    public function salesOrder(Request $request, $incidentId) {
        // Fetch sales order details based on the incidentId

        //dd('Reached sales order method');

        $incidentId = (int) $request->input('incident_id');

        $salesorders = InvoiceLine::select(
            '_rtblIncidents.cOurRef',
            '_rtblIncidents.cOutline',
            'InvNum.OrderNum',
            '_btblInvoiceLines.fQuantity',
            //'_btblInvoiceLines.ucIDSOrdTxCMServiceAsset as SerialNumber', // ALERT!!
            '_btblInvoiceLines.uiIDSOrdTxCMCurrReading as MonoCMR',
            '_btblInvoiceLines.uiIDSOrdTxCMPrevReading as MonoPMR',
            '_btblInvoiceLines.uiIDSOrdTxCMCurrReadingCol as ColoCMR',
            '_btblInvoiceLines.uiIDSOrdTxCMPrevReadingCol as ColoPMR',
            '_btblInvoiceLines.cLineNotes as LineNotes',
            'WhseMst.Code as Warehouse',
            'StkItem.Code as PartNumber',
            'StkItem.Description_1 as ItemDescription'
        )
        ->join('InvNum', 'InvNum.AutoIndex', '=', '_btblInvoiceLines.iInvoiceID')
        ->join('WhseMst', 'WhseMst.WhseLink', '=', '_btblInvoiceLines.iWarehouseID')
        ->join('StkItem', 'StkItem.StockLink', '=', '_btblInvoiceLines.iStockCodeID')
        ->join('_etblIncidentSourceDocLinks', '_etblIncidentSourceDocLinks.iSourceDocID', '=', 'InvNum.AutoIndex')
        ->join('_rtblIncidents', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
        ->where('iIncidentID', $incidentId) // AutoIndex //iInvoiceID //idIncidents
        // ->take(1)
        ->get();

        if ($salesorders->isEmpty()) {
            return response()->json(['error' => 'Sales orders not found for the given incident ID'], 404);
        }

        //dd($salesorders);

        return response()->json(['sales orders' => $salesorders]);
    }

    // Function called when the approver clicks the approve button
    public function approve() {
        
    }

    // Function called when the approver clicks the reject button
    public function reject() {

    }
}