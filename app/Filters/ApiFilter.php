<?php
namespace App\Filters;

use Illuminate\Http\Request;


class ApiFilter
{
    /**
     * Summary of safeParms
     * @var array
     */
    protected $safeParms = [];

    /**
     * Summary of columnMap
     * @var array
     */
    protected $columnMap = [];

    /**
     * Summary of operatorMap
     * @var array
     */
    protected $operatorMap = [];

    /**
     * Summary of transform
     * @param \Illuminate\Http\Request $request
     * @return array<array>
     */
    public function transform(Request $request)
    {
        $eloQuent = [];

        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    // Append each condition to $eloQuent array
                    $eloQuent[] = [
                        $column,
                        $this->operatorMap[$operator],
                        $query[$operator]
                    ];
                }
            }
        }

        return $eloQuent;
    }
}
