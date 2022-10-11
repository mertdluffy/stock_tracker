{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible d-flex justify-content-between" role="alert">


        <div>
            <strong>{{__('Success')}} !</strong> {{ session('success') }}
        </div>
        <button type="button" class="close" data-bs-dismiss="alert">
                <h3>x</h3>
        </button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible d-flex justify-content-between" role="alert">

        <div>
            <strong>{{__('Error')}} !</strong> {{ session('error') }}
        </div>
        <button type="button" class="close" data-bs-dismiss="alert">
            <h3>x</h3>
        </button>

    </div>
@endif
