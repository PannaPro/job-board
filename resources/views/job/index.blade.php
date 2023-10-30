<x-layout>

    <div>
        <h2 class="text-center mb-10 text-3xl">Easy way to find work</h2>
    </div>

    @foreach ($jobs as $job)
        <x-job-card :$job>
            <div class="mt-8">
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach

    {{ $jobs->links('pagination::simple-tailwind') }}

</x-layout>
