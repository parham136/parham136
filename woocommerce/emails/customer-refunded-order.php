<?php
    /**
     * Customer refunded order email
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-refunded-order.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @version 3.7.0
     * @package WooCommerce\Templates\Emails
     *
     * @see https://docs.woocommerce.com/document/template-structure/
     */

    defined('ABSPATH') || exit;

?>
<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
	<title></title>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css" />
	<!--<![endif]-->
	<style>
	* {
		box-sizing: border-box;
	}

	body {
		margin: 0;
		padding: 0;
	}

	a[x-apple-data-detectors] {
		color: inherit !important;
		text-decoration: inherit !important;
	}

	#MessageViewBody a {
		color: inherit;
		text-decoration: none;
	}

	p {
		line-height: inherit
	}

	@media (max-width:520px) {
		.row-content {
			width: 100% !important;
		}

		.column .border {
			display: none;
		}

		table {
			table-layout: fixed !important;
		}

		.stack .column {
			width: 100%;
			display: block;
		}
	}
	</style>
</head>

<body style="background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
	<table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;" width="100%">
		<tbody>
			<tr>
				<td>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 100%;"
										width="100%">
										<tbody>
											<tr>
												<td class="column column-1"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
													width="100%">
													<table border="0" cellpadding="0" cellspacing="0"
														class="image_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td
																style="padding-top:10px;width:100%;padding-right:0px;padding-left:0px;">
																<div align="center" style="line-height:10px"><img
																		src="<?php echo get_stylesheet_directory_uri().'/woocommerce/emails/assets/logo.png' ?>"
																		style="display: block; height: auto; border: 0; width: 125px; max-width: 100%;"
																		width="125" /></div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0"
														class="heading_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td
																style="padding-bottom:60px;padding-top:30px;text-align:center;width:100%;">
																<h1
																	style="margin: 0; color: #2b353e; direction: ltr; font-family: 'Roboto', Tahoma, Verdana, Segoe, sans-serif; font-size: 45px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
																	<span class="tinyMce-placeholder"
																		style="color: #2b353e;">We refunded your
																		payment</span>
																</h1>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0"
														class="heading_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td style="text-align:center;width:100%;">
																<h1
																	style="margin: 0; color: #2d7cff; direction: ltr; font-family: 'Roboto', Tahoma, Verdana, Segoe, sans-serif; font-size: 25px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
																	<span class="tinyMce-placeholder"
																		style="color: #2d7cff;">Refund
																		Successful</span>
																</h1>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0"
														class="paragraph_block" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;
														max-width: 930px;
														margin-left: auto;
														margin-right: auto;
														" width="100%">
														<tr>
															<td
																style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:25px;">
																<p><?php printf(esc_html__('Hi %s,', 'woocommerce'), esc_html($order->get_billing_first_name()));?>
																</p>

																<p>
																	<?php
                                                                        if ($partial_refund) {
                                                                            /* translators: %s: Site title */
                                                                            printf(esc_html__('Your order on %s has been partially refunded. There are more details below for your reference:', 'woocommerce'), wp_specialchars_decode(get_option('blogname'), ENT_QUOTES)); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
                                                                        } else {
                                                                            /* translators: %s: Site title */
                                                                            printf(esc_html__('Your order on %s has been refunded. There are more details below for your reference:', 'woocommerce'), wp_specialchars_decode(get_option('blogname'), ENT_QUOTES)); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
                                                                        }
                                                                    ?>
																</p>
															</td>
														</tr>
														<tr>
															<td
																style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:25px;">
																<div
																	style="color:#636A70;direction:ltr;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;font-size:15px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;">
																	<p style="margin: 0;">Please allow 3-5 business days
																		for your transaction to process.</p>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0"
														class="paragraph_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td
																style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:30px;">
																<div
																	style="color:#636A70;direction:ltr;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;font-size:15px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;">
																	<p style="margin: 0;">After 5 days if you
																		still
																		haven`t received your payment let us know we
																		will check it with the payment providers and get
																		back to you.</p>
																</div>
															</td>
														</tr>
													</table>

													<table border="0" cellpadding="0" cellspacing="0"
														class="paragraph_block" role="presentation" style="
                                                                mso-table-lspace: 0pt;
                                                                mso-table-rspace: 0pt;
                                                                word-break: break-word;
                                                                background: #EAF2FF;
                                                                padding: 2rem;
                                                                border-radius: 2rem;
                                                                margin-top: 3rem;
																max-width: 930px;
																margin-left: auto;
    															margin-right: auto;
                                                            " width="100%">
														<tbody>
															<tr>
																<td>

																	<?php

                                                                        /*
                                                                         * @hooked WC_Emails::order_details() Shows the order details table.
                                                                         * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
                                                                         * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
                                                                         * @since 2.5.0
                                                                         */
                                                                        do_action('woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email);

                                                                        /*
                                                                         * @hooked WC_Emails::order_meta() Shows order meta data.
                                                                         */
                                                                        do_action('woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email);

                                                                        if ($additional_content) {
                                                                            echo wp_kses_post(wpautop(wptexturize($additional_content)));
                                                                        }
                                                                    ?>

																</td>
															</tr>
														</tbody>
													</table>

													<table border="0" cellpadding="0" cellspacing="0"
														class="paragraph_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td
																style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:30px;">
																<div
																	style="color:#636A70;direction:ltr;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;font-size:14px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:center;">
																	<p style="margin: 0;">project@digitaltechnologia.com
																	</p>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0"
														class="divider_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td
																style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:60px;">
																<div align="center">
																	<table border="0" cellpadding="0" cellspacing="0"
																		role="presentation"
																		style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
																		width="100%">
																		<tr>
																			<td class="divider_inner"
																				style="font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;">
																				<span> </span>
																			</td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="10" cellspacing="0"
														class="paragraph_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
														width="100%">
														<tr>
															<td>
																<div
																	style="color:#636A70;direction:ltr;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:center;">
																	<p style="margin: 0;">“IMPORTANT: The contents of
																		this email and any attachments are confidential.
																		They are intended for the named recipient(s)
																		only. If you have received this email by
																		mistake, please notify the sender immediately
																		and do not disclose the contents to anyone or
																		make copies thereof”</p>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table><!-- End -->
</body>

</html>