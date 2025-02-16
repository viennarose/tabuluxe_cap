@extends('base')

@section('content')

<div class="row justify-content-center align-items-center vh-100">
    <div class="col-md-4">
        <div class="bg-login p-4 rounded">
            <h1 class="text-center text-white mb-4 fs-4">Add Dancesport</h1>
            <hr class="bg-secondary">

            {{-- {!! Form::open(['url' => '/events/' . $eventId . '/contests', 'method' => 'post']) !!} --}}
            {!! Form::open(['url'=>'/dancesports','method'=>'post']) !!}

            <div class="mb-3">
                {!! Form::label("title", "Title", ['class' => ' fs-6']) !!}
                {!! Form::select("title",['Latin' => 'Latin', 'Standard' => 'Standard'], null, ['class'=>'form-control form-control-sm text-dark']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label("schedule", "Schedule", ['class' => ' fs-6']) !!}
                {!! Form::date("schedule", null, ['class'=>'form-control form-control-sm text-dark']) !!}
            </div>
            <div class="mb-3">
                {!! Form::label("venue", "Venue", ['class' => ' fs-6']) !!}
                {!! Form::text("venue", null, ['class'=>'form-control form-control-sm text-dark']) !!}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Initial Round</h6>
                    <div class="mb-3 d-flex align-items-center">
                        {!! Form::label("number", "Round:", ['class' => 'fs-6 me-5 mb-0']) !!}
                        {!! Form::number("number", null, ['class'=>'form-control form-control-sm text-dark ms-1']) !!}
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        {!! Form::label("description", "Description:", ['class' => 'fs-6 me-3 mb-0']) !!}
                        {!! Form::textarea("description", null, ['class'=>'form-control form-control-sm text-dark', 'rows' => 3]) !!}
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg d-block mx-auto fs-6">
                Add Dancesport
            </button>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

<style scoped>
form {
    color: #fff;
}

.bg-login {
    background-color: #080d32;
}

/* Styling for the form elements */
form input[type="text"],
form input[type="date"],
form select,
form label {
    color: #fff; /* Text color for inputs and labels */
}

/* Override button color */
.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

/* Hover effect for the button */
.btn-success:hover {
    background-color: #218838;
    border-color: #218838;
}
</style>
