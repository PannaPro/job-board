<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationsController extends Controller
{

    // Passing data to the view for rendering job applications and associated details
    // Eager load job details with counts of applications for current job
    // and average expected salary
    // Eager load employer details for each job

    public function index()
    {
        return view('my-job-applications.index', [
            'applications' => auth()->user()->JobApplications()
                ->with([
                    'job' => fn($query) => $query->withCount('JobApplications')
                        ->withAvg('JobApplications', 'expected_salary'),
                    'job.employer'
                ])
                ->latest()->get()
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
