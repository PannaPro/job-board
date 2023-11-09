<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{


    public function create(Job $job)
    {
        $this->authorize('apply', $job);

        return view('applications.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        $this->authorize('apply', $job);

        $request->validate([
            'expected_salary' => 'required|min:1|max:1000000'
        ]);

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $request->input('expected_salary')
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success','Application sent successfuly')    
            ->withErrors(['expected_salary' => 'Some error message']);
    }


    public function destroy(string $id)
    {
        //
    }
}
