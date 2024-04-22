<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentAction extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_rtblIncidentAction';

    protected $primaryKey = 'idIncidentAction';

    protected $fillable = [
        'idIncidentAction',
        'cDescription',
        'cPDescription',
        '_rtblIncidentAction_iBranchID',
        '_rtblIncidentAction_dCreatedDate',
        '_rtblIncidentAction_dModifiedDate',
        '_rtblIncidentAction_iCreatedBranchID',
        '_rtblIncidentAction_iModifiedBranchID',
        '_rtblIncidentAction_iCreatedAgentID',
        '_rtblIncidentAction_iModifiedAgentID',
        '_rtblIncidentAction_iChangeSetID',
        '_rtblIncidentAction_Checksum',
    ];
}