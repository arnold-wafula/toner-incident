<?php

namespace App\Http\Controllers\approver;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    public function index() {
        $incidents = Incident::select(
            '_rtblIncidents.idIncidents',
            '_rtblIncidents.cOurRef',
            '_rtblIncidents.cOutline'
        )
        ->orderByDesc('idIncidents')
        ->take(10)
        ->get();

        return view('approver/approver', compact('incidents'));
    }

    public function approve() {

    }

    public function reject() {
        
    }
}