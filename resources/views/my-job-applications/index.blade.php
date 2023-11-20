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

                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
                        @method('DELETE')
                        @csrf
                            <x-button>
                                Cancel
                            </x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <x-card class="text-center">
            <div class="text-lg mb-4">
                You don't have any applications yet
            </div>
            <div>
                Go find the job <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">here!</a>
            </div>
        </x-card>
    @endforelse
</x-layout>