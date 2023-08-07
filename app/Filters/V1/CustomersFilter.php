<?php
namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class CustomersFilter extends ApiFilter
{
    /**
     * Summary of safeParms
     * @var array
     */
    protected $safeParms = [
        'id' => ['eq','gt','lt'],
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt']
    ];

    /**
     * Summary of columnMap
     * @var array
     */
    protected $columnMap = [
        'postalCode' => 'postal_code'
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
        'gte' => '>='
    ];



}



