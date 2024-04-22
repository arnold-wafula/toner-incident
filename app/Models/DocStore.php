<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocStore extends Model
{
    use HasFactory;

    protected $connection ='sqlsrv';

    protected $table = '_rtblDocStore';

    protected $primaryKey = 'idDocStore';

    protected $fillable = [
        'idDocStore',
        'cDocStoreName',
        'cDocName',
        'iDocCatID',
        'cDocDescription',
        'dModified',
        'iAgentID',
        'nIcon',
        'bIsActive',
        '_rtblDocStore_iBranchID',
        '_rtblDocStore_dCreatedDate',
        '_rtblDocStore_dModifiedDate',
        '_rtblDocStore_iCreatedBranchID',
        '_rtblDocStore_iModifiedBranchID',
        '_rtblDocStore_iCreatedAgentID',
        '_rtblDocStore_iModifiedAgentID',
        '_rtblDocStore_iChangeSetID',
        '_rtblDocStore_Checksum',
    ];
}