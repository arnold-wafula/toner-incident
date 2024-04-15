<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentType extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_rtblIncidentType';

    //protected $primaryKey = 'idIncidentType';

    protected $fillable = [
        'idIncidentType',
        'cDescription',
        'iEscGroupID',
        'bAllowOverride',
        'bRequireContract',
        'iIncidentTypeGroupID',
        'iWorkflowID',
        'bAllowOverrideIncidentType',
        'bPOIncidentType',
        'cDefaultOutline',
        'bActive',
        '_rtblIncidentType_iBranchID',
        '_rtblIncidentType_dCreatedDate',
        '_rtblIncidentType_dModifiedDate',
        '_rtblIncidentType_iCreatedBranchID',
        '_rtblIncidentType_iModifiedBranchID',
        '_rtblIncidentType_iCreatedAgentID',
        '_rtblIncidentType_iModifiedAgentID',
        '_rtblIncidentType_iChangeSetID',
        '_rtblIncidentType_Checksum',
    ];
}