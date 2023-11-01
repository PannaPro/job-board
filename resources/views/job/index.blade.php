<x-layout>

    <form action="{{ route('jobs.index') }}" method="GET">
        <x-card class="mb-4 text-sm">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>

                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>3</div>
                <div>4</div>
            </div>

            <button type="submit">Search</button>
        </x-card>
    </form>
    
    <x-breadcrumbs class="mb-4" :links="['Jobs'=> route('jobs.index')]" />
    
        @foreach ($jobs as $job)
            <x-job-card :$job>
                <div class="mt-8">
                    <x-link-button :href="route('jobs.show', $job)">
                        Show
                    </x-link-button>
                </div>
            </x-job-card>
        @endforeach

    {{-- {{ $jobs->links('pagination::simple-tailwind') }} --}}

</x-layout>