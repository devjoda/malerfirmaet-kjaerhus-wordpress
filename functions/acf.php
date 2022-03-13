<?
/* 
Settings for Advanced Custom Fields Plugin

Dashicons: https://developer.wordpress.org/resource/dashicons/
ACF Documentation: https://www.advancedcustomfields.com/resources/
*/

// Superego theme settings options page
if (function_exists('acf_add_options_page')) :

	// Top level option group
	acf_add_options_page(array(
		'page_title' 	=> 'Præferencer',
		'menu_title'	=> 'Præferencer',
		'menu_slug' 	=> 'preferences',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	// Footer
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Firmainfo',
		'menu_title'	=> 'Firmainfo',
		'parent_slug'	=> 'preferences',
	));

	// Indstillinger
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Indstillinger',
		'menu_title'	=> 'Indstillinger',
		'parent_slug'	=> 'preferences',
	));

	// Scripts & kode
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Scripts & kode',
		'menu_title'	=> 'Scripts & kode',
		'parent_slug'	=> 'preferences',
	));
endif;

// If ACF is installed run everything
if (class_exists('ACF')) :

	define('ACF_PRO_LICENSE', 'YWIwN2NiOGRhYjJlM2E4YzUzY2U5YTBkZDBmODYwNWFiN2JjNGNkY2VhNzZiNDFkMjU0MTIy');

	// Add Google Maps API from Theme Customizer input
	if (get_theme_mod('setting_google_maps')) :
		function superego_google_maps()
		{
			acf_update_setting('google_api_key', get_theme_mod('setting_google_maps'));
		}
		add_action('acf/init', 'superego_google_maps');
	endif;

	// Register custom Gutenberg Block categoies
	function superego_block_category($categories, $post)
	{
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'superego-blocks',
					'title' => __('Superego Blocks', 'superego-blocks'),
				),
				array(
					'slug' => 'superego-bootstrap',
					'title' => __('Bootstrap', 'superego-bootstrap'),
				)
			)
		);
	}
	add_filter('block_categories', 'superego_block_category', 10, 2);

	// Gutenberg Block Class
	class ACF_Block
	{
		// Properties
		public $name;
		public $title;
		public $description;
		public $category;
		public $keywords;

		// Methods
		function __construct($name, $title, $description, $category, $icon, array $keywords)
		{
			$this->name = $name;
			$this->title = $title;
			$this->description = $description;
			$this->category = $category;
			$this->icon = $icon;
			$this->keywords = $keywords;
		}

		// Get Block name function
		function get_name()
		{
			return $this->name;
		}

		// Register ACF Block
		function register_block()
		{
			$directory = get_template_directory_uri() . '/template-parts/blocks/';
			$template = 'template-parts/blocks/';
			$enqueue_js = get_stylesheet_directory() . '/' . $template . $this->name . '/' . $this->name . '.js';
			$enqueue_style = get_stylesheet_directory() . '/' . $template . $this->name . '/' . $this->name . '.css';

			$block_array = [
				'name'              => $this->name,
				'title'             => $this->title,
				'description'       => $this->description,
				'category'          => $this->category,
				'mode' 				=> 'preview',
				'icon'              => $this->icon,
				'keywords'          => $this->keywords,
				'supports'          => ['jsx' => true, 'align' => false],
				'render_template'   => $template . $this->name . '/' . $this->name . '.php',
			];

			// If a .js file exists in the block directory
			if (file_exists($enqueue_js)) :
				$block_array['enqueue_script'] = $directory . $this->name . '/' . $this->name . '.js';
			endif;

			// If a .css file exists in the block directory
			if (file_exists($enqueue_style)) :
				$block_array['enqueue_style'] = $directory . $this->name . '/' . $this->name . '.css';
			endif;

			acf_register_block_type($block_array);
		}
	}

	// Add new custom blocks here
	$custom_blocks = [

		// Standard Medarbejder block
		$medarbejdere = new ACF_Block(
			'medarbejdere',
			'Medarbejdere',
			'Standard block til visning af virksomhedens medarbejdere',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/template-parts/blocks/medarbejdere/medarbejdere.svg'),
			['Medarbejdere', 'Afdelinger', 'Employees']
		),

		// Standard Swiper block
		$swiper = new ACF_Block(
			'swiper',
			'Swiper Slider',
			'Standard block til visning af slider',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/template-parts/blocks/swiper/swiper.svg'),
			['Swiper', 'Slider']
		),
		// Standard CTA-section block
		$cta_section = new ACF_Block(
			'cta-section',
			'CTA-sektion',
			'Standard block til CTA-sektioner',
			'superego-blocks',
			'block-default',
			['CTA', 'Sektion', 'CTA-sektion']
		),
		// Standard Section block
		$section = new ACF_Block(
			'section',
			'Sektion',
			'Standard sektions block. Kan indeholde tekst, overskrift, billeder mm.',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/template-parts/blocks/section/section.svg'),
			['Section', 'Sektion', 'Container']
		),

		// Standard Accordion block
		$accordion = new ACF_Block(
			'accordion',
			'Harmonika',
			'Standard Harmonika block.',
			'superego-blocks',
			file_get_contents(get_template_directory() . '/template-parts/blocks/accordion/accordion.svg'),
			['Accordion', 'Harmonika']
		),

		// Standard Seperator block
		$seperator = new ACF_Block(
			'seperator',
			'Seperator',
			'Standard block til seperator',
			'superego-blocks',
			'block-default',
			['Seperator']
		),

		// Standard Hero block
		$hero = new ACF_Block(
			'hero',
			'Hero',
			'Standard block til hero',
			'superego-blocks',
			'block-default',
			['Hero']
		),
		// Standard Anchor block
		$link = new ACF_Block(
			'link',
			'Link',
			'Standard block til links',
			'superego-blocks',
			'block-default',
			['Link', 'Anchor']
		),
		$wall_of_fame_section = new ACF_Block(
			'wall-of-fame-section',
			'Wall-of-Fame-sektion',
			'Standard block til WOF-sektioner',
			'superego-blocks',
			'block-default',
			['Wall of fame', 'WOF', 'WOF-sektion']
		),
		$kunder = new ACF_Block(
			'kunder',
			'Kunder',
			'Standard block til kunder',
			'superego-blocks',
			'block-default',
			['Kunder', 'logo', 'referencer']
		),
	];

	// Array for all custom allowed blocks
	$custom_allowed_blocks = [];

	// Loop though and register all instances of ACF_Block class
	foreach ($custom_blocks as $block) :
		$block->register_block();
		array_push($custom_allowed_blocks, 'acf/' . $block->get_name());
	endforeach;

