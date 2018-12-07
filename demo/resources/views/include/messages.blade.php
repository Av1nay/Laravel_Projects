//show error messages
//count no. of errors and show respective error as alert
@if (count($errors)>0)
    @foreach ($errors ->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

//check session errors

@if (session(success))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif