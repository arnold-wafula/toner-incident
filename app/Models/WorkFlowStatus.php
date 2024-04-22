<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFlowStatus extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_btblCMWorkflowStatus';

    protected $primaryKey = 'idWorkflowStatus';

    protected $fillable = [
        'idWorkflowStatus',
        'cStatusCode',
        'cDescription',
        '_btblCMWorkflowStatus_iBranchID',
        '_btblCMWorkflowStatus_dCreatedDate',
        '_btblCMWorkflowStatus_dModifiedDate',
        '_btblCMWorkflowStatus_iCreatedBranchID',
        '_btblCMWorkflowStatus_iModifiedBranchID',
        '_btblCMWorkflowStatus_iCreatedAgentID',
        '_btblCMWorkflowStatus_iModifiedAgentID',
        '_btblCMWorkflowStatus_iChangeSetID',
        '_btblCMWorkflowStatus_Checksum',
    ];
}