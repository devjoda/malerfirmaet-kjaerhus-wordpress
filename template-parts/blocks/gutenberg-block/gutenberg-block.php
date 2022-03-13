<?

/**
 * Custom Gutenberg Block template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gutenberg-block-' . $block['id'];
if (!empty($block['anchor'])) :
	$id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gutenberg-block';
if (!empty($block['className'])) :
	$className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
	$className .= ' align' . $block['align'];
endif;

// Load values and assign defaults.
$text = get_field('text') ?: 'Default value';
$billede = get_field('billede') ?: 12;

?>

<section id="<?= esc_attr($id); ?>" class="section <?= esc_attr($className); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<figure class="image-figure">
					<?= wp_get_attachment_image($billede, 'large', false, ['class' => 'image']); ?>
				</figure>
			</div>
			<div class="col-md-6 tekst">
				<div class="inner">
					<h2><?= $text; ?></h2>
				</div>
			</div>
		</div>
	</div>
</section>