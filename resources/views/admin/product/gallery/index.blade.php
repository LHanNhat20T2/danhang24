@extends('admin.layouts.master')
<style>
    a:not([href]):not([tabindex]) {
        color: #fff !important;
    }
</style>
@section('content')
    <section class="mt-8 section">
        <div class="section-header">
            <h1>Sản phẩm</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Tất cả sản phẩm</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                        Them moi
                    </a>
                </div>
            </div>
            <div class="card-body">
            </div>
        </div>
    </section>
@endsection
