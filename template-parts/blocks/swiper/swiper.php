<?

/**
 * Standard Swiper.js slider block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'swiper-' . $block['id'];
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'swiper';
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
    $className .= ' align' . $block['align'];
endif;

// Load values and assign defaults.
$field = get_field('field') ?: 'field';

// Add Padding top to classes
if (!$padding_top) :
    array_push($custom_classes_array, "no-padding-top");
endif;

// Add Padding bottom to classes
if (!$padding_bottom) :
    array_push($custom_classes_array, "no-padding-bottom");
endif;

$custom_classes = implode(" ", $custom_classes_array);

// Register Swiper if not already included
if (!wp_script_is('swiper-js')) :
    wp_enqueue_script('swiper-js', THEME . '/assets/scripts/vendors/swiper-bundle.min.js', array('jquery'), false, false);
    wp_enqueue_style('swiper-style', THEME . '/assets/styles/vendors/swiper-bundle.min.css');
endif;
?>

<section id="<?= esc_attr($id); ?>" class="section <?= esc_attr($className); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div data-aos="fade-up" class="swiper-container swiper-slider">
                    <div class="swiper-wrapper">
                        <?
                        // WP_Query arguments
                        $args = array(
                            'post_type'      => 'projekter',
                            'posts_per_page' => -1,
                            'order'          => 'DESC',
                            'orderby'        => 'ID',
                        );

                        // The Query
                        $query = new WP_Query($args);
                        $posts = $query->posts;
                        $count = 0;
                        foreach ($posts as $post) :
                            $projekt_billede = get_the_post_thumbnail($post->ID, 'full');
                            $projekt_overskrift = get_the_title($post->ID);
                            $projekt_beskrivelse = get_field('projekt_beskrivelse', $post->ID) ?: 'Beskrivelse';
                            $projekt_billedgalleri = get_field('projekt_billedgalleri', $post->ID);

                            $count++;
                        ?>
                            <div class="swiper-slide">
                                <a data-fancybox="projekt-<?= $count ?>" href="<?= get_the_post_thumbnail_url($post->ID, 'full') ?>">
                                    <?= $projekt_billede; ?>
                                    <div class="text">
                                        <h3 class="header"><?= $projekt_overskrift; ?></h3>
                                        <p class="body"><?= $projekt_beskrivelse ?></p>
                                    </div>
                                </a>
                            </div>

                            <div class="fancybox-image-container">
                                <? foreach ($projekt_billedgalleri as $billede_url) : ?>
                                    <img data-fancybox="projekt-<?= $count ?>" src="<?= $billede_url ?>" />
                                <? endforeach ?>
                            </div>
                        <? endforeach; ?>
                        <? wp_reset_query(); ?>
                    </div>
                    <div class="swiper-details">
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev-slide"><?= svg_image('arrow-left') ?></div>
                            <div class="swiper-button-next-slide"><?= svg_image('arrow-right') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>