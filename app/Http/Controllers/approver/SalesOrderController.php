<?php

namespace App\Http\Controllers\approver;

use App\Models\InvNum;
use App\Models\InvoiceLine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesOrderController extends Controller
{
    public function display() {
        // $salesOrderDetails = InvoiceLine::select(
        //     'StkItem.Code as PartNumber',
        //     'InvNum.InvNumber as OrderNumber',
        //     'Warehouse.name as Warehouse',
        //     'InvoiceLine.fQuantity as Quantity',
        //     'InvoiceLine.CMR as CMR',
        //     'InvoiceLine.PMR as PMR',
        //     'StkItem.SerialItem as SerialNumber'
        // )
        // ->join('StkItem', 'InvoiceLine.iStockCodeID', '=', 'StkItem.StockLink')
        // ->join('InvNum', 'InvoiceLine.iInvoiceID', '=', 'InvNum.iInvoiceID')
        // ->join('Warehouse', 'InvoiceLine.iWarehouseID', '=', 'Warehouse.WarehouseID')
        // ->where('InvoiceLine.iInvoiceID', $salesOrderId) // Assuming you have a variable $salesOrderId containing the ID of the sales order
        // ->get();
    

        // $salesOrders = InvoiceLine::select(
        //     'Incident.dCreated',
        //     'Incident.dLastModified',
        //     'Incident.cOurRef',
        //     'Client.Name as ClientName',
        //     'IncidentStatus.cDescription as Status',
        //     'StkItem.Description_1 as ItemDescription',
        //     'InvoiceLine.fQuantity as Quantity',
        //     'InvoiceLine.fUnitPriceIncl as UnitPrice',
        //     'InvNum.InvNumber as InvoiceNumber'
        // )
        // ->join('Incident', 'InvoiceLine.iInvoiceID', '=', 'Incident.idIncidents')
        // ->join('Client', 'Incident.iDebtorID', '=', 'Client.DCLink')
        // ->join('IncidentStatus', 'Incident.iIncidentStatusID', '=', 'IncidentStatus.idIncidentStatus')
        // ->join('StkItem', 'Incident.iStockID', '=', 'StkItem.StockLink')
        // ->join('InvNum', 'InvoiceLine.iInvoiceID', '=', 'InvNum.iInvoiceID')
        // ->where('Incident.iIncidentTypeID', '38')
        // ->where('Incident.iIncidentStatusID', '1')
        // ->where('Incident.iCurrentAgentID', '183')
        // ->orderByDesc('Incident.dCreated')
        // ->take(20)
        // ->get();
    
    }   
}