@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Danh mục</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Tạo danh mục</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Tạo</button>
                </form>
            </div>
        </div>
    </section>
@endsection
