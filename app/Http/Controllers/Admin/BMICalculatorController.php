<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BMICalculator;

class BMICalculatorController extends Controller
{

    public function index()
    {
        $bmi = BMICalculator::latest()->get();
        return view('admin.bmi-calculator.index', compact('bmi'));
    }
}