<?php
    /**
     * Email Header
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @version 4.0.0
     * @package WooCommerce\Templates\Emails
     *
     * @see     https://docs.woocommerce.com/document/template-structure/
     */

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }

?>
<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset');?>" />
	<title><?php echo get_bloginfo('name', 'display'); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@500&display=swap"
		rel="stylesheet">
</head>

<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0"
	offset="0">
	<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>" style="padding: 1rem; background-color: #EAF2FF">
		<table width="100%" style="margin-bottom: 1rem;">
			<tbody>
				<tr>
					<td style="text-align: center">
						<div class="logo">
							<img src="<?php echo get_stylesheet_directory_uri().'/woocommerce/emails/assets/logo.png' ?>"
								alt="" />
						</div>
					</td>
				</tr>
			</tbody>
		</table>

		<table width="100%">
			<tbody>
				<tr>
					<td style="text-align: center">
						<div class="header_text">
							<h1 style="
                                    text-align: center;
                                    font-weight: bold;
                                    font-size: 1.8rem;
                                    font-family: 'Roboto', sans-serif;
                                    margin-bottom: 0;
                                ">Order Confirmation</h1>
							<p style="font-family: 'Roboto', sans-serif;"><?php echo $email_heading; ?></p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>