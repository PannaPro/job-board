<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="[
            'Jobs' => route('jobs.index'),
             $job->title => route('jobs.show', $job),
             'Apply' => '#',
        ]" />
  
    <x-job-card :$job >
        <div class="text-sm">
            Other {{ Str::plural('applicant', $job->JobApplications ) }} :
            {{ $job->job_applications_count }}
        </div>
    </x-job-card>
  
    <x-card>
       <h2 class="mb-4 text-lg font-medium text-center">
        Your Job Application
        </h2>
        
        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">
                   Expected Salary
                </x-label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">
                    Donwload CV
                </x-label>
                <x-text-input type="file" name="cv" />
            </div>
            <div class="mb-4">
                <x-label for="description">Additional information</x-label>
                <x-text-input type="textarea" name="description" />
            </div>
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>