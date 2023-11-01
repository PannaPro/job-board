<x-layout>

    <form action="{{ route('jobs.index') }}" method="GET">
        <x-card class="mb-4 text-sm">
            <div class="mb-4 grid grid-cols-2 gap-4">
                
                {{-- search bar --}}
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>

                {{-- salary filter --}}
                <div>
                    <div class="mb-1 font-semibold">Salary</div>

                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>

                {{-- radio filter --}}
                <div class="grid-cols-1">
                    <div class="mb-5 font-semibold">Experience</div>

                    <x-radio-group name="expirience" :options="\App\Models\Job::$expirience"/>

                </div>
                
                {{-- category filter --}}
                <div class="grid-cols-1">
                    <div class="mb-5 font-semibold">Category</div>

                    <x-radio-group name="category" :options="\App\Models\Job::$category"/>

                </div>
            </div>
            
            <div >
                <button type="submit">Search</button>
            </div>
        </x-card>
    </form>
    
    <x-breadcrumbs class="mb-4" :links="['Jobs'=> route('jobs.index')]" />
        
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="mt-8">
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @empty
        <x-card>
            <div>Offers not found</div>
        </x-card>
    @endforelse

    {{-- {{ $jobs->links('pagination::simple-tailwind') }} --}}

</x-layout>