<nav {{ $attributes }}>
    <ul class="flex space-x-4 text-slate-600">
        <li>
            <a href="/">Home</a>
        </li>

        {{-- @foreach ($links as $label => $link)
            <li>🔙</li>
            <li>
                <a href="{{ $link }}">
                {{ $label}}
                </a>
            </li>    
        @endforeach --}}
        
        <li>🔙</li>
        <li>{{ $job->title}}</li>
    </ul>
</nav>



{{-- tommorow you will need create new component with component class for breadcrumps.
Added foreach lop for links, leave only 1 link parametr and specified :link tag like special parametr
which will be fill on each different pages. Get assoisiate array with key=>value 

'Home' - leaved
'Name category' => route('') 
'$job-title => '#' --}}