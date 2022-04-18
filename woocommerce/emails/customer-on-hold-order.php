<?php
    /**
     * Customer on-hold order email
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-on-hold-order.php.
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

    /*
     * @hooked WC_Emails::email_header() Output the email header
     */
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
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet" type="text/css" />

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
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
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
														class="heading_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td
																style="padding-bottom:60px;padding-top:30px;text-align:center;width:100%;">
																<h1
																	style="margin: 0; color: #393d47; direction: ltr; font-family: 'Roboto', Tahoma, Verdana, Segoe, sans-serif; font-size: 45px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
																	<strong><span class="tinyMce-placeholder"
																			style="color: #393d47;">Your
																			order #<?php echo $order->get_id(); ?> is on
																			hold!</span></strong>
																</h1>
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
					<table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
						role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
						<tbody>
							<tr>
								<td>
									<table align="center" border="0" cellpadding="0" cellspacing="0"
										class="row-content stack" role="presentation"
										style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;"
										width="500">
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
															<td style="width:100%;padding-right:0px;padding-left:0px;">
																<div align="center" style="line-height:10px"><img
																		src="<?php echo get_stylesheet_directory_uri().'/woocommerce/emails/assets/on-hold.png' ?>"
																		style="display: block; height: auto; border: 0; width: 325px; max-width: 100%;"
																		width="325" /></div>
															</td>
														</tr>
													</table>
													<table border="0" cellpadding="0" cellspacing="0"
														class="heading_block" role="presentation"
														style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
														width="100%">
														<tr>
															<td style="padding-top:60px;text-align:center;width:100%;">
																<h1
																	style="margin: 0; color: #2d7cff; direction: ltr; font-family: 'Roboto', Tahoma, Verdana, Segoe, sans-serif; font-size: 25px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
																	<span class="tinyMce-placeholder"
																		style="color: #2d7cff;">Don`t worry it`s
																		just on hold!</span>
																</h1>
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
																	<p style="margin: 0;" style="color:#636A70;">If we
																		haven`t previously
																		informed you about this action and you don`t
																		know the reason please get in touch using the
																		email address bellow for further assistance.</p>
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
																	style="color:#636A70;direction:ltr;font-family:'Roboto', Tahoma, Verdana, Segoe, sans-serif;font-size:15px;font-weight:700;letter-spacing:0px;line-height:120%;text-align:center;">
																	<p style="margin: 0;">
																		project@digitaltechnologia.com </p>
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
																	style="color:#636A70;direction:ltr;font-family:Roboto, Tahoma, Verdana, Segoe, sans-serif;font-size:14px;font-weight:400;letter-spacing:0px;line-height:150%;text-align:center;">
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