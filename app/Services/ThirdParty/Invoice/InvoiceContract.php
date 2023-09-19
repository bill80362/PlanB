<?php

namespace App\Services\ThirdParty\Invoice;

/**
 * 發票串接-界面
 */
interface InvoiceContract
{
    // 開立發票
    public function createInvoice(array $input);

    // 發票作廢
    public function cancelInvoice(array $input);

    // 發票折讓
    public function InvoiceDiscount(array $input);

    // 發票查詢
    public function queryInvoice(string $no);

    // 愛心碼查詢
    public function loveCodeQuery(string $code);

    // 手機載具查詢
    public function phoneCarrierQuery(string $code);
}
