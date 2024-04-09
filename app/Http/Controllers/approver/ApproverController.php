<?php

namespace App\Http\Controllers\approver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    public function index() {
        return view('approver/approver');
    }
}