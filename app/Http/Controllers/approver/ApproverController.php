<?php

namespace App\Http\Controllers\approver;

use finfo;
use App\Models\Incident;
use App\Models\InvoiceLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApproverController extends Controller
{
    // Displays the incident details on the Data table
    public function index() {

        $incidents = Incident::select(
            '_rtblIncidents.idIncidents as incidentId',
            '_rtblIncidents.dCreated',
            '_rtblIncidents.dLastModified',
            'Client.Account as AccountCode',
            'OrderNum',
            'Client.Name as ClientName',
            '_rtblIncidents.cOurRef',
            '_rtblDocStore.cDocStoreName as Document', //added
            '_rtblIncidentStatus.cDescription as Status'
        ) 
        ->join('_etblIncidentSourceDocLinks', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
        ->join('InvNum', 'InvNum.AutoIndex', '=', '_etblIncidentSourceDocLinks.iSourceDocID')

        ->leftjoin('_rtblDocLinks', '_rtblIncidents.idIncidents', '=', '_rtblDocLinks.iLinkID')
        ->leftjoin('_rtblDocStore', '_rtblDocLinks.iDocStoreID', '=', '_rtblDocStore.idDocStore')
        
        ->join('Client', '_rtblIncidents.iDebtorID', '=', 'Client.DCLink')
        ->join('_rtblIncidentStatus', '_rtblIncidents.iIncidentStatusID', '=', '_rtblIncidentStatus.idIncidentStatus')
        
        ->where('_rtblIncidents.iIncidentTypeID', '38') // TONER INCIDENTS ONLY
        ->where('_rtblIncidents.iCurrentAgentID', '183') // SHILPA'S AGENT ID
        ->where('_rtblIncidents.iWorkflowStatusID', '82') // BIL-APP

        ->where('_rtblIncidentStatus.idIncidentStatus', [1]) // NOT STARTED
        
        ->orderByDesc('_rtblIncidents.dCreated') // MOST RECENT DATE CREATED
        ->limit(10)
        ->get();

        return view('approver/approver', compact('incidents'));
    }

    public function salesOrder(Request $request) {
        $salesorders = InvoiceLine::select(
            '_rtblIncidents.cOurRef',
            '_rtblIncidents.cOutline',
            'InvNum.OrderNum',
            '_btblInvoiceLines.ucIDSOrdTxCMServiceAsset as SerialNumber',
            '_btblInvoiceLines.uiIDSOrdTxCMCurrReading as MonoCMR',
            '_btblInvoiceLines.uiIDSOrdTxCMPrevReading as MonoPMR',
            '_btblInvoiceLines.uiIDSOrdTxCMCurrReadingCol as ColoCMR',
            '_btblInvoiceLines.uiIDSOrdTxCMPrevReadingCol as ColoPMR',
            'StkItem.uiIIStYield as Yield',
            'StkItem.Description_1 as ItemDescription',
            'Client.Name as ClientName',
            '_rtblIncidents.dCreated',
        )
        ->join('InvNum', 'InvNum.AutoIndex', '=', '_btblInvoiceLines.iInvoiceID')
        ->join('StkItem', 'StkItem.StockLink', '=', '_btblInvoiceLines.iStockCodeID')
        ->join('_etblIncidentSourceDocLinks', '_etblIncidentSourceDocLinks.iSourceDocID', '=', 'InvNum.AutoIndex')
        ->join('_rtblIncidents', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
        
        ->join('Client', '_rtblIncidents.iDebtorID', '=', 'Client.DCLink')
        ->join('_rtblIncidentStatus', '_rtblIncidents.iIncidentStatusID', '=', '_rtblIncidentStatus.idIncidentStatus')
        
        ->where('InvNum.OrderNum', $request->orderNumber)
        ->get();

        if (!$salesorders) {
            return response()->json(['error' => 'Sales order not found for that Order Number'], 404);
        }
    
        return response()->json($salesorders);
    }

    public function download($filename) {
        // Construct the full network path to the file
        $networkPath = '\\\\192.168.180.126\\EvoBICMetaData\\Documents\\' . $filename;
    
        if (file_exists($networkPath)) {
            // Create a fileinfo resource
            $fileInfo = new finfo(FILEINFO_MIME_TYPE);
    
            // Determine the MIME type of the file
            $contentType = $fileInfo->file($networkPath);
    
            // Set the content disposition based on content type
            $disposition = strpos($contentType, 'image/') === 0 || $contentType === 'application/pdf' ? 'inline' : 'attachment';
    
            // Determine the file extension based on MIME type
            $extension = $this->getExtensionFromMimeType($contentType);
    
            // Fetch file content
            $fileContent = file_get_contents($networkPath);
    
            // Return the file as a download response
            return response($fileContent, 200, [
                'Content-Type' => $contentType,
                'Content-Disposition' => $disposition . '; filename="' . $filename . ($extension ? '.' . $extension : '') . '"'
            ]);
        } else {
            // File not found on the network, return error response
            return response()->json(['error' => 'File not found'], 404);
        }
    }
    
    private function getExtensionFromMimeType($mimeType) {
        // Define a mapping of MIME types to file extensions
        $mimeExtensions = [
            'application/vnd.ms-outlook' => 'msg',
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
        ];
    
        // Check if the MIME type exists in the mapping
        if (array_key_exists($mimeType, $mimeExtensions)) {
            return $mimeExtensions[$mimeType];
        }
    
        // Default to empty string if no mapping is found
        return '';
    }

    // Function called when the approver clicks the approve button
    // Change the Workflow status from 82 (BIL-App) to 11 (Delivery)
    // Return the incident back to the Agent ID and assign the incident id
    public function approve(Request $request) {
        // Incident ID from the request
        $incidentId = $request->incident_id;
        $incident = Incident::find($incidentId);

        //$orderNumber = $request->order_number;

        dd($incidentId);
        
        //dd($orderNumber);

        $agentId = DB::table('_rtblIncidents')
            ->join('_etblIncidentSourceDocLinks', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
            ->join('InvNum', 'InvNum.AutoIndex', '=', '_etblIncidentSourceDocLinks.iSourceDocID')
            ->where('idIncidents','=',$incident->incidentId)
            ->select('iINVNUMAgentID')
            ->first();

        //dd($agentId);

        // Update the WorkflowStatusID to 11
        $incident->iWorkflowStatusID = 11;

        // Change the status to In Progress (2)
        $incident->iIncidentStatusID = 2;

        // Assign back the incident to the agentId
        $incident->iCurrentAgentID = $agentId->iINVNUMAgentID;

        //dd($incident->iCurrentAgentID);

        $incident->save();

        return response()->json(['message' => 'Incident approved successfully', 'incident' => $incident]);
    }

    // Function called when the approver clicks the reject button
    public function reject(Request $request) {
        // Incident ID from the request
        $incidentId = $request->incident_id;
        $incident = Incident::find($incidentId);

        //$orderNumber = $request->order_number;

        dd($incidentId);

        $agentId = DB::table('_rtblIncidents')
            ->join('_etblIncidentSourceDocLinks', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
            ->join('InvNum', 'InvNum.AutoIndex', '=', '_etblIncidentSourceDocLinks.iSourceDocID')
            ->where('idIncidents','=',$incident->idIncidents)
            ->select('iINVNUMAgentID')
            ->first();

        //dd($agentId);

        // Assign back the incident to the agentId
        $incident->iCurrentAgentID = $agentId->iINVNUMAgentID;

        //dd($incident->iCurrentAgentID);

        $incident->save();

        return response()->json(['message' => 'Incident rejected successfully', 'incident' => $incident]);
    }

    public function approved() {
        $approvedIncidents = Incident::select(
            '_rtblIncidents.dCreated',
            '_rtblIncidents.dLastModified',
            'Client.Account as AccountCode',
            'OrderNum',
            'Client.Name as ClientName',
            '_rtblIncidents.cOurRef',
            '_rtblDocStore.cDocStoreName as Document',
            '_rtblIncidentStatus.cDescription as Status',
            '_rtblIncidents.idIncidents as incidentId',
        )
        ->join('Client', '_rtblIncidents.iDebtorID', '=', 'Client.DCLink')
        ->join('_rtblIncidentStatus', '_rtblIncidents.iIncidentStatusID', '=', '_rtblIncidentStatus.idIncidentStatus')
        ->join('_etblIncidentSourceDocLinks', '_rtblIncidents.idIncidents', '=', '_etblIncidentSourceDocLinks.iIncidentID')
        ->join('InvNum', 'InvNum.AutoIndex', '=', '_etblIncidentSourceDocLinks.iSourceDocID')
        ->join('_rtblDocLinks', '_rtblIncidents.idIncidents', '=', '_rtblDocLinks.iLinkID')
        ->join('_rtblDocStore', '_rtblDocLinks.iDocStoreID', '=', '_rtblDocStore.idDocStore')
        ->where('_rtblIncidents.iIncidentTypeID', '38')
        ->where('_rtblIncidentStatus.idIncidentStatus', [2])
        ->where('_rtblIncidents.iWorkflowStatusID', '11')
        ->orderByDesc('_rtblIncidents.dCreated')
        ->distinct()
        ->limit(10)
        ->get();

        return view('approver/approved', compact('approvedIncidents'));
    }
}