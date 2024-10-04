<?php
class Themesflat_Author_Box extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Author_Box
     */
    function __construct() {
        $this->defaults = array(
            'title' 	=> '',
			'name' => 'Rosalina D. Willaim',
			'position' => 'Blogger/Photographer',
			'description' => 'he whimsically named Egg Canvas is the design director and photographer in New York. Why the nam',
            
            'value'         => 'facebook',
        );
        parent::__construct(
            'widget_author_box',
            esc_html__( 'Themesflat - Author Box', 'vitour' ),
            array(
                'classname'   => 'tf-widget-author-box',
                'description' => esc_html__( 'Author Box.', 'vitour' )
            )
        );
    }

    /**
     * Display widget
     */
	function widget($args, $instance)
    {
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ). wp_kses_post( $args['after_title'] );
		}
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );
        echo wp_kses_post( $before_widget );
        $post_id = get_the_ID();
        $author_id = get_post_field('post_author', $post_id);
        $author_name = get_the_author_meta('display_name', $author_id);
        $author_image = get_avatar_url($author_id);
        $author_desc = get_the_author_meta('description', $author_id);

        ?>
        <div class="box-author">
            <div class="img-author">
                <img src="<?php echo esc_attr( $instance['image'] ); ?>" alt="image">
            </div>
			<h6 class="name"><?php echo esc_attr( $instance['name'] ); ?></h6>
			<div class="position"><?php echo esc_attr( $instance['position'] ); ?></div>
            <p class="description"><?php echo esc_attr( $instance['description'] ); ?></p>
            <?php $this->themesflat_render_social_widget('',$instance['value'],true);?>
        </div>
        <?php
        echo wp_kses_post( $after_widget );
    }

    /**
     * Update widget
     */
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['image'] = strip_tags( $new_instance['image'] );

		$instance['description'] = strip_tags( $new_instance['description'] );
		$instance['position'] = strip_tags( $new_instance['position'] );
		$instance['name'] = strip_tags( $new_instance['name'] );

        $instance['value']          = ( $new_instance['value'] );

        return $instance;
    }

    /**
     * Widget setting
     */
    function form($instance)
    {
        wp_enqueue_script('themesflat_customizer_js');

        $instance = wp_parse_args( $instance, $this->defaults );

		$title = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

		$image = !empty( $instance['image'] ) ? esc_attr( $instance['image'] ) : '';

		$description = !empty( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
		$position = !empty( $instance['position'] ) ? esc_attr( $instance['position'] ) : '';
		$name = !empty( $instance['name'] ) ? esc_attr( $instance['name'] ) : '';


        $icons = $this->themesflat_available_social_icons_widget();
        $value = $instance['value'];
        $order = $icons['__ordering__'];
        if ( ! is_array( $value ) ) {
            $decoded_value = json_decode(str_replace('&quot;', '"', $value), true );
            $value = is_array( $decoded_value ) ? $decoded_value : array();
        }
        if ( isset( $value['__ordering__'] ) && is_array( $value['__ordering__'] ) )
            $order = $value['__ordering__'];
        ?>
		

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'vitour' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php esc_html_e( 'Image Link:', 'vitour' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Name:', 'vitour' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'position' ) ); ?>"><?php esc_html_e( 'position:', 'vitour' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'position' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'position' ) ); ?>" type="text" value="<?php echo esc_attr( $position ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'vitour' ); ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo wp_kses( $description, array(
					'a' => array(
						'href' => array()
					),
					'br' => array(),
					'strong' => array(),
					'b' => array()
				) ); ?></textarea>
		</p>

        <p>
			<label ><?php esc_html_e( 'Social:', 'vitour' ); ?></label>
            <div class="themesflat_widget_socials themesflat-options-control-social-icons">
                <ul class="themesflat_icons">
                    <li class="item-properties">
                        <label>
                            <span class="input-title"></span>
                            <input type="text" class="input-field" />
                        </label>
                        <button type="button" class="button button-primary confirm"><i class="icon-vitour-plus"></i></button>
                    </li>
                    <?php foreach ( $order as $id ):
                        $params = $icons[$id];                    
                        $link = isset( $value[$id] ) ? sprintf( 'data-link="%s"', esc_attr( $value[$id] ) ) : '';
                        ?>
                        <li class="item flat-<?php echo esc_attr( $id ) ?>" data-id="<?php echo esc_attr( $id ) ?>" <?php echo esc_attr($link) ?> data-title="<?php echo esc_attr( $params['title'] ) ?>">
                            <i class="<?php echo esc_attr( $params['iclass'] ) ?>"></i>
                        </li>
                    <?php endforeach ?>
                </ul>
                <input type="hidden" id="typography-value"  name="<?php echo esc_attr($this->get_field_name('value'));?>"  value="<?php echo esc_attr(  $instance['value'] ) ?>" />
            </div>
        </p>
        <?php
    }


    function themesflat_available_social_icons_widget() {
        $icons = apply_filters( 'themesflat_available_icons', array(
            'facebook'       => array( 'iclass' => 'icon-vitour-facebook', 'title' => 'Facebook','share_link'=> THEMESFLAT_PROTOCOL . '://www.facebook.com/sharer/sharer.php?u=' ),
            'twitter'        => array( 'iclass' => 'icon-vitour-twitter', 'title' => 'Twitter','share_link' => THEMESFLAT_PROTOCOL . '://twitter.com/intent/tweet?url=' ),
            'vimeo'          => array( 'iclass' => 'icon-vitour-vimeo', 'title' => 'Vimeo','share_link' =>'' ),
            'google-plus-g'    => array( 'iclass' => 'icon-vitour-google-plus', 'title' => 'Google Plus','share_link'=> THEMESFLAT_PROTOCOL . '://plus.google.com/share?url=' ),
            'pinterest'      => array( 'iclass' => 'icon-vitour-pinterest', 'title' => 'Pinterest','share_link' => THEMESFLAT_PROTOCOL . '://pinterest.com/pin/create/bookmarklet/?url=' ),
            'instagram'      => array( 'iclass' => 'icon-vitour-instagram', 'title' => 'Instagram','share_link' => 'https://www.instagram.com/?url=' ),
            'youtube'        => array( 'iclass' => 'icon-vitour-youtube', 'title' => 'Youtube','share_link' =>'' ),
            
            'behance'        => array( 'iclass' => 'icon-vitour-behance', 'title' => 'Behance','share_link' =>'' ),
            'bitcoin'        => array( 'iclass' => 'icon-vitour-bitcoin', 'title' => 'Bitcoin','share_link' =>'' ),
            'digg'           => array( 'iclass' => 'icon-vitour-digg', 'title' => 'Digg','share_link' =>'http://digg.com/submit?url=' ),
            'skype'          => array( 'iclass' => 'icon-vitour-skype', 'title' => 'Skype','share_link' => THEMESFLAT_PROTOCOL . '://web.skype.com/share?url='),
            'slack'          => array( 'iclass' => 'icon-vitour-slack', 'title' => 'Slack','share_link' => ''),
            'spotify'        => array( 'iclass' => 'icon-vitour-spotify', 'title' => 'Spotify','share_link' => ''),
            'stack-overflow' => array( 'iclass' => 'icon-vitour-stack-overflow', 'title' => 'Stack Overflow','share_link' => ''),
            'steam'          => array( 'iclass' => 'icon-vitour-steam', 'title' => 'Steam','share_link' => ''),
            'dribble'          => array( 'iclass' => 'icon-vitour-dribble', 'title' => 'Dribble','share_link' => ''),
            'linkedin2'          => array( 'iclass' => 'icon-vitour-linkedin2', 'title' => 'Linkedin','share_link' => ''),
        ) );
    
        $icons['__ordering__'] = array_keys( $icons );
    
        return $icons;
    }

    function themesflat_render_social_widget($prefix = '',$value='',$show_title=false) {
        if ($value == '') {
            $value = $this->themesflat_get_json_widget('social_links');
        }
        $class= array();
        $class[] = ($show_title == false ? 'themesflat-socials' : 'themesflat-shortcode-socials');

        if ( ! is_array( $value ) ) {
            $decoded_value = json_decode($value, true );
            $value = is_array( $decoded_value ) ? $decoded_value : array();
        }

        $icons = $this->themesflat_available_social_icons_widget();

        ?>
        <ul class="<?php echo esc_attr(implode(" ", $class));?>">
            <?php
            foreach ( $value as $key => $val ) {
                if ($key != '__ordering__') {
                    $title = ($show_title == false ? '' : $icons[$key]['title']);
                    $icon = ($show_title == false ? '' : $icons[$key]['iclass']);
                    printf(
                        '<li class="%s">
                            <a href="%s" target="_blank" rel="alternate" title="%s">
                                <i class="%s"></i>                            
                            </a>
                        </li>',
                        esc_attr( $key ),
                        esc_url( $val ),
                        esc_attr( $val ),
                        esc_attr( $icon ),
                        esc_html($title)
                    );
                }
        }
            ?>
        </ul><!-- /.social -->       
        <?php 
    }


}

add_action( 'widgets_init', 'themesflat_register_authorbox' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_register_authorbox() {
    register_widget( 'Themesflat_Author_Box' );
}