<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Create company' => '#']" />

    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <x-label for="company_name" :required="true">
                Company name
            </x-label>
            <x-text-input type="text" name="company_name" />
            <x-button class="mt-4" >
                Create
            </x-button>
        </form>
    </x-card>
</x-layout>