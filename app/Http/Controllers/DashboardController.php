<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Deal;

class DashboardController extends Controller
{

    public function index()
    {
        $tenantId = auth()->user()->tenant_id;

        $totalContacts = Contact::where('tenant_id', $tenantId)->count();
        $totalDeals = Deal::where('tenant_id', $tenantId)->count();
        $totalRevenue = Deal::where('tenant_id', $tenantId)
            ->where('stage', 'won')
            ->sum('amount');

        return view('dashboard', compact(
            'totalContacts',
            'totalDeals',
            'totalRevenue'
        ));
    }
}
