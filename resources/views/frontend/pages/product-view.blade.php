@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            BREADCRUMB START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ==============================-->
    <section class="fp__breadcrumb">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Chi tiết thực đơn</n>
                    </h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">Chi tiết thực đơn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            BREADCRUMB END
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ==============================-->


    <!--=============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            MENU DETAILS START
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ==============================-->
    <section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-9 ">
                    <div class="fp__menu_detail_img" id="">
                        <img src="{{ asset($product->thumb_image) }}" alt="product">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_details_text">
                        <h2>{{ $product->name }}</h2>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <h3 class="price">{{ number_format($product->price, 0, ',', '.') }} VND </h3>
                        <p class="description">{{ $product->description }}</p>

                        <form action="" id="v_modal_add_to_cart_form">
                            @csrf
                            <input type="hidden" name="base_price" class="v_base_price" value="{{ $product->price }}">
                            <input type="hidden" name="product_id"value="{{ $product->id }}">
                            <div class="details_quentity">
                                <h5 style="margin-top: 10px">Số lượng</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger v_decrement"><i class="fal fa-minus"></i></button>
                                        <input type="text" placeholder="1" name="quantity" value="1" readonly
                                            id="v_quantity">
                                        <button class="btn btn-success v_increment"><i class="fal fa-plus"></i></button>
                                    </div>
                                    <h3 id="v_total_price">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h3>
                                </div>
                            </div>
                        </form>
                        <ul class="flex-wrap details_button_area d-flex">
                            @if ($product->quantity === 0)
                                <li><a class="common_btn v_submit_button bg-danger" href="#">Đã hết</a></li>
                            @else
                                <li><a class="common_btn v_submit_button" href="#">Thêm giỏ hàng</a></li>
                            @endif
                            <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Đánh giá</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="fp__review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 đánh giá</h4>
                                            <div class="pt-0 fp__comment mt_20">
                                                <div class="m-0 border-0 fp__single_comment">
                                                    <img src="images/comment_img_1.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Đạt Hà <span>01/02/2024 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
                                                            vero tempore dolor.</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_1.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Mây<span>23/05/2024</span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Reiciendis tenetur tempora sapiente?</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/comment_img_2.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Hà Nguyễn <span>04/05/2024 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
                                                            commodi atque rem voluptas repudiandae, quas quo nemo delectus,
                                                            consequuntur quisquam assumenda, tenetur est.</p>
                                                    </div>
                                                </div>
                                                <a href="#" class="load_more">Xem thêm</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fp__post_review">
                                                <h4>Viết đánh giá</h4>
                                                <form>
                                                    <p class="rating">
                                                        <span>Chọn sao : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Tên">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3" placeholder="Viết đánh giá của bạn"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">Gửi
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($relatedProducts) > 0)
                <div class="fp__related_menu mt_90 xs_mt_60">
                    <h2>Sản phẩm liên quan</h2>
                    <div class="row related_product_slider">
                        <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                            @foreach ($relatedProducts as $relatedProduct)
                                <div class="fp__menu_item">
                                    <div class="fp__menu_item_img">
                                        <img src="{{ asset($relatedProduct->thumb_image) }}" alt="menu"
                                            class="img-fluid w-100">
                                        <a class="category" href="#">{{ $relatedProduct->category->name }}</a>
                                    </div>
                                    <div class="fp__menu_item_text">
                                        <p class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <span>74</span>
                                        </p>
                                        <a class="title"
                                            href="{{ route('frontend.product.show', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                                        <h5 class="price">{{ $relatedProduct->price }}</del></h5>
                                        <ul class="flex-wrap d-flex justify-content-center">
                                            <li><a href="javascript:;"
                                                    onclick="loadProductModal('{{ $relatedProduct->id }}')"><i
                                                        class="fas fa-shopping-basket"></i></a></li>
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a href="#"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            @endif

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('.v_increment').on('click', function(e) {
                e.preventDefault();
                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                quantity.val(currentQuantity + 1);
                v_updateTotalPrice()
            })

            $('.v_decrement').on('click', function(e) {
                e.preventDefault();
                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                if (currentQuantity > 1) {
                    quantity.val(currentQuantity - 1);
                    v_updateTotalPrice()
                }
            })

            function v_updateTotalPrice() {
                let basePrice = parseFloat($('.v_base_price').val().replace(/[^\d]/g, ''));
                let quantity = parseFloat($('#v_quantity').val());

                let totalPrice = basePrice * quantity;
                let formattedTotalPrice = totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') +
                    'VNĐ';
                $('#v_total_price').text(formattedTotalPrice);
            }

            $('.v_submit_button').on('click', function(e) {
                e.preventDefault();
                $('#v_modal_add_to_cart_form').submit();
            })

            // add to cart
            $('#v_modal_add_to_cart_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('add-to-cart') }}',
                    data: formData,
                    success: function(response) {
                        updateSidebarCart();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage)
                    }
                });
            });

        })
    </script>
@endpush
