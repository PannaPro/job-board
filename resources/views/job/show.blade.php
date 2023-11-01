<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['Jobs'=> route('jobs.index'), $job->title =>'#']"/>

    <x-job-card :$job>
        <div class="text-sm text-slate-500">
            <p> {!! nl2br(e($job->description)) !!} </p>
        </div>
    </x-job-card>
</x-layout>
