<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>

<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
// do_action('woocommerce_before_main_content');
?>

<?php while (have_posts()) : ?>
    <?php the_post();
    global $product; ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('max-w-screen-lg mx-auto flex flex-col gap-6', $product); ?>>


        <div class="w-full">
            <?php
            $image_id = $product->get_image_id();
            if ($image_id) {
                echo wp_get_attachment_image($image_id, 'full', false, array(
                    'class' => 'w-full h-20 object-cover rounded-lg'
                ));
            }
            ?>
        </div>



        <div class="flex justify-between items-center mb-4 flex-wrap">

            <h1 class="text-2xl font-bold text-gray-800 text-right flex-shrink-0">
                <?php the_title(); ?>
            </h1>

            <div class="flex items-center gap-2 flex-shrink-0">
                <?php
                $regular_price = (float) $product->get_regular_price();
                $sale_price    = (float) $product->get_sale_price();

                if ($product->is_on_sale() && $regular_price > 0) :
                    $off = round((($regular_price - $sale_price) / $regular_price) * 100); ?>
                    <span class="bg-red-600 text-white text-sm px-2 py-1 rounded-md">
                        <?= $off ?>%
                    </span>
                    <span class="line-through text-gray-400"><?= wc_price($regular_price) ?></span>
                    <span class="font-bold text-lg"><?= wc_price($sale_price) ?></span>
                <?php else : ?>
                    <span class="font-bold text-lg"><?= wc_price($product->get_price()) ?></span>
                <?php endif; ?>
                <span class="text-gray-500 text-sm">تومان</span>
            </div>

        </div>


        <!-- توضیحات کوتاه -->
        <div class="prose text-gray-600">
            <?php the_excerpt(); ?>
        </div>

        <!-- دکمه افزودن به سبد -->
        <div>
            <?php woocommerce_template_single_add_to_cart(); ?>
        </div>

        <!-- ویژگی‌های محصول -->
        <div class="border-t pt-3">
            <?php woocommerce_template_single_meta(); ?>
        </div>

    </div>

    </div>


<?php endwhile; ?>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10
 */
do_action('woocommerce_after_main_content');
?>

<?php get_footer('shop'); ?>