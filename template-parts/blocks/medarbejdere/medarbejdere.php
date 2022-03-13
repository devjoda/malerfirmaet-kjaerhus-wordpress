<?

/**
 * Medarbejder Block
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'medarbejdere-' . $block['id'];
if (!empty($block['anchor'])) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'medarbejdere';
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
    $className .= ' align' . $block['align'];
endif;

global $post;

// Add Padding top to classes
if (!$padding_top) :
    array_push($custom_classes_array, "no-padding-top");
endif;

// Add Padding bottom to classes
if (!$padding_bottom) :
    array_push($custom_classes_array, "no-padding-bottom");
endif;

$custom_classes = implode(" ", $custom_classes_array);

?>

<section id="<?= esc_attr($id); ?>" class="section <?= esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <?
            // WP_Query arguments
            $args = array(
                'post_type'      => 'medarbejdere',
                'posts_per_page' => -1,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
            );

            // The Query
            $query = new WP_Query($args);
            $posts = $query->posts;

            foreach ($posts as $post) :
                $navn = get_field('medarbejder_navn', $post->ID) ?: 'Navn';
                $stilling = get_field('medarbejder_stilling', $post->ID) ?: 'Stilling';
                $email = get_field('medarbejder_email', $post->ID) ?: 'din@email.dk';
                $telefon = get_field('medarbejder_telefonnummer', $post->ID) ?: '12345678';
            ?>

                <div class="col-md-6 medarbejder-column">
                    <div class="medarbejder" data-aos="fade-up">
                        <figure class="image-figure">
                            <?= the_post_thumbnail('full', ['data-aos' => 'zoom-out', 'data-aos-anchor-placement' => 'top-bottom']); ?>
                        </figure>
                        <div class="medarbejder__inner">
                            <h3 class="medarbejder__navn"><?= $navn; ?></h3>
                            <p class="medarbejder__stilling"><?= $stilling; ?></p>
                            <div class="medarbejder__kontakt">
                                <a href="tel:<?= $telefon; ?>"><?= $telefon; ?></a>
                                <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                            </div>
                        </div>
                    </div>
                </div>

            <? endforeach; ?>
        </div>
    </div>
</section>