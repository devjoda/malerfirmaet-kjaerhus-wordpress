<?

/**
 * Standard Superego Kunder
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'kunder-' . $block['id'];
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'kunder-block';
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

$custom_classes = implode(" ", $custom_classes_array);

// Allowed InnerBlocks
$allowed_blocks = ['core/heading', 'core/paragraph', 'core/image', 'core/spacer', 'core/columns', 'core/column', 'core/buttons', 'acf/accordion'];

?>

<!-- Kunder Block -->
<section id="<?= esc_attr($id); ?>" class="kunder <?= esc_attr($className); ?> <?= $custom_classes; ?>">
    <div data-aos="fade-up" class="container-fluid">
        <div class="row">
            <div class="link-block justify-right">
                <h2>Referencer</h2>
            </div>
            <div class="kunder-wrapper gutenberg-content" data-aos="fade-in">

                <?
                // WP_Query arguments
                $args = array(
                    'post_type'      => 'kunder',
                    'posts_per_page' => -1,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order',
                );

                // The Query
                $query = new WP_Query($args);
                $posts = $query->posts;
                foreach ($posts as $post) :
                ?>

                    <div class="logo col-12 col-md-6">
                        <?= get_the_post_thumbnail($post->ID, 'medium'); ?>
                    </div>

                <?
                endforeach;
                wp_reset_query();
                ?>

                <?= '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />'; ?>
            </div>
        </div>
    </div>
</section>