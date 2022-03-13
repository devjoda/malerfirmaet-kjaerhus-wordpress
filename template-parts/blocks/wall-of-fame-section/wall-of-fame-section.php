<?

/**
 * Standard Superego Wall of Fame section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'wall-of-fame-section-' . $block['id'];
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wall-of-fame-section-block';
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
    $className .= ' align' . $block['align'];
endif;

// ACF Variables
$padding_top = get_field('block_padding_top');
$padding_bottom = get_field('block_padding_bottom');
$heading = get_field('block_wall_of_fame_section_heading');
$body = get_field('block_wall_of_fame_section_body');
$wall_of_fame_page_link = get_permalink(490);

$custom_classes_array = array();

// Add Padding top to classes
if (!$padding_top) :
    array_push($custom_classes_array, "no-padding-top");
endif;

// Add Padding bottom to classes
if (!$padding_bottom) :
    array_push($custom_classes_array, "no-padding-bottom");
endif;

$custom_classes = implode(" ", $custom_classes_array);

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/image', 'core/spacer', 'core/columns', 'core/column', 'core/buttons', 'acf/accordion'];

?>

<!-- Wall of Fame section Block -->

<section id="<?= esc_attr($id); ?>" class="wall-of-fame-section <?= esc_attr($className); ?> <?= $custom_classes; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col gutenberg-content" data-aos="fade-up">
                <div class="inner-container">
                    <div class="heading-container">
                        <a href="<?= $wall_of_fame_page_link ?>">
                            <div class="hover-effect-1">
                                <h2><?= $heading ?></h2>
                            </div>
                        </a>
                    </div>
                    <div class="postkort-wrapper col-12 col-lg-6">
                        <?
                        // WP_Query arguments
                        $args = array(
                            'post_type'      => 'wall_of_fame',
                            'posts_per_page' => 3,
                            'order'          => 'ASC',
                            'orderby'        => 'menu_order',
                        );

                        // The Query
                        $query = new WP_Query($args);
                        $posts = $query->posts;
                        foreach ($posts as $post) :
                        ?>
                            <a href="<?= $wall_of_fame_page_link ?>" class="postkort">
                                <?= get_the_post_thumbnail($post->ID, 'full'); ?>
                            </a>
                        <?
                        endforeach;
                        wp_reset_query();
                        ?>
                    </div>
                    <div class="description-wrapper col-12 col-lg-3">
                        <div class="hover-effect-1">
                            <a href="<?= $wall_of_fame_page_link ?>" aria-label="Postkort">
                                <p><?= $body ?></p>
                                <div><?= svg_image('arrow-right') ?></div>
                            </a>
                        </div>
                    </div>
                </div>
                <?= '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />'; ?>
            </div>
        </div>
    </div>
</section>