endif;

// Register custom Gutenberg Blocks (Old and custom way)
// function register_acf_block_types()
// {
// 	// Block Directory & Render Template
// 	$block_dir = get_template_directory_uri() . '/template-parts/blocks/';
// 	$render_template = 'template-parts/blocks/';

// 	// Gutenberg Block Starter Template
// 	$block_name = 'gutenberg-block';
// 	acf_register_block_type([
// 		'name'              => $block_name,
// 		'title'             => __('Custom block'),
// 		'description'       => __('Dette er en speciallavet block af Superego.'),
// 		'category'          => 'superego-blocks',
// 		'mode' 				=> 'preview',
// 		'icon'              => 'block-default',
// 		'keywords'          => ['Gutenberg', 'Custom', 'Superego'],
// 		'supports'          => ['jsx' => true],
// 		'render_template'   => $render_template . $block_name . '/' . $block_name . '.php',
// 		'enqueue_style'     => $block_dir . $block_name . '/' . $block_name . '.css',
// 		'enqueue_script'    => $block_dir . $block_name . '/' . $block_name . '.js',
// 		// Preview
// 		'example'           => [
// 			'attributes' => [
// 				'data' => [
// 					'text'   		=> "Din tekst her...",
// 					'is_preview'	=> true
// 				]
// 			]
// 		],
// 	]);
// };

if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
};

// Define allowed Gutenberg blocks
function superego_allowed_block_types($allowed_blocks)
{
	$core_blocks = array(
		/** Core Blocks */
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/code',
		'core/separator',
		'core-embed/youtube',
		'core/buttons',
		'core/button',
		'core/columns',
		'core/column',
		'core/video',
		'core/spacer',
		'core/gallery',
		'core/file',
		'core/shortcode',
		'core/table',
		'core/text-columns',
		'core/group',
		'core/html',
		'core/search',
		'core/social-links',
		'core/social-link',
		'core/reusable-block',
		'core/media-text',
		'core/lastest-posts',
		'core/classic',
		'core/quote',
		'core/cover',
	);

	// Combine custom and core block arrays. Return one combined array
	$superego_allowed_blocks = array_merge($GLOBALS['custom_allowed_blocks'], $core_blocks);
	return $superego_allowed_blocks;
};
add_filter('allowed_block_types', 'superego_allowed_block_types');
