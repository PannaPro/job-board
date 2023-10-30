<x-layout>

    <div>
        <h2 class="text-center mb-10 text-3xl">Easy way to find work</h2>
    </div>

    @foreach ($jobs as $job)
        <x-card class="mb-4">
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium ">{{ $job->title }}</h2>
                <div class="text-slate-500">
                    $ {{ number_format($job->salary)}}
                </div>
            </div>

            <div class="mb-10 flex justify-between text-center">
                <div class="flex justify-between space-x-5">
                    <div>Company Name</div>
                    <div>{{ $job->location }}</div>
                </div>
                <div class="flex space-x-2 text-xs">
                    
                    <x-tag>{{ Str::ucfirst($job->expirience) }}</x-tag>
                    <x-tag>{{ $job->category }}</x-tag>
                </div>
            </div>

            <div class="text-sm text-slate-500">
                <p>{!!  nl2br(e($job->description)) !!}</p>
            </div>
        </x-card>
    @endforeach
        {{ $jobs->links('pagination::simple-tailwind') }}


</x-layout>
