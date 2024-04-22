<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = 'Client';

    protected $primaryKey = 'DCLink';

    protected $fillable = [
        'DCLink',
        'Account',
        'Name',
        'Title',
        'Init',
        'Contact_Person',
        'Physical1',
        'Physical2',
        'Physical3',
        'Physical4',
        'Physical5',
        'PhysicalPC',
        'Addressee',
        'Post1',
        'Post2',
        'Post3',
        'Post4',
        'Post5',
        'PostPC',
        'Delivered_To',
        'Telephone',
        'Telephone2',
        'Fax1',
        'Fax2',
        'AccountTerms',
        'CT',
        'Tax_Number',
        'Registration',
        'Credit_Limit',
        'RepID',
        'Interest_Rate',
        'Discount',
        'On_Hold',
        'BFOpenType',
        'EMail',
        'BankLink',
        'BranchCode',
        'BankAccNum',
        'BankAccType',
        'AutoDisc',
        'DiscMtrxRow',
        'MainAccLink',
        'CashDebtor',
        'DCBalance',
        'CheckTerms',
        'UseEmail',
        'iIncidentTypeID',
        'iBusTypeID',
        'iBusClassID',
        'iCountryID',
        'iAgentID',
        'dTimeStamp',
        'cAccDescription',
        'cWebPage',
        'iClassID',
        'iAreasID',
        'cBankRefNr',
        'iCurrencyID',
        'bStatPrint',
        'bStatEmail',
        'cStatEmailPass',
        'bForCurAcc',
        'fForeignBalance',
        'bTaxPrompt',
        'iARPriceListNameID',
        'iSettlementTermsID',
        'bSourceDocPrint',
        'bSourceDocEmail',
        'iEUCountryID',
        'iDefTaxTypeID',
        'bCODAccount',
        'iAgeingTermID',
        'bElecDocAcceptance',
        'iBankDetailType',
        'cBankAccHolder',
        'cIDNumber',
        'cPassportNumber',
        'bInsuranceCustomer',
        'cBankCode',
        'cSwiftCode',
        'Client_iBranchID',
        'Client_dCreatedDate',
        'Client_dModifiedDate',
        'Client_iCreatedBranchID',
        'Client_iModifiedBranchID',
        'Client_iCreatedAgentID',
        'Client_iModifiedAgentID',
        'Client_iChangeSetID',
        'Client_Checksum',
        'ubARIsOrderNumRequired',
        'ulARAmoebaHead',
        'udARContractStartDate',
        'udARContractEndDate',
        'ulARJointSeparateBill',
        'iSPQueueID',
        'bCustomerZoneEnabled',
        'udARCustomerCreationDate',
        'ulARRegionGroup',
        'ulARRegionArea',
        'iTaxState',
        'ucARTaxHSCode',
        'bOnlineToolsEnabled',
        'bTaxVerified',
        'dDateTaxVerified',
        'bBadDebtRelief',
        'bObjectToProcess',
        'bStatEmailPeople',
        'bSourceDocEmailPeople',
        'iTaxCountryID',
    ];

    public function invoicelines() {
        return $this->hasMany(InvoiceLine::class, 'DCLink', 'iStockCodeID');
    }
}