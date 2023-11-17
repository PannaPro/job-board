<x-card class="mb-4">
    <div class="mb-4 flex justify-between">
        <h2 class="text-lg font-medium ">{{ $job->title }}</h2>
        <div class="text-slate-500">
            $ {{ number_format($job->salary)}}
        </div>
    </div>

    <div class="mb-5 flex justify-between text-center">
        <div class="flex justify-between space-x-5 items-center">
            <div>
                <a href="{{ route('jobs.show', $job)}}">{{ $job->employer->company_name }}</a></div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-2 text-xs items-center">
            
            <x-tag>
                <a href="{{ route('jobs.index', ['experience' => $job->experience] )}}"
                >{{ Str::ucfirst($job->experience) }}</a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category ] )}}"
                >{{ $job->category  }}</a>
            </x-tag>
        </div>
    </div>
        
    {{ $slot }} 

</x-card>