<x-layout>
    <x-breadcrumbs class="mb-10" :links="['My Job Applications' => '#']" />
    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex justify-between text-sm">
                <div>
                    <div>You applied:
                        {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Other {{ Str::plural('applicant', $application->JobApplications ) }} :
                        {{ $application->job->job_applications_count - 1 }}
                    </div>
                    <div>
                        Your asking salary:
                        {{ $application->expected_salary }}
                    </div>
                    <div>
                        Average asking salary:
                        {{ number_format(round($application->job->job_applications_avg_expected_salary, -2)) }}
                    </div>
                </div>

                <div>Right</div>
            </div>
        </x-job-card>
    @empty
        <div>
           
            You don't have any applications yet
        </div>
    @endforelse
</x-layout>