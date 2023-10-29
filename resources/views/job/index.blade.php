<x-layout>

    <div>
        <h2 class="text-center mb-10 text-3xl">Easy way to find work</h2>
    </div>

    @foreach ($jobs as $job)
        <x-card class="mt-4 text-lg">
            {{ $job->title }}
        </x-card>
    @endforeach

</x-layout>
