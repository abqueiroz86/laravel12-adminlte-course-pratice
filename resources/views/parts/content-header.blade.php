<div class="app-content-header">
    <!--begin::Dashboard menu-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                @hasSection('page-title')
                    <h3 class="mb-0">@yield('page-title')</h3>
                @endif

                <ol class="breadcrumb float-sm-start mb-0">
                    @foreach ( $breadcrumbs as $breadcrumb )
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['label'] }}</a></li>
                    @endforeach
                    {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                </ol>
        </div>
        <div class="col-sm-6">
            Actions
        </div>
    </div>
</div>