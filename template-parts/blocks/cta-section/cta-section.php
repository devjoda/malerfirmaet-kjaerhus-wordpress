<?

/**
 * Standard Superego CTA-section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-section-' . $block['id'];
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-section-block';
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
    $className .= ' align' . $block['align'];
endif;

// ACF variables
$padding_top = get_field('block_padding_top');
$padding_bottom = get_field('block_padding_bottom');
$heading = get_field('block_cta_section_heading');
$body = get_field('block_cta_section_body');
$justify_image = get_field('block_cta_section_justify_image');
$page_link = get_field('block_cta_section_anchor_page_link');
$image_id = get_field('block_cta_section_image');
$image = wp_get_attachment_image($image_id, 'full') ?? null;
$anchor_svg = svg_image('arrow-right');

$custom_classes_array = array();

// Add Padding top to classes
if (!$padding_top) :
    array_push($custom_classes_array, "no-padding-top");
endif;

// Add Padding bottom to classes
if (!$padding_bottom) :
    array_push($custom_classes_array, "no-padding-bottom");
endif;

// Handle justification 
if ($justify_image == 'right') :
    // add flip class to cta section
    array_push($custom_classes_array, "flip-horizontally");
endif;

$custom_classes = implode(" ", $custom_classes_array);

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/image', 'core/spacer', 'core/columns', 'core/column', 'core/buttons', 'acf/accordion'];

?>

<!-- CTA Section Block -->
<section id="<?= esc_attr($id); ?>" class="cta-section <?= esc_attr($className); ?> <?= $custom_classes; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="inner-container col-12 gutenberg-content" data-aos="fade-up">
                <div class="circular-image-container col-12 col-xl-6">
                    <?= $image ?>
                </div>
                <div class="text-container col-12 col-xl-6 ">
                    <div class="hover-effect-1">
                        <a href="<?= $page_link ?>">
                            <h3><?= $heading ?> </h3>
                            <div class="text-and-link-container">
                                <p><?= $body ?> </p>
                                <?= $anchor_svg ?>
                            </div>
                        </a>
                    </div>
                </div>
                <?= '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />'; ?>
            </div>
        </div>
    </div>
</section>