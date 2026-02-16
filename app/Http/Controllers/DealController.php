<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Contact;
use App\Models\Activity;
use Illuminate\Http\Request;


class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::where('tenant_id', auth()->user()->tenant_id)->get();

        $newDeals = $deals->where('stage', 'new');
        $progressDeals = $deals->where('stage', 'progress');
        $wonDeals = $deals->where('stage', 'won');
        $lostDeals = $deals->where('stage', 'lost');

        return view('deals.index', compact(
            'newDeals',
            'progressDeals',
            'wonDeals',
            'lostDeals'
        ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Contact::where('tenant_id', auth()->user()->tenant_id)->get();

        return view('deals.create', compact('contacts'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'contact_id' => 'required',
            'amount' => 'nullable|numeric',
            'stage' => 'required',
        ]);

        Deal::create([
            'tenant_id' => auth()->user()->tenant_id,
            'contact_id' => $request->contact_id,
            'title' => $request->title,
            'amount' => $request->amount ?? 0,
            'stage' => $request->stage,
        ]);

        return redirect()->route('deals.index')->with('success', 'Deal created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $deal = Deal::where('tenant_id', auth()->user()->tenant_id)
            ->with('contact')
            ->findOrFail($id);

        $activities = Activity::where('tenant_id', auth()->user()->tenant_id)
            ->where('deal_id', $deal->id)
            ->latest()
            ->get();

        return view('deals.show', compact('deal', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $deal = Deal::where('tenant_id', auth()->user()->tenant_id)
            ->findOrFail($id);

        $contacts = Contact::where('tenant_id', auth()->user()->tenant_id)->get();

        return view('deals.edit', compact('deal', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $deal = Deal::where('tenant_id', auth()->user()->tenant_id)
            ->findOrFail($id);

        $request->validate([
            'title' => 'required',
            'contact_id' => 'required',
            'amount' => 'nullable|numeric',
            'stage' => 'required',
        ]);

        $deal->update([
            'contact_id' => $request->contact_id,
            'title' => $request->title,
            'amount' => $request->amount ?? 0,
            'stage' => $request->stage,
        ]);

        return redirect()->route('deals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deal = Deal::where('tenant_id', auth()->user()->tenant_id)
            ->findOrFail($id);

        $deal->delete();

        return redirect()->route('deals.index');
    }
}
