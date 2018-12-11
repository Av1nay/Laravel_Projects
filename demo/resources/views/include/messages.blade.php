{{-- show error messages --}}
{{-- count no. of errors and show respective error as alert --}}
@if (count($errors)>0)
    @foreach ($errors ->all() as $error)
        <div class="alert alert-danger mt-3">
            {{$error}}
        </div>
    @endforeach
@endif

{{-- check session errors --}}

@if (session('success'))
    <div class="alert alert-success mt-3">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mt-3">
        {{session('error')}}
    </div>
@endif