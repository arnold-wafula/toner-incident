<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentSourceDocLink extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_etblIncidentSourceDocLinks';

    protected $primaryKey = 'iSourceDocID';

    protected $fillable = [
        'idIncidentSourceDocLinks',
        'iIncidentID',
        'iSourceDocID',
        '_etblIncidentSourceDocLinks_iBranchID',
        '_etblIncidentSourceDocLinks_dCreatedDate',
        '_etblIncidentSourceDocLinks_dModifiedDate',
        '_etblIncidentSourceDocLinks_iCreatedBranchID',
        '_etblIncidentSourceDocLinks_iModifiedBranchID',
        '_etblIncidentSourceDocLinks_iCreatedAgentID',
        '_etblIncidentSourceDocLinks_iModifiedAgentID',
        '_etblIncidentSourceDocLinks_iChangeSetID',
        '_etblIncidentSourceDocLinks_Checksum',
    ];
}