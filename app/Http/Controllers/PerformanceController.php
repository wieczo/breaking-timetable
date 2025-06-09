<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function index()
    {
        $performances = Performance::orderBy('start_time', 'asc')->get();
        return view('performance.index', compact('performances'));
    }

    public function create()
    {
        return view('performance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ]);

        Performance::create([
            'title' => $request->get('title'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
        ]);

        return redirect()->route('performances.index')->with('success', 'Eintrag gespeichert.');
    }
}
