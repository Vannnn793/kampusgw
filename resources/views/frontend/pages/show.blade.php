@extends('layout.main') {{-- Sesuaikan layout frontend lo --}}
@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">{{ $page->title }}</li>
                </ol>
            </nav>
            <h1 class="fw-bold text-dark mt-3">{{ $page->title }}</h1>
            <hr class="mb-5">
            <div class="page-content text-muted" style="line-height: 2;">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>
@endsection