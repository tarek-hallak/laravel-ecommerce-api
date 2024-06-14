<?php
namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter {

    protected $safePrams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'city' => ['eq'],
        'address' => ['eq'],
        'state' => ['eq'],
        'type' => ['eq'],
        'postacode' => ['gt','lt','eq']
    ];

    protected $columnMap = [
        'postacode' => 'postal_code'
    ];

    protected $operatorMap =[
        'eq' => '=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<='
    ];

}