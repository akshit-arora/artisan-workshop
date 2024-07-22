<div>
    @if(isset($project))
        <h3>Selected Project: {{ $project->name }}</h3>
    @else
        <h3>No Project Selected</h3>
    @endif
</div>
