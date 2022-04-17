var $ = jQuery.noConflict();

(async () => {
    const buyNowButton = $('.dt_buy_now_button');
    const closeModalBtn = $('.dt_common_container .modal_close');
    const modalOverlay = $('.modal_overlay');
    const addToCartBtn = $('.dt_add_to_cart_button');
    const serviceCheckbox = $('.dt_modal_container .service_checkbox');
    const contractCheckbox = $('.dt_modal_container .contract_terms input');
    const agreementsBtn = $('.dt_modal_container2, .agreements_btn button');

    const showModal = (e) => {
        e.stopPropagation();

        $('.dt_modal_container').addClass('active');
        setTimeout(() => {
            $('.dt_modal_container .modal_wrapper').addClass('active');
        }, 50);
    };

    // Show the contract modal on top of buy now feature modal
    const showContractModal = (e) => {
        e.stopPropagation();

        $('.dt_modal_container2').addClass('active');

        setTimeout(() => {
            $('.dt_modal_container2 .modal_wrapper').addClass('active');
        }, 50);
    };

    const closeModal = (e) => {
        e.stopPropagation();

        const target = $(e.currentTarget);

        target.parents('.dt_common_container').find('.modal_wrapper').removeClass('active');

        setTimeout(() => {
            target.parents('.dt_common_container').removeClass('active');
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

    // Get the checked items key
    const getCheckItemsKey = (target) => {
        const checkBoxes = target.parents('.dt_modal_container').find('.service_checkbox');

        if (!checkBoxes.length) return;

        const serviceKeys = [];

        $.each(checkBoxes, (index, element) => {
            if ($(element).prop('checked')) {
                serviceKeys.push($(element).attr('data-key'));
            }
        });

        return serviceKeys;
    };

    // Reset the pop fields
    const resetPopupFields = (target) => {
        const checkBoxes = target.parents('.dt_modal_container').find('.service_checkbox');

        if (!checkBoxes.length) return;

        $.each(checkBoxes, (index, element) => {
            $(element).prop('checked', false);
        });

        const termsCheckbox = target.parents('.modal_body').find('.contract_terms input');

        termsCheckbox.prop('checked', false);

        const cartTotal = target.parents('.dt_modal_container').find('.total .cart_total');

        cartTotal.text(cartTotal.attr('data-price'));
    };

    const addToCart = (e) => {
        e.preventDefault();

        const target = $(e.currentTarget);

        const termsCheckbox = target.parents('.modal_body').find('.contract_terms input');

        if (!termsCheckbox.prop('checked')) {
            target.parents('.modal_body').find('.notice_message').addClass('active');
            return;
        }

        let productID = target.attr('data-id');

        const itemKeys = getCheckItemsKey(target);

        if (!productID) return;

        $.ajax({
            url: dtLocal.ajaxUrl,
            data: {
                productID,
                itemKeys,
                action: 'dt_add_to_cart'
            },
            method: 'post',

            beforeSend: () => {
                target.html('Adding..');
                target.attr('disabled', true);
            },
            success: (response) => {
                if (!response) return;

                if (response.data.response == 'success') {
                    target.attr('disabled', false);

                    $(document.body).trigger('wc_fragment_refresh');

                    resetPopupFields(target);

                    closeModal(e);
                }
            },
            complete: () => {
                target.html('Add to cart');
            },

            error: (err) => {
                target.html('Add to cart');

                if (err.responseJSON.data.response == 'invalid') {
                    alert(err.responseJSON.data.message);
                }

                alert('Something went wrong try again');
            }
        });
    };

    const toggleContractCondition = (e) => {
        const target = $(e.currentTarget);

        target.prop('checked', false);

        showContractModal(e);
    };

    // Toggle the agreement checkbox
    const toggleAgreement = (e) => {
        const target = $(e.currentTarget);

        if (target.attr('data-action') === 'agree') {
            contractCheckbox.prop('checked', true);
            $('.dt_modal_container .modal_body').find('.notice_message').removeClass('active');
        } else {
            contractCheckbox.prop('checked', false);
        }

        closeModal(e);
    };

    buyNowButton.on('click', showModal);

    closeModalBtn.on('click', closeModal);

    modalOverlay.on('click', closeModal);

    serviceCheckbox.on('change', updatePlaceholderPrice);

    addToCartBtn.on('click', addToCart);

    contractCheckbox.on('change', toggleContractCondition);

    agreementsBtn.on('click', toggleAgreement);
})();
