<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentStatus extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_rtblIncidentStatus';

    //protected $primaryKey = 'idIncidentStatus';

    protected $fillable = [
        'idIncidentStatus',
        'cDescription',
        '_rtblIncidentStatus_iBranchID',
        '_rtblIncidentStatus_dCreatedDate',
        '_rtblIncidentStatus_dModifiedDate',
        '_rtblIncidentStatus_iCreatedBranchID',
        '_rtblIncidentStatus_iModifiedBranchID',
        '_rtblIncidentStatus_iCreatedAgentID',
        '_rtblIncidentStatus_iModifiedAgentID',
        '_rtblIncidentStatus_iChangeSetID',
        '_rtblIncidentStatus_Checksum',
    ];
}