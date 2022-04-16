var $ = jQuery.noConflict();

(async () => {
    const addMoreBtn = $('.dt_add_more');
    const saveServicesBtn = $('.dt_save_services');

    const duplicateMetaBox = (e) => {
        e.preventDefault();
        e.stopPropagation();

        let serviceCount = $('.dt_services .service').length;

        $('.dt_services').append(`
			<div class="service" style="padding: 1rem; border: 1px solid #000; display: flex; flex-direction: column">
				<div class="modal_close">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="22" height="22">
					<path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/>
					</svg>
				</div>
				<label for="service_name_${serviceCount}">
					<h4 style="margin-bottom: 6px; margin-top: 0;">Service Title:</h4>
					<input type="text" name="service_name_${serviceCount}" id="service_name_${serviceCount}" value="" class="service_name"/>
				</label>
				<br/>
				<label for="service_price_${serviceCount}">
					<h4 style="margin-bottom: 6px; margin-top: 0;">Service Price:</h4>
					<input type="number" name="service_price_${serviceCount}" id="service_price_${serviceCount}" value="" class="service_price"/>
				</label>
			</div>
		`);
    };

    const removeMetaBox = (e) => {
        let target = $(e.currentTarget);
        target.parents('.service').remove();
    };

    const saveServices = (e) => {
        e.preventDefault();
        e.stopPropagation();

        let target = $(e.currentTarget);

        const serviceElements = $('.dt_services .service');

        const postID = target.attr('data-id');

        const services = [];

        $.each(serviceElements, function (index, element) {
            const serviceName = $(element).find('.service_name').val();
            const servicePrice = $(element).find('.service_price').val();

            services.push({
                serviceName,
                servicePrice
            });
        });

        $.ajax({
            url: dtLocal.ajaxUrl,
            data: {
                services,
                postID,
                action: 'dt_save_services'
            },
            method: 'post',
            beforeSend: () => {
                target.attr('disabled', true);
            },
            success: (response) => {
                if (!response) return;

                if (response.data.response == 'invalid') {
                    alert(response.data.message);
                }

                if (response.data.response == 'success') {
                    target.attr('disabled', false);
                    alert(response.data.message);
                }
            },
            error: (err) => {
                alert('Something went wrong try again');
                target.attr('disabled', false);
            }
        });
    };

    addMoreBtn.on('click', duplicateMetaBox);

    $(document).on('click', '.modal_close', removeMetaBox);

    saveServicesBtn.on('click', saveServices);
})();
