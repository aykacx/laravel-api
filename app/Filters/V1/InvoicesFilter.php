<?php
namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class InvoicesFilter extends ApiFilter
{
    /**
     * Summary of safeParms
     * @var array
     */
    protected $safeParms = [
        'customerId' => ['eq','gt'],
        'amount' => ['eq','lt','gt','lte','gte'],
        'status' => ['eq','ne'],
        'billedDate' => ['eq','lt','gt','lte','gte'],
        'paidDate' => ['eq','lt','gt','lte','gte','ne']
    ];

    /**
     * Summary of columnMap
     * @var array
     */
    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    /**
     * Summary of operatorMap
     * @var array
     */
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];


}



