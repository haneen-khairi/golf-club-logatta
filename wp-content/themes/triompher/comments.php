<?php
/**
 * The template to display the Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;



// Callback for output single comment layout
if (!function_exists('triompher_output_single_comment')) {
	function triompher_output_single_comment( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) {
			case 'pingback' :
				?>
				<li class="trackback"><?php esc_html_e( 'Trackback:', 'triompher' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'triompher' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			case 'trackback' :
				?>
				<li class="pingback"><?php esc_html_e( 'Pingback:', 'triompher' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'triompher' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			default :
				$author_id = $comment->user_id;
				$author_link = get_author_posts_url( $author_id );
				$mult = triompher_get_retina_multiplier();
				?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class('comment_item'); ?>>
					<div id="comment_body-<?php comment_ID(); ?>" class="comment_body">
						<div class="comment_author_avatar"><?php echo get_avatar( $comment, 101*$mult ); ?></div>
						<div class="comment_content">
							<div class="comment_info">
								<h6 class="comment_author"><?php echo (!empty($author_id) ? '<a href="'.esc_url($author_link).'">' : '') . comment_author() . (!empty($author_id) ? '</a>' : ''); ?></h6>
								<div class="comment_posted">
									<span class="comment_date"><?php
										echo triompher_get_date(get_comment_date('U'));
									?></span>
									<span class="comment_posted_label"><?php esc_html_e('at', 'triompher'); ?></span>
									<span class="comment_time"><?php
										echo get_comment_date(get_option('time_format'));
									?></span>
									<?php if ( $comment->comment_approved == 1 ) { ?>
									<span class="comment_counters"><?php triompher_show_comment_counters(); ?></span>
									<?php } ?>
								</div>
								<?php
								if ($depth < $args['max_depth']) {
									?><div class="reply comment_reply"><?php
									comment_reply_link( array_merge( $args, array(
												'add_below' => 'comment_body',
												'depth' => $depth,
												'max_depth' => $args['max_depth']
											)
										)
									);
									?></div><?php
								}
								?>
							</div>
							<div class="comment_text_wrap">
								<?php if ( $comment->comment_approved == 0 ) { ?>
								<div class="comment_not_approved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'triompher' ); ?></div>
								<?php } ?>
								<div class="comment_text"><?php comment_text(); ?></div>
							</div>
						</div>
					</div>
				<?php
				break;
		}
	}
}


// Return template for the single field in the comments
if (!function_exists('triompher_single_comments_field')) {
	function triompher_single_comments_field($args) {
		$path_height = $args['form_style'] == 'path' 
							? ($args['field_type'] == 'text' ? 75 : 190)
							: 0;
		return '<div class="comments_field comments_'.esc_attr($args['field_name']).'">'
					. ($args['form_style'] == 'default' 
						? '<label for="comment" class="'.esc_attr($args['field_req'] ? 'required' : 'optional') . '">' . esc_html($args['field_title']) . '</label>'
						: ''
						)
					. '<span class="sc_form_field_wrap">'
						. ($args['field_type']=='text'
							? '<input id="'.esc_attr($args['field_name']).'" name="'.esc_attr($args['field_name']).'" type="text"' . ($args['form_style']=='default' ? ' placeholder="'.esc_attr($args['field_placeholder']) . ($args['field_req'] ? ' *' : '') . '"' : '') . ' value="' . esc_attr($args['field_value']) . '"' . ( $args['field_req'] ? ' aria-required="true"' : '' ) . ' />'
							: '<textarea id="'.esc_attr($args['field_name']).'" name="'.esc_attr($args['field_name']).'"' . ($args['form_style']=='default' ? ' placeholder="'.esc_attr($args['field_placeholder']) . ($args['field_req'] ? ' *' : '') . '"' : '') . ( $args['field_req'] ? ' aria-required="true"' : '' ) . '></textarea>'
							)
						. ($args['form_style']!='default'
							? '<span class="sc_form_field_hover">'
									. ($args['form_style'] == 'path'
										? '<svg class="sc_form_field_graphic" preserveAspectRatio="none" viewBox="0 0 520 ' . intval($path_height) . '" height="100%" width="100%"><path d="m0,0l520,0l0,'.intval($path_height).'l-520,0l0,-'.intval($path_height).'z"></svg>'
										: ''
										)
									. ($args['form_style'] == 'iconed'
										? '<i class="sc_form_field_icon '.esc_attr($args['field_icon']).'"></i>'
										: ''
										)
									. '<span class="sc_form_field_content" data-content="'.esc_attr($args['field_title']).'">'.esc_html($args['field_title']).'</span>'
								. '</span>'
							: ''
							)
					. '</span>'
				. '</div>';
	}
}


// Output comments list
if ( have_comments() || comments_open() ) {
	?>
	<section class="comments_wrap">
	<?php
	if ( have_comments() ) {
	?>
		<div id="comments" class="comments_list_wrap">
			<h3 class="section_title comments_list_title"><?php $triompher_post_comments = get_comments_number(); echo esc_html($triompher_post_comments); ?> <?php echo (1==$triompher_post_comments ? esc_html__('Comment', 'triompher') : esc_html__('Comments', 'triompher')); ?></h3>
			<ul class="comments_list">
				<?php
				wp_list_comments( array('callback'=>'triompher_output_single_comment') );
				?>
			</ul><!-- .comments_list -->
			<?php if ( !comments_open() && get_comments_number()!=0 && post_type_supports( get_post_type(), 'comments' ) ) { ?>
				<p class="comments_closed"><?php esc_html_e( 'Comments are closed.', 'triompher' ); ?></p>
			<?php }	?>
			<div class="comments_pagination"><?php paginate_comments_links(); ?></div>
		</div><!-- .comments_list_wrap -->
	<?php 
	}

	if ( comments_open() ) {
		?>
		<div class="comments_form_wrap">
			<div class="comments_form">
				<?php
				$triompher_form_style = esc_attr(triompher_get_theme_option('input_hover'));
				if (empty($triompher_form_style) || triompher_is_inherit($triompher_form_style)) $triompher_form_style = 'default';
				$triompher_commenter = wp_get_current_commenter();
				$triompher_req = get_option( 'require_name_email' );
				$triompher_comments_args = apply_filters( 'triompher_filter_comment_form_args', array(
						// class of the 'form' tag
						'class_form' => 'comment-form ' . ($triompher_form_style != 'default' ? 'sc_input_hover_' . esc_attr($triompher_form_style) : ''),
						// change the id of send button 
						'id_submit' => 'send_comment',
						// change the title of send button 
						'label_submit' => esc_html__('Add Your Comment', 'triompher'),
						// change the title of the reply section
						'title_reply' => esc_html__('Add Your Comment', 'triompher'),
						'title_reply_before' => '<h3 id="reply-title" class="section_title comments_form_title comment-reply-title">',
						'title_reply_after' => '</h3>',

						// remove "Logged in as"
						'logged_in_as' => '',
						// remove text before textarea
						'comment_notes_before' => '',
						// remove text after textarea
						'comment_notes_after' => '',
						'fields' => array(
							'author' => triompher_single_comments_field(array(
												'form_style' => $triompher_form_style,
												'field_type' => 'text',
												'field_req' => $triompher_req,
												'field_icon' => 'icon-user',
												'field_value' => isset($triompher_commenter['comment_author']) ? $triompher_commenter['comment_author'] : '',
												'field_name' => 'author',
												'field_title' => esc_attr__('Name', 'triompher'),
												'field_placeholder' => esc_attr__( 'Your Name', 'triompher' )
											)),
							'email' => triompher_single_comments_field(array(
												'form_style' => $triompher_form_style,
												'field_type' => 'text',
												'field_req' => $triompher_req,
												'field_icon' => 'icon-mail',
												'field_value' => isset($triompher_commenter['comment_author_email']) ? $triompher_commenter['comment_author_email'] : '',
												'field_name' => 'email',
												'field_title' => esc_attr__('E-mail', 'triompher'),
												'field_placeholder' => esc_attr__( 'Your E-mail', 'triompher' )
											))
						),
						// redefine your own textarea (the comment body)
						'comment_field' => triompher_single_comments_field(array(
												'form_style' => $triompher_form_style,
												'field_type' => 'textarea',
												'field_req' => true,
												'field_icon' => 'icon-feather',
												'field_value' => '',
												'field_name' => 'comment',
												'field_title' => esc_attr__('Comment', 'triompher'),
												'field_placeholder' => esc_attr__( 'Your comment', 'triompher' )
											)),
				));
			
				comment_form($triompher_comments_args);
				?>
			</div>
		</div><!-- /.comments_form_wrap -->
		<?php 
	}
	?>
	</section><!-- /.comments_wrap -->
<?php 
}
?>