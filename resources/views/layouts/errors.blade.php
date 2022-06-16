
    @if (Session::has('usernotfound'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('usernotfound') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    @if (Session::has('usernotactive'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('usernotactive') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif


    @if (Session::has('Passwordnotmatching'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('Passwordnotmatching') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    @if (Session::has('enqiuiry_success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('enqiuiry_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif

    @if (Session::has('ensettingsuccess'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('ensettingsuccess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif


    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endforeach
    @endif
