<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvNum extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = 'InvNum';

    protected $primaryKey = 'AutoIndex';

    protected $fillable = [
        'AutoIndex',
        'DocType',
        'DocVersion',
        'DocState',
        'DocFlag',
        'OrigDocID',
        'InvNumber',
        'GrvNumber',
        'GrvID',
        'AccountID',
        'Description',
        'InvDate',
        'OrderDate',
        'DueDate',
        'DeliveryDate',
        'TaxInclusive',
        'Email_Sent',
        'Address1',
        'Address2',
        'Address3',
        'Address4',
        'Address5',
        'Address6',
        'PAddress1',
        'PAddress2',
        'PAddress3',
        'PAddress4',
        'PAddress5',
        'PAddress6',
        'DelMethodID',
        'DocRepID',
        'OrderNum',
        'DeliveryNote',
        'InvDisc',
        'InvDiscReasonID',
        'Message1',
        'Message2',
        'Message3',
        'ProjectID',
        'TillID',
        'POSAmntTendered',
        'POSChange',
        'GrvSplitFixedCost',
        'GrvSplitFixedAmnt',
        'OrderStatusID',
        'OrderPriorityID',
        'ExtOrderNum',
        'ForeignCurrencyID',
        'InvDiscAmnt',
        'InvDiscAmntEx',
        'InvTotExclDEx',
        'InvTotTaxDEx',
        'InvTotInclDEx',
        'InvTotExcl',
        'InvTotTax',
        'InvTotIncl',
        'OrdDiscAmnt',
        'OrdDiscAmntEx',
        'OrdTotExclDEx',
        'OrdTotTaxDEx',
        'OrdTotInclDEx',
        'OrdTotExcl',
        'OrdTotTax',
        'OrdTotIncl',
        'bUseFixedPrices',
        'iDocPrinted',
        'iINVNUMAgentID',
        'fExchangeRate',
        'fGrvSplitFixedAmntForeign',
        'fInvDiscAmntForeign',
        'fInvDiscAmntExForeign',
        'fInvTotExclDExForeign',
        'fInvTotTaxDExForeign',
        'fInvTotInclDExForeign',
        'fInvTotExclForeign',
        'fInvTotTaxForeign',
        'fInvTotInclForeign',
        'fOrdDiscAmntForeign',
        'fOrdDiscAmntExForeign',
        'fOrdTotExclDExForeign',
        'fOrdTotTaxDExForeign',
        'fOrdTotInclDExForeign',
        'fOrdTotExclForeign',
        'fOrdTotTaxForeign',
        'fOrdTotInclForeign',
        'cTaxNumber',
        'cAccountName',
        'iProspectID',
        'iOpportunityID',
        'InvTotRounding',
        'OrdTotRounding',
        'fInvTotForeignRounding',
        'fOrdTotForeignRounding',
        'bInvRounding',
        'iInvSettlementTermsID',
        'cSettlementTermInvMsg',
        'iOrderCancelReasonID',
        'iLinkedDocID',
        'bLinkedTemplate',
        'InvTotInclExRounding',
        'OrdTotInclExRounding',
        'fInvTotInclForeignExRounding',
        'fOrdTotInclForeignExRounding',
        'iEUNoTCID',
        'iPOAuthStatus',
        'iPOIncidentID',
        'iSupervisorID',
        'iMergedDocID',
        'iDocEmailed',
        'fDepositAmountForeign',
        'fRefundAmount',
        'bTaxPerLine',
        'fDepositAmountTotal',
        'fDepositAmountUnallocated',
        'fDepositAmountNew',
        'fDepositAmountTotalForeign',
        'fDepositAmountUnallocatedForeign',
        'fRefundAmountForeign',
        'KeepAsideCollectionDate',
        'KeepAsideExpiryDate',
        'cContact',
        'cTelephone',
        'cFax',
        'cEmail',
        'cCellular',
        'imgOrderSignature',
        'iInsuranceState',
        'cAuthorisedBy',
        'cClaimNumber',
        'cPolicyNumber',
        'dIncidentDate',
        'cExcessAccName',
        'cExcessAccCont1',
        'cExcessAccCont2',
        'fExcessAmt',
        'fExcessPct',
        'fExcessExclusive',
        'fExcessInclusive',
        'fExcessTax',
        'fAddChargeExclusive',
        'fAddChargeTax',
        'fAddChargeInclusive',
        'fAddChargeExclusiveForeign',
        'fAddChargeTaxForeign',
        'fAddChargeInclusiveForeign',
        'fOrdAddChargeExclusive',
        'fOrdAddChargeTax',
        'fOrdAddChargeInclusive',
        'fOrdAddChargeExclusiveForeign',
        'fOrdAddChargeTaxForeign',
        'fOrdAddChargeInclusiveForeign',
        'iInvoiceSplitDocID',
        'cGIVNumber',
        'bIsDCOrder',
        'iDCBranchID',
        'iSalesBranchID',
        'InvNum_iBranchID',
        'InvNum_dCreatedDate',
        'InvNum_dModifiedDate',
        'InvNum_iCreatedBranchID',
        'InvNum_iModifiedBranchID',
        'InvNum_iCreatedAgentID',
        'InvNum_iModifiedAgentID',
        'InvNum_iChangeSetID',
        'InvNum_Checksum',
        'bIDFProccessed',
        'iImportDeclarationID',
        'bSBSI',
        'cPermitNumber',
        'iStateID',
        'iCancellationReasonID',
        'cDPOrdServiceTaskNo',
        'cDSOrdServiceTaskNo',
        'cDCrnServiceTaskNo',
        'cDSMExtOrderNum',
        'cHash',
        'cRevenueIntegration',
    ];

    public function incident() {
        return $this->hasOne(Incident::class, 'iINVNUMAgentID', 'iCurrentAgentID');
    }
}