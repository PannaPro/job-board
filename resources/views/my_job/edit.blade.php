<x-layout>
    <x-breadcrumbs :links="['My Job' => route('my-job.index'), 'Edit' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('my-job.update' , $job )}}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">

                <div class="col-span-2">
                    <x-label for="title" :required="true" >Job Title</x-label>
                    <x-text-input type="text" name="title" :value="$job->title" />
                </div>

                <div>
                    <x-label :required="true" >Experience</x-label>
                    <x-radio-group name="experience" :all-option="false" :value="$job->experience"
                        :options=" array_combine(
                        array_map('ucfirst' , \App\Models\Job::$experience) , \App\Models\Job::$experience
                        )"/>
                </div>

                <div>
                    <x-label :required="true" >Category</x-label>
                    <x-radio-group name="category" :all-option="false" :value="$job->category"
                        :options="\App\Models\Job::$category"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input type="text" name="location" :value="$job->location" />
                </div>

                <div>
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input type="number" name="salary" :value="$job->salary" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input type="textarea" name="description" :value="$job->description" />
                </div>
                
                <div class="mt-5">
                    <x-button>Edit Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>