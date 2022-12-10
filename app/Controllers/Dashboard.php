<?php

namespace App\Controllers;

use \App\Models\MovimentModel;
use \App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {

        $modelMoviment = new MovimentModel();
        $modelUser = new UserModel();

        $count_moviment = $modelMoviment->countAllResults();
        $sum_moviment = $modelMoviment->query('select format(sum(value), 2) as sum from moviment');

        $count_input = $modelMoviment->where('type', 'input')->countAllResults();
        $sum_input = $modelMoviment->query("select format(sum(value), 2) as sum_input from moviment where type = 'input'");

        $count_output = $modelMoviment->where('type', 'output')->countAllResults();
        $sum_output = $modelMoviment->query("select format(sum(value), 2) as sum_output from moviment where type = 'output'");

        $cashbalance = $modelMoviment->query("select format((select sum(value) from moviment where type = 'input') - (select sum(value) from moviment where type = 'output'), 2) as cashbalance from moviment limit 1");

        $moviment_per_type = $modelMoviment->select('count(moviment.id) as count, moviment.type as type')->groupBy('moviment.type')->get();

        $moviment_per_date = $modelMoviment->select('year(moviment.date) as date, count(moviment.id) as count')->groupBy('year(moviment.date)')->get();

        return view('dashboard/index', [
            'count_moviment' => $count_moviment,
            'sum_moviment' => $sum_moviment->getResult(),
            'count_input' => $count_input,
            'sum_input' => $sum_input->getResult(), 
            'count_output' => $count_output,
            'sum_output' => $sum_output->getResult(), 
            'cashbalance' => $cashbalance->getResult(),
            'moviment_per_type' => $moviment_per_type,
            'moviment_per_date' => $moviment_per_date, 
        ]);
    }
}
