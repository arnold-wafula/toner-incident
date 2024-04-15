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
            '_rtblIncidentStatus.cDescription as Status'
        )
        ->join('Client', '_rtblIncidents.iDebtorID', '=', 'Client.DCLink')
        ->join('_rtblIncidentStatus', '_rtblIncidents.iIncidentStatusID', '=', '_rtblIncidentStatus.idIncidentStatus')
        ->where('_rtblIncidents.iIncidentTypeID', '38')
        ->where('_rtblIncidents.iIncidentStatusID', '1')
        ->orderByDesc('_rtblIncidents.dCreated')
        ->take(10)
        ->get();

        return view('approver/approver', compact('incidents'));
    }

    // Request $request, 
    public function salesOrder(Request $request, $incidentId) {
        $salesorders = InvoiceLine::select(
            '_rtblIncidents.cOurRef',
            '_rtblIncidents.cOutline',
            'InvNum.OrderNum',
            '_btblInvoiceLines.fQuantity',
            //'_btblInvoiceLines.ucIDSOrdTxCMServiceAsset as SerialNumber',
            '_btblInvoiceLines.uiIDSOrdTxCMCurrReading as MonoCMR',
            '_btblInvoiceLines.uiIDSOrdTxCMPrevReading as MonoPMR',
            '_btblInvoiceLines.uiIDSOrdTxCMCurrReadingCol as ColoCMR',
            '_btblInvoiceLines.uiIDSOrdTxCMPrevReadingCol as ColoPMR',
            'WhseMst.Code as Warehouse',
            'StkItem.Code as PartNumber',
            'StkItem.Description_1 as ItemDescription'
        )
        ->join('InvNum', 'InvNum.AutoIndex', '=', '_btblInvoiceLines.iInvoiceID')
        ->join('WhseMst', 'WhseMst.WhseLink', '=', '_btblInvoiceLines.iWarehouseID')
        ->join('StkItem', 'StkItem.StockLink', '=', '_btblInvoiceLines.iStockCodeID')
        ->join('_etblIncidentSourceDocLinks', '_etblIncidentSourceDocLinks.iSourceDocID', '=', 'InvNum.AutoIndex')
        ->join('_rtblIncidents', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
        ->where('cOurRef', $incidentId) // AutoIndex //iInvoiceID
        ->take(20)
        ->get();

        dd($salesorders);

        return response()->json(['sales orders' => $salesorders]);
    }

    // Function called when the approver clicks the approve button
    public function approve() {
        
    }

    // Function called when the approver clicks the reject button
    public function reject() {

    }
}