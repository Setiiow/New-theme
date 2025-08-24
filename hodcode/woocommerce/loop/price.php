<?php

/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;

$regularPrice = $product->get_regular_price();
$salePrice    = $product->get_sale_price();
$off = round((($regularPrice - $salePrice) / $regularPrice) * 100);?>

<?php if ($price_html = $product->get_price_html()) : ?>
	<span class="flex gap-2 items-center mb-3">
		<?php if ($off): ?><span class="bg-red-600 text-white px-2 rounded-md">
				<?= toPersianNumerals(number_format($off)) ?>%
			</span>
		<?php endif; ?>
		<span class="grow"></span>
		<?php if ($off): ?>
			<span class="text-gray-400 line-through"><?= toPersianNumerals(number_format($regularPrice)) ?></span>
		<?php endif; ?>
		<span><?= toPersianNumerals(number_format($salePrice)) ?></span>
		<span class="text-gray-400 font-medium text-sm">تومان</span>
	</span>
<?php endif; ?>