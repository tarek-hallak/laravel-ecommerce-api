<?php
namespace App\Services\V1;
use Illuminate\Http\Request;

class CustomerQuery {

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

    public function transform(Request $request){
        $eloQeury =[];

        foreach($this->safePrams as $parm => $operators){
            $query = $request->query($parm);
            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm ;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQeury[] = [$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }
        }

        return $eloQeury;
    }
}