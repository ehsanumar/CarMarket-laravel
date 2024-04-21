<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;

class SearchAndSearchController extends Controller
{
    public function searchCar(Request $request)
    {
        $cars = Cars::with('user')
        ->where(function ($query) use ($request) {
            $query->where('company', 'LIKE', '%' . $request->search . '%')
                ->orWhere('model', 'LIKE', '%' . $request->search . '%')
                ->orWhere('year', 'LIKE', '%' . $request->search . '%')
                ->orWhere('price', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('user', function ($userQuery) use ($request) {
                    $userQuery->where('name', 'LIKE', '%' . $request->search . '%');
                });
        })
            ->paginate(12);

        return view('searchCars', compact('cars'));
    }

    public function sortCar(Request $request)
    {
        abort_if($request['sorting'] === null, 404);
        $allProductes = Cars::query();

        switch ($request->sorting) {
            case 'oldest':
                return view('sortCars', ['cars' => $allProductes->oldest()->paginate(12)]);
                break;
            case 'cheapest':
                return view('sortCars', ['cars' => $allProductes->orderBy('price')->paginate(12)]);

                break;
            case 'A-z':
                return view('sortCars', ['cars' => $allProductes->orderBy('company')->paginate(12)]);
                break;
            case 'Z-a':
                return view('sortCars', ['cars' => $allProductes->orderBy('company', 'desc')->paginate(12)]);
                break;

            default:
                return back();
                break;
        }
    }
}
