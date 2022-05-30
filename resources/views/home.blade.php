@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header"> -->
                <div class="card-header card-header-primary text-center" style="background: linear-gradient(60deg, #ffde61, #f7ab9f,#ffde61)">{{ __('Productos en Stock') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

