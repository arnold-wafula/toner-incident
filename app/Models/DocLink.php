<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocLink extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = '_rtblDocLinks';

    protected $primaryKey = 'idDocLinks';

    protected $fillable = [
        'idDocLinks',
        'iDocStoreID',
        'iLinkSource',
        'iLinkID',
        '_rtblDocLinks_iBranchID',
        '_rtblDocLinks_dCreatedDate',
        '_rtblDocLinks_dModifiedDate',
        '_rtblDocLinks_iCreatedBranchID',
        '_rtblDocLinks_iModifiedBranchID',
        '_rtblDocLinks_iCreatedAgentID',
        '_rtblDocLinks_iModifiedAgentID',
        '_rtblDocLinks_iChangeSetID',
        '_rtblDocLinks_Checksum',
    ];
}