<?php

function whenalive_setup() {

	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// This theme supports a variety of post formats.
	add_theme_support('post-formats', array('aside', 'image', 'link', 'quote', 'status'));
	
	// Register Navigation
	register_nav_menus(array('primary' => 'Primary Navigation'));

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'whenalive_setup');

function whenalive_scripts() {
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
	wp_enqueue_style('styles', get_template_directory_uri().'/css/styles.css');
	wp_enqueue_style('main-style', get_stylesheet_uri());

	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '', true);
	wp_enqueue_script('function', get_template_directory_uri().'/js/functions.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'whenalive_scripts');

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

?>

<?php //this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="media single-comment">
			<div class="media-left">
				<?php echo get_avatar($comment,$size='45',$default='<path_to_url>' ); ?>
			</div>
			<div class="media-body">
				<h4 class="media-heading comment-author-name">
					<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a>
					<small><i><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></i></small>
				</h4>

				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>

				<p><?php comment_text() ?></p>

				<div class="reply">
					<i class="fa fa-reply" aria-hidden="true"></i>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php delete_comment_link(get_comment_ID()); ?>
				</div>
			</div>
		</div>


		<div class="clear"></div>
	</li>
<?php } ?>


<?php
// delete comment
function delete_comment_link($id) {
	if (current_user_can('edit_post')) {
		echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a> ';
		echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'"><i class="fa fa-times" aria-hidden="true"></i> Spam</a>';
	}
}
?>

<?php function check_referrer() {
	if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
		wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, get out of here!') );
	}
}

add_action('check_comment_flood', 'check_referrer');
?>
