var $ = jQuery.noConflict();

(async () => {
    const buyNowButton = $('.dt_buy_now_button');
    const closeModalBtn = $('.dt_modal_container .modal_close');
    const modalOverlay = $('.modal_overlay');
    const addToCartBtn = $('.dt_add_to_cart_button');
    const serviceCheckbox = $('.service_checkbox');
    const contractCheckbox = $('.dt_modal_container .contract_terms input');

    const showModal = (e) => {
        e.stopPropagation();

        $('.dt_modal_container').addClass('active');
        setTimeout(() => {
            $('.dt_modal_container .modal_wrapper').addClass('active');
        }, 50);
    };

    const closeModal = (e) => {
        e.stopPropagation();

        $('.dt_modal_container .modal_wrapper').removeClass('active');
        setTimeout(() => {
            $('.dt_modal_container').removeClass('active');
        }, 200);
    };

    const updatePlaceholderPrice = (e) => {
        let target = $(e.currentTarget);

        let value = Number(target.val());

        let cartTotal = Number($('.dt_modal_container .total .cart_total').text());

        if (target.prop('checked')) {
            let newTotal = cartTotal + value;

            $('.dt_modal_container .total .cart_total').text(newTotal);
        } else {
            let newTotal = cartTotal - value;

            $('.dt_modal_container .total .cart_total').text(newTotal);
        }
    };

    const addToCart = (e) => {
        e.preventDefault();

        const target = $(e.currentTarget);

        let termsCheckbox = target.parents('.modal_body').find('.contract_terms input');

        if (!termsCheckbox.prop('checked')) {
            target.parents('.modal_body').find('.notice_message').addClass('active');
            return;
        }

        let productID = target.attr('data-id');

        if (!productID) return;

        $.ajax({
            url: dtLocal.ajaxUrl,
            data: {
                productID,
                action: 'dt_add_to_cart'
            },
            method: 'post',

            beforeSend: () => {
                target.html('Adding..');
                target.attr('disabled', true);
            },
            success: (response) => {
                if (!response) return;

                if (response.data.response == 'invalid') {
                    alert(response.data.message);
                }

                if (response.data.response == 'success') {
                    target.attr('disabled', false);
                    $(document.body).trigger('wc_fragment_refresh');
                    closeModal(e);
                }
            },
            complete: () => {
                target.html('Add to cart');
            },

            error: (err) => {
                target.html('Add to cart');
                alert('Something went wrong try again');
            }
        });
    };

    const toggleContractCondition = (e) => {
        const target = $(e.currentTarget);

        if (target.prop('checked')) {
            target.parents('.modal_body').find('.notice_message').removeClass('active');
        } else {
            target.parents('.modal_body').find('.notice_message').addClass('active');
        }
    };

    buyNowButton.on('click', showModal);

    closeModalBtn.on('click', closeModal);

    modalOverlay.on('click', closeModal);

    serviceCheckbox.on('change', updatePlaceholderPrice);

    addToCartBtn.on('click', addToCart);

    contractCheckbox.on('change', toggleContractCondition);
})();
