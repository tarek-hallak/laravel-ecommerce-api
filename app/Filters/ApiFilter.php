<?php
namespace App\Filters;
use Illuminate\Http\Request;

class ApiFilter {

    protected $safePrams = [];

    protected $columnMap = [];

    protected $operatorMap =[];

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