<?php

namespace App\Http\Controllers\Admin;

use App\addproduct;
use App\detail;
use App\Http\Controllers\Controller;
use App\purchaselog;
use App\task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function index()
    {
        $pagename = 'Dashboard';

        //grafik user
        $user = User::select('id', 'created_at')->get()->groupBy(function ($user) {
            return Carbon::parse($user->created_at)->format('M');
        });

        $months = [];
        $monthCount = [];

        foreach ($user as $month => $value) {
            $months[] = $month;
            $monthCount[] = count($value);
        }

        //grafik pemesan
        $detail = detail::select('id', 'created_at')->get()->groupBy(function ($detail) {
            return Carbon::parse($detail->created_at)->format('M');
        });

        $monthsss = [];
        $monthCountss = [];

        foreach ($detail as $monthss => $valuess) {
            $monthsss[] = $monthss;
            $monthCountss[] = count($valuess);
        }

        //grafik barang masuk
        $data = addproduct::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $monthss = [];
        $monthCounts = [];

        foreach ($data as $months => $values) {
            $monthss[] = $months;
            $monthCounts[] = count($values);
        }

        $loan = detail::all();
        $task = task::all();
        return view('admin.dashboard', compact('pagename', 'loan', 'task', 'user', 'months', 'monthCount', 'detail', 'monthsss', 'monthCountss', 'data', 'monthss', 'monthCounts'));
    }
}
