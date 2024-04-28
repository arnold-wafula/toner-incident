<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_rtblIncidents';

    protected $primaryKey = 'idIncidents';

    protected $fillable = [
        'idIncidents',
        'dCreated',
        'dLastModified',
        'iClassID',
        'iIncidentStatusID',
        'bRequireAck',
        'iDebtorID',
        'iPersonID',
        'iIncidentCatID',
        'cOurRef',
        'cYourRef',
        'cOutline',
        'iPriorityID',
        'iEscalateGrpID',
        'iAgentGroupID',
        'iCurrentAgentID',
        'iContractTxID',
        'iStockID',
        'iPrivNode',
        'iIncidentTypeID',
        'dDueBy',
        'iDuration',
        'iContractID',
        'cChangeLog',
        'iIncidentTypeGroupID',
        'iWorkflowID',
        'iWorkflowStatusID',
        'bHasBeenRejected',
        'iSupplierID',
        'iFixedAssetID',
        'iEmployeeID',
        'iProjectID',
        'iJobCostingID',
        'iProspectID',
        'iOpportunityID',
        'iPOInvoiceID',
        'bPOViewed',
        'iRequisitionID',
        'iLinkID',
        'iRfqID',
        'iSIMReqID',
        '_rtblIncidents_iBranchID',
        '_rtblIncidents_dCreatedDate',
        '_rtblIncidents_dModifiedDate',
        '_rtblIncidents_iCreatedBranchID',
        '_rtblIncidents_iModifiedBranchID',
        '_rtblIncidents_iCreatedAgentID',
        '_rtblIncidents_iModifiedAgentID',
        '_rtblIncidents_iChangeSetID',
        '_rtblIncidents_Checksum',
        'iPmtRecId',
        'iJrBatchId',
    ];

    public $timestamps = false;

    public function status() {
        return $this->belongsTo(IncidentStatus::class, 'iIncidentStatusID', 'idIncidentStatus');
    }

    // public function client() {
    //     return $this->belongsTo(Client::class, 'iDebtorID', 'DCLink');
    // }

    public function invNum() {
        return $this->belongsTo(InvNum::class, 'iCurrentAgentID', 'iINVNUMAgentID');
    }
}