<?php

namespace App\Http\Controllers;

use App\Models\InterestRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InterestRecordController extends Controller
{
    public function index()
    {
        // లాగిన్ అయిన యూజర్ డేటా మాత్రమే చూపిస్తుంది
        $records = InterestRecord::where('user_id', Auth::id())->get();
        return view('interest.index', compact('records'));
    }

    public function create()
    {
        return view('interest.create');
    }

    public function store(Request $request)
    {
        // 1. డేటా వాలిడేషన్
        $request->validate([
            'person_name' => 'required|string|max:255',
            'principal_amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'interest_type' => 'required|in:monthly_rupees,yearly_percentage',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now();

        $months = $startDate->diffInMonths($endDate);
        $remainingDaysDate = $startDate->copy()->addMonths($months);
        $days = $remainingDaysDate->diffInDays($endDate);
        $totalMonths = $months + ($days / 30);

        $principal = $request->principal_amount;
        $rate = $request->interest_rate;
        $totalInterest = 0;

        // 2. ఫార్ములా సరిచేయబడింది (* గుర్తులు యాడ్ చేశాం)
        if ($request->interest_type == 'monthly_rupees') {
            $totalInterest = ($principal * $rate * $totalMonths) / 100;
        } else {
            $years = $startDate->diffInDays($endDate) / 365;
            $totalInterest = ($principal * $rate * $years) / 100;
        }

        $finalAmount = $principal + $totalInterest;

        // 3. రికార్డ్ సేవ్ చేసేటప్పుడు user_id యాడ్ చేశాం
        InterestRecord::create([
            'user_id' => Auth::id(),
            'person_name' => $request->person_name,
            'principal_amount' => $principal,
            'interest_rate' => $rate,
            'interest_type' => $request->interest_type,
            'start_date' => $request->start_date,
            'end_date' => $endDate->format('Y-m-d'),
            'total_interest' => round($totalInterest, 2),
            'final_amount' => round($finalAmount, 2),
            'status' => 'active'
        ]);

        return redirect()->route('interest.index')->with('success', 'రికార్డ్ విజయవంతంగా సేవ్ చేయబడింది! వడ్డీ లెక్కించబడింది.');
    }
}
