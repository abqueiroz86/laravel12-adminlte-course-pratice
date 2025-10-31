<div class="app-content-header">
    <!--begin::Dashboard menu-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                @hasSection('page-title')
                    <h3 class="mb-0">@yield('page-title')</h3>
                @endif

                {{-- <ol class="breadcrumb float-sm-start mb-0">
                    @foreach ( $breadcrumbs as $breadcrumb )
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['label'] }}</a></li>
                    @endforeach
                </ol> --}}
            </div>
            
            <div class="col-sm-6 text-end">
                @yield('page-actions')
            </div>
    </div>
</div>