<?

/**
 * Standard Superego Section
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "link" value.
$id = 'link-' . $block['id'];
if (!empty($block['link'])) :
    $id = $block['link'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'link-block';
if (!empty($block['className'])) :
    $className .= ' ' . $block['className'];
endif;

if (!empty($block['align'])) :
    $className .= ' align' . $block['align'];
endif;

$custom_classes_array = array();

// Block padding control
$padding_top = get_field('block_padding_top');
$padding_bottom = get_field('block_padding_bottom');

// Block anchors fields
$label = get_field('block_anchor_label');
$page_link = get_field('block_anchor_page_link');
$justify = get_field('block_anchor_justify');

if ($justify) :
    switch ($justify) {
        case 'left':
            array_push($custom_classes_array, "justify-left");
            break;
        case 'center':
            array_push($custom_classes_array, "justify-center");
            break;
        case 'right':
            array_push($custom_classes_array, "justify-right");
            break;
        default:
            array_push($custom_classes_array, "justify-left");
            break;
    }
endif;

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

<!-- Link Block -->
<div id="<?= esc_attr($id); ?>" class="container-fluid link <?= esc_attr($className); ?> <?= $custom_classes; ?>">
    <a href="<?= $page_link ?>">
        <h2><?= $label ?></h2>
    </a>
    <?= '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />'; ?>
</div>