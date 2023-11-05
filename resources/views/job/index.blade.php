<x-layout>

    <x-card class="mb-12 text-sm">
        
        {{-- filtering form  --}}
        <form id="filtering-form" action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">

                {{-- search bar --}}
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}"
                    placeholder="Search for any text" form-id="filtering-form"/>
                </div>

                {{-- salary filter --}}
                <div>
                    <div class="mb-1 font-semibold">Salary</div>

                    <div class="flex space-x-2">
                        <x-text-input oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="min_salary" value="{{ request('min_salary') }}"
                        placeholder="From" form-id="filtering-form"></x-text-input>
                        <x-text-input oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="max_salary" value="{{ request('max_salary') }}"
                        placeholder="To" form-id="filtering-form"></x-text-input>
                    </div>
                </div>

                {{-- radio filter --}}
                <div class="grid-cols-1">
                    <div class="mb-5 font-semibold">Experience</div>

                    <x-radio-group name="expirience"
                    :options=" array_combine(array_map('ucfirst' , \App\Models\Job::$expirience) , \App\Models\Job::$expirience)"></x-radio-group>

                </div>

                {{-- category filter --}}
                <div class="grid-cols-1">
                    <div class="mb-5 font-semibold">Category</div>

                    <x-radio-group name="category" :options="\App\Models\Job::$category"></x-radio-group>

                </div>
            </div>

            <div>
                <x-button class="w-full">Search</x-button>
            </div>
        </form>
    </x-card>


    {{-- <x-breadcrumbs class="mb-4" :links="['Jobs'=> route('jobs.index')]"></x-breadcrumbs> --}}

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

{{--    {{ $jobs->links('pagination::simple-tailwind') }}--}}

</x-layout>
