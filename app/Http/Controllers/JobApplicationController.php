<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{


    public function create(Job $job)
    {
        if (auth()->check()) {
            $this->authorize('apply', $job);
        } else {
            return redirect()->intended('login');
        }

        $job->loadCount(
            'JobApplications'
        );

        return view('applications.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        $this->authorize('apply', $job);

        $request->validate([
            'expected_salary' => 'required|numeric|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $originalFileName = $file->getClientOriginalName();
        $path = $file->storeAs('cvs', $originalFileName, 'private');

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $request->input('expected_salary'),
            'cv' => $path,
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success','Application sent successfuly');
    }


    public function destroy(string $id)
    {
        //
    }
}
