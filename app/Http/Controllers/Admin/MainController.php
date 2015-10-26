<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Account;
use App\Model\Admin\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Charge;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filter = 6)
    {

        if (isset($_GET["filter"])) {
            $filter = $_GET["filter"];
        }
        if($filter>23) $filter=6;
        $accounts_count = Account::get()->count();
        $projects_count = Project::get()->count();

        $income = DB::select(DB::raw("SELECT sum(amount) as amount,YEAR(income_date) as Y,MONTH(income_date) as M
FROM charges WHERE status='income' and income_date>=DATE_SUB(now(), INTERVAL $filter MONTH) group by M,Y"));
//var_dump($income);die;

        $spending = DB::select(DB::raw("SELECT sum(amount) as amount,YEAR(income_date) as Y,MONTH(income_date) as M
FROM charges WHERE status='spending' and income_date>=DATE_SUB(now(), INTERVAL $filter MONTH) group by M,Y"));
        $month = array('1' => 'Jan1', '2' => 'Feb1', '3' => 'Mar1', '4' => 'Apr1', '5' => 'May1', '6' => 'Jun1', '7' => 'Jul1', '8' => 'Aug1', '9' => 'Sep1', '10' => 'Oct1', '11' => 'Nov1', '12' => 'Dec1');


        $m = date('m');
        function check($m, $filter)
        {
            $month = array('1' => 'Jan1', '2' => 'Feb1', '3' => 'Mar1', '4' => 'Apr1', '5' => 'May1', '6' => 'Jun1', '7' => 'Jul1', '8' => 'Aug1', '9' => 'Sep1', '10' => 'Oct1', '11' => 'Nov1', '12' => 'Dec1');
            $diff = $m - $filter;
            if ($diff == 0) {
                return '0';
            }

            return $diff;
        }


        $myarr = array();

        $start = check($m, $filter) + 2;
        for ($i = 0; $i < $filter; $i++) {
            if($start>12)$start=1;
            if($start==0) $start=12;
            if($start<0) $start=$start+12;
            $myarr[$i] = $month[$start];
            $start++;


        }
        //var_dump($myarr);die;


        function array_manipulate($data, $filter)
        {
            $arr = array();
            foreach ($data as $value) {

                $arr[$value->M] = $value->amount;
            }

            $arr1 = array();
            $m = date('m');
            for ($i = $m - $filter + 1; $i <= $m; $i++) {
                if (array_key_exists($i, $arr))
                    $arr1[$i] = $arr[$i];
                else $arr1[$i] = 0;
            }

            return $arr1;
        }


        $income = array_manipulate($income, $filter);
        $spending = array_manipulate($spending, $filter);

        $diff = array();
        for ($i = $m - $filter + 1; $i <= $m; $i++) {
            $diff[$i] = $income[$i] - $spending[$i];
        }


        return view('admin.main.index')->with(compact('accounts_count', 'projects_count', 'income', 'spending', 'myarr', 'diff'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
