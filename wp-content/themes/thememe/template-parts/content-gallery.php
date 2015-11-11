<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

?>

<?php
	$galleries_data = get_post_meta( get_the_ID(), 'gallery', true );



        $photos=explode(',', $galleries_data);

        if(!empty($photos)){

            foreach ($photos as $key_photo => $photo) {

                $photo_meta=wp_prepare_attachment_for_js($photo);

                $photo_url=wp_get_attachment_image_src($photo,'thumb-blog'); //https://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src

                echo '<a class="fancybox" href="'.$photo_meta['url'].'"><img src="'.$photo_url[0].'"></a>'; //$photo_url[0] 

            }

        }

   