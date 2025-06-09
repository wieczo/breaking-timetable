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
            'status' => 'required|in:active,upcoming,done',
        ]);

        Performance::create([
            'title' => $request->get('title'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
            'status' => $request->get('status'),
        ]);

        return redirect()->route('performances.index')->with('success', 'Eintrag gespeichert.');
    }

    public function edit($id)
    {
        $performance = Performance::findOrFail($id);
        return view('performance.edit', compact('performance'));
    }

    public function update(Request $request, Performance $performance)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'status' => 'required|in:active,upcoming,done',
        ]);

        $performance->update($request->only(['title', 'start_time', 'end_time', 'status']));

        return redirect()->route('performances.index')->with('success', 'Performance wurde aktualisiert.');
    }
}
