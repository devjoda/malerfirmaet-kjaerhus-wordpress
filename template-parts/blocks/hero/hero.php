<?

/**
 * Standard Superego Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-block';
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
    $className .= ' align' . $block['align'];
endif;

// Block padding control
$padding_top = get_field('block_padding_top');
$padding_bottom = get_field('block_padding_bottom');
$custom_classes_array = array();

// Add Padding top to classes
if (!$padding_top) :
    array_push($custom_classes_array, "no-padding-top");
endif;

// Add Padding bottom to classes
if (!$padding_bottom) :
    array_push($custom_classes_array, "no-padding-bottom");
endif;

$hero_images = get_field('hero_billedgalleri');

$custom_classes = implode(" ", $custom_classes_array);

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/image', 'core/spacer', 'core/columns', 'core/column', 'core/buttons', 'acf/accordion'];

// Register Swiper if not already included
if (!wp_script_is('swiper-js')) :
    wp_enqueue_script('swiper-js', THEME . '/assets/scripts/vendors/swiper-bundle.min.js', array('jquery'), false, false);
    wp_enqueue_style('swiper-style', THEME . '/assets/styles/vendors/swiper-bundle.min.css');
endif;
?>

<!-- Section Block -->
<section id="<?= esc_attr($id); ?>" class="hero <?= esc_attr($className); ?> <?= $custom_classes; ?>">
    <div class="container-fluid">
        <div class="row">
            <div data-aos="fade-right" class="circular-image-container col-12 col-12 col-xl-6 col-xxl-5">
                <div class="swiper-hero-slider">
                    <div class="swiper-wrapper">
                        <? if ($hero_images) : ?>
                            <?
                            for ($i = 0; $i <= count($hero_images) - 1; $i++) {
                                if ($i > 0) :
                            ?>
                                    <div class="swiper-slide"><?= wp_get_attachment_image($hero_images[$i], 'medium_large', false, ['loading' => true]); ?></div>
                                <? else : ?>
                                    <div class="swiper-slide"><?= wp_get_attachment_image($hero_images[$i], 'medium_large', false, ['loading' => false]); ?></div>
                            <? endif;
                            } ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" class="hero-details col-12 col-xl-5 offset-xl-1">
                <h1 id="site-title">Malerfirmaet Kjærhus</h1>
                <div class="site-title-svg-container">
                    <div><?= svg_image('malerfirmaet') ?></div>
                    <div><?= svg_image('kjaerhus') ?></div>
                </div>
                <p class="description ">Velkommen fringilla est ullamcorper eget nulla facilisi etiam. Egestas pretium aenean pharetra magna ac placerat. Orci eu lobortis elementum nibh tellus molestie nunc non. Sit amet nisl purus in mollis nunc sed id semper. Varius sit amet mattis vulputate enim nulla. Egestas sed tempus urna et pharetra pharetra massa massa.</p>
                <div class="anchor-links">
                    <div class="hover-effect-1">
                        <a href="<?= get_permalink(500) ?>">
                            <?= svg_image('arrow-right') ?>
                            <span class="mini">Til privat</span>
                            <span class="full">Se mere om privat</span>
                        </a>
                    </div>
                    <div class="hover-effect-1">
                        <a href="<?= get_permalink(501) ?>">
                            <?= svg_image('arrow-right') ?>
                            <span class="mini">Til erhverv</span>
                            <span class="full">Se mere om erhverv</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>