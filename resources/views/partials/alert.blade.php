@if (session()->get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        <b><i class="fa fa-check-circle"></i> Success !</b>
        {{ session()->get('success') }}
    </div>
@endif

@if (session()->get('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        <b><i class="fa fa-times"></i> Error !</b>
        {{ session()->get('error') }}
    </div>
@endif
