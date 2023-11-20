<x-layout>
    <x-breadcrumbs :links="['My Job' => route('my-job.index'), 'Create' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('my-job.store')}}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">

                <div class="col-span-2">
                    <x-label for="name" :required="true" >Job Title</x-label>
                    <x-text-input type="text" name="title"/>
                </div>

                <div>
                    <x-label :required="true" >Experience</x-label>
                    <x-radio-group name="experience" :all-option="false" :value="old('experience')"
                        :options=" array_combine(
                        array_map('ucfirst' , \App\Models\Job::$experience) , \App\Models\Job::$experience
                        )"/>
                </div>

                <div>
                    <x-label :required="true" >Category</x-label>
                    <x-radio-group name="category" :all-option="false" :value="old('category')"
                        :options="\App\Models\Job::$category"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input type="text" name="location"/>
                </div>

                <div>
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input type="number" name="salary"/>
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input type="textarea" name="description"/>
                </div>
                
                <div class="mt-5">
                    <x-button>Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>