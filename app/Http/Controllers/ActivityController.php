<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deal;
use App\Models\Contact;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($dealId)
    {
        $deal = Deal::where('tenant_id', auth()->user()->tenant_id)
            ->findOrFail($dealId);

        return view('activities.create', compact('deal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deal_id' => 'required',
            'type' => 'required',
            'note' => 'nullable',
        ]);

        Activity::create([
            'tenant_id' => auth()->user()->tenant_id,
            'deal_id' => $request->deal_id,
            'type' => $request->type,
            'note' => $request->note,
        ]);

        return redirect()->route('deals.index')->with('success', 'Activity created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
