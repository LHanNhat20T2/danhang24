<script>
    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault()

        let url = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'DELETE',
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message)

                            window.location.reload();

                        } else if (response.status === 'error') {
                            toastr.error(response.message)
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                })
            }
        })
    })
    // get cart product
    function loadProductModal(productId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('load-product-modal', ':productId') }}'.replace(':productId', productId),
            success: function(response) {
                $(".load_product_modal_body").html(response);
                $('#cartModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    // Update cart product
    function updateSidebarCart() {
        $.ajax({
            method: 'GET',
            url: '{{ route('get-cart-products') }}',
            success: function(response) {
                $('.cart_contents').html(response);
                let cartTotal = $('#cart_total').val();
                let cartCount = $('#cart_product_count').val();
                let formattedTotalPrice = cartTotal.toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g, '.') + ' VNĐ';
                $('.cart_subtotal').text(formattedTotalPrice.replace(':cartTotal', cartTotal));
                $('.cart_count').text(cartCount);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    // Remove cart product
    function removeProductFromSidebar($rowId) {
        $.ajax({
            method: 'GET',
            url: '{{ route('cart-product-remove', ':rowId') }}'.replace(':rowId', $rowId),
            success: function(response) {
                if (response.status === 'success') {
                    updateSidebarCart();
                    toastr.success(response.message);
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = xhr.responseJSON.message;
                toastr.error(errorMessage)
            }
        })
    }
</script>
