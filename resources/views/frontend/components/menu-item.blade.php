<section class="fp__menu mt_95 xs_mt_65">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
                <div class="fp__section_heading mb_45">
                    <h4>ĐẶC SẢN SEAFOOD</h4>
                    <h2>Cùng thưởng thức những món ngon đặc biệt của Seafood</h2>
                </div>
            </div>
        </div>

        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-12">
                <div class="flex-wrap menu_filter d-flex justify-content-center">
                    <button class=" active" data-filter="*">all menu</button>
                    @foreach ($categories as $category)
                        <button data-filter="">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid row listmenu">
            @foreach ($categories as $category)
                @php
                    $product = \App\Models\Product::get();
                @endphp
            @endforeach

            @foreach ($products as $product)
                <div class="col-xl-3 col-sm-6 col-lg-4 burger pizza wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_item">
                        <div class="fp__menu_item_img">
                            <img src={{ asset($product->thumb_image) }} alt="{{ $product->name }}"
                                class="img-fluid w-100">
                            <a class="category" href="#">{{ $product->category->name }}</a>
                        </div>
                        <div class="fp__menu_item_text">
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span>10</span>
                            </p>
                            <a class="title"
                                href="{{ route('frontend.product.show', $product->slug) }}">{{ $product->name }}</a>
                            <h5 class="price">
                                {{ number_format($product->price, 0, ',', '.') }} VND
                            </h5>
                            <ul class="flex-wrap d-flex justify-content-center">
                                <li><a href="javascript:;" onclick="loadProductModal('{{ $product->id }}')"><i
                                            class="fas fa-shopping-basket"></i></a></li>
                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="btn__allmenu">
                <a href="#!" class="common_btn btn_menu">Xem thực đơn</a>
            </div>
        </div>
    </div>
</section>
