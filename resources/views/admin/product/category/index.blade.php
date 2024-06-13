@extends('admin.layouts.master')
<style>
    a:not([href]):not([tabindex]) {
        color: #fff !important;
    }
</style>
@section('content')
    <section class="mt-8 section">
        <div class=" section-header">
            <h1>Danh mục sản phẩm</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Tất cả danh mục sản phẩm</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        Thêm mới
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
