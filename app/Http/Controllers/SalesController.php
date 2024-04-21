<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::with('cars','buyer','seller')->latest()->paginate(10);
        $Total = Sales::sum('price');
        return view('sales',compact('sales','Total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $query = Sales::query();

        switch ($request->sorting) {
            case 'day':
                $dateFrom = Carbon::now()->subDay();
                $query->whereDate('created_at', '>=', $dateFrom);
                break;
            case 'week':
                $dateFrom = Carbon::now()->subWeek();
                $query->whereDate('created_at', '>=', $dateFrom);
                break;
            case 'month':
                $dateFrom = Carbon::now()->subMonth();
                $query->whereDate('created_at', '>=', $dateFrom);
                break;
            case 'year':
                $dateFrom = Carbon::now()->subYear();
                $query->whereDate('created_at', '>=', $dateFrom);
                break;
            default:
                return back();
                break;
        }

        $result = $query->paginate(8);
        return view('salesDate', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Sales::create([
            'car_id' => $request->car_id,
            'seller_id' => $request->seller_id,
            'buyer_id' => auth()->id(),
            'price' => $request->price
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
