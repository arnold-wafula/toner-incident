<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = 'WhseMst';

    protected $primaryKey = 'WhseLink';

    protected $fillable = [
        'WhseLink',
        'Code',
        'Name',
        'KnownAs',
        'Address1',
        'Address2',
        'Address3',
        'PostCode',
        'Tel',
        'Manager',
        'BankLink',
        'BranchCode',
        'BankAccNum',
        'BankAccType',
        'EMail',
        'ModemTel',
        'DefaultWhse',
        'AddNewStock',
        'dWarehouseTimeStamp',
        'iWhseTypeID',
        'bAllowToBuyInto',
        'bAllowToSellFrom',
        'bAllowNegStock',
        'WhseMst_iBranchID',
        'WhseMst_dCreatedDate',
        'WhseMst_dModifiedDate',
        'WhseMst_iCreatedBranchID',
        'WhseMst_iModifiedBranchID',
        'WhseMst_iCreatedAgentID',
        'WhseMst_iModifiedAgentID',
        'WhseMst_iChangeSetID',
        'WhseMst_Checksum',
        'iDefaultItemGroupID',
        'bAllowMultiBinLocations',
        'bUseDefaultBinLevels',
        'iDefaultWhseSalesBinID',
        'iDefaultWhsePurchaseBinID',
    ];
}