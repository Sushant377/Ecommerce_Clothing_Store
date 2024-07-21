<?php
/**
 * Augmentation to the $_SERVER['DOCUMENT_ROOT'] functionality, because it cannot be relied on to provide the right path
 * in cases where there is URL rewriting at play.
 *
 * @param  $path
 * @return mixed|string
 */
function th_upload_dir($path) {
    // If the file exists under DOCUMENT_ROOT, return DOCUMENT_ROOT
    if (@file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $path)) {
        return $_SERVER['DOCUMENT_ROOT'];
    }
    // Get the path of the current script, then compare it with DOCUMENT_ROOT. Then check for the file in each folder.
    $parts = array_diff(explode('/', $_SERVER['SCRIPT_FILENAME']), explode('/', $_SERVER['DOCUMENT_ROOT']));
    $new_path = $_SERVER['DOCUMENT_ROOT'];
    foreach ($parts as $part) {
        $new_path .= '/' . $part;
        if (@file_exists($new_path . '/' . $path)) {
            return $new_path;
        }
    }
    // Microsoft Servers
    if (!isset($_SERVER['DOCUMENT_ROOT'])) {
        $new_path = str_replace("/", "\\", $_SERVER['ORIG_PATH_INFO']);
        $new_path = str_replace($new_path, "", $_SERVER['SCRIPT_FILENAME']);
        if (@file_exists($new_path . '/' . $path)) {
            return $new_path;
        }
    }
    return false;
}
/**
 * This function resizes images It takes image source,
 * width height and quality as a parameter
 * This function is based on the approach described by
 * Victor Teixeira here: http://core.trac.wordpress.org/ticket/15311.
 * @param  $img_url
 * @param  $width
 * @param  $height
 * @param bool $crop
 * @param  $quality
 * @return array with image URL, width and height
 */
if ((function_exists('is_multisite') && is_multisite()) || ($single_site = true)) {

    function th_image_resize($img_url, $width, $height, $crop = true, $quality = 100) {
        $upload_dir = wp_upload_dir();
        // This used to be the directory for the image cache prior to 3.7.2, so we will leave it that way...
        //echo "</br uploadbase=>".
        $newfile = $upload_dir['basedir']; // base directory
        $newsubdir = '/thumb-cache'; //subdirectory like:2012/11	
        $upload_path = $newfile . $newsubdir;
        //echo $upload_path = $upload_dir['path'];
        if (!file_exists($upload_path)) { // Create the directory if it is missing
            wp_mkdir_p($upload_path);
        }
        $file_path = parse_url($img_url);
        if (isset($file_path['host']) && $_SERVER['HTTP_HOST'] != $file_path['host'] && $file_path['host'] != '') {  // The image is not locally hosted
            $remote_file_info = pathinfo($file_path['path']); // Can't use $img_url as the parameter because pathinfo includes the 'query' for the URL
            if (isset($remote_file_info['extension'])) {
                $remote_file_extension = $remote_file_info['extension'];
            } else {
                $remote_file_extension = 'jpg';
            }
            $remote_file_extension = strtolower($remote_file_extension); // Not doing this creates multiple copies of a remote image.
            $file_base = md5($img_url) . '.' . $remote_file_extension;
            // We will try to copy the file over locally. Otherwise WP's native image_resize() breaks down.
            $copy_to_file = $upload_dir['path'] . '/' . $file_base;
            if (!file_exists($copy_to_file)) {
                $unique_filename = wp_unique_filename($upload_dir['path'], $file_base);
                // Using the HTTP API instead of our own CURL calls...
                $remote_content = wp_remote_request($img_url, array('sslverify' => false)); // Setting the sslverify argument, to prevent errors on HTTPS calls. A user embedding images in a post knows where he is pulling them from
                if (is_wp_error($remote_content)) {
                    $copy_to_file = '';
                } else {
                    // Not using file open functions, so you have to find your way around by using wp_upload_bits...
                    wp_upload_bits($unique_filename, null, $remote_content['body']);
                    $copy_to_file = $upload_dir['path'] . '/' . $unique_filename;
                }
            }
            $file_path = $copy_to_file;
        } else {
            $expath = $file_path['path'];
            $string = $expath;
            $find = '/files/';
            $findit = strpos($string, $find);
            //echo "</br> Findit=>".$findit;
            if ($findit === false) {
                $file_path = th_upload_dir($file_path['path']) . $file_path['path'];
            } else {
                $expath = $file_path['path'];
                $nefilepath = explode("/files", $expath);
                $newpathdir = $nefilepath[1];
                $filepath1 = $newfile . $newpathdir;
                $file_path = $filepath1;   // add to mainpath in $file_path
            }
        }
        if (!file_exists($file_path)) {
            $resized_image = array(
                'url' => $img_url,
                'width' => $width,
                'height' => $height
            );
            return $resized_image;
        }
        $extension = '.jpg';
        $orig_size = @getimagesize($file_path);
        $source[0] = $img_url;
        $source[1] = $orig_size[0];
        $source[2] = $orig_size[1];
        $file_info = pathinfo($file_path);
        if (isset($file_info['extension'])) {
            $extension = '.' . $file_info['extension'];
            //Image quality is scaled down in case of PNGs, because PNG image creation uses a different scale for quality.
            if ($extension == '.png' && $quality != null) {
                $quality = floor(0.09 * $quality);
            }
        }
        $crop_str = $crop ? '-crop' : '-nocrop';
        $quality_str = $quality != null ? '-' . $quality : '';
        $cropped_img_path = $upload_path . '/' . $file_info['filename'] . '-' . md5($file_path) . '-' . $width . 'x' . $height . $quality_str . $crop_str . $extension;

        $suffix = md5($file_path) . '-' . $width . 'x' . $height . $quality_str . $crop_str;
        //$img_path=str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
        // Checking if the file size is larger than the target size
        // If it is smaller or the same size, stop right here and return
        if ($source[1] > $width || $source[2] > $height) {
            // Source file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
            if (file_exists($cropped_img_path)) {
                $cropped_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
                $resized_image = array(
                    'url' => $cropped_img_url,
                    'width' => $width,
                    'height' => $height
                );
                return $resized_image;
            }
            if ($crop == false) {
                // Calculate the size proportionally
                $proportional_size = wp_constrain_dimensions($source[1], $source[2], $width, $height);
                $resized_img_path = $upload_path . '/' . $file_info['filename'] . '-' . md5($file_path) . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $quality_str . $crop_str . $extension;
                $suffix = md5($file_path) . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $quality_str . $crop_str;
                // Checking if the file already exists
                if (file_exists($resized_img_path)) {
                    $resized_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $resized_img_path);
                    $resized_image = array(
                        'url' => $resized_img_url,
                        'width' => $proportional_size[0],
                        'height' => $proportional_size[1]
                    );
                    return $resized_image;
                }
            }
            $img = wp_get_image_editor($file_path);

            if (is_wp_error($img)) {
                $resized_image = array(
                    'url' => $source[0],
                    'width' => $source[1],
                    'height' => $source[2]
                );
            } else {
                $old_size = $img->get_size();
                $resize = $img->resize($width, $height, $crop);
                if ($resize !== FALSE) {
                    $new_size = $img->get_size();
                }
                $cropped_img_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $cropped_img_path);
                $img->save($cropped_img_path);
                // resized output
                $resized_image = array(
                    'url' => $cropped_img_url,
                    'width' => $new_size['width'],
                    'height' => $new_size['height']
                );
            }


            return $resized_image;

            // No cache files - let's finally resize it using WP's inbuilt resizer
            /*  $new_img_path = image_resize($file_path, $width, $height, $crop, $suffix, $upload_path, $quality);
              if (is_wp_error($new_img_path)) {
              // We hit some errors. Let's just return the original image
              $resized_image = array(
              'url' => $source[0],
              'width' => $source[1],
              'height' => $source[2]
              );
              } else {echo "real image";
              $new_img_size = getimagesize($new_img_path);
              $new_img = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $new_img_path);
              // resized output
              $resized_image = array(
              'url' => $new_img,
              'width' => $new_img_size[0],
              'height' => $new_img_size[1]
              );
              } */
        }
        // default output - without resizing
        $resized_image = array(
            'url' => $source[0],
            'width' => $source[1],
            'height' => $source[2]
        );
        return $resized_image;
    }

} //multisite ends
/**
 * This function gets attachment id and resizes it
 * @param type $attach_id
 * @param type $img_url
 * @param type $width
 * @param type $height
 * @param type $crop
 * @param type $jpeg_quality
 * @return type 
 */

/*function th_thumbnail_resize($attach_id = null, $img_url = null, $width, $height, $crop = false, $jpeg_quality = 90) {
    // this is an attachment, so we have the ID
    if ($attach_id) {
        $image_src = wp_get_attachment_image_src($attach_id, 'full');
        $file_path = get_attached_file($attach_id);
        // this is not an attachment, let's use the image url
    } else if ($img_url) {
        $file_path = parse_url($img_url);
        $file_path = ltrim($file_path['path'], '/');
        $file_path = rtrim(ABSPATH, '/') . $file_path['path'];
        $orig_size = getimagesize($file_path);
        $image_src[0] = $img_url;
        $image_src[1] = $orig_size[0];
        $image_src[2] = $orig_size[1];
    }
    $file_info = pathinfo($file_path);
    $extension = '.' . $file_info['extension'];
    // the image path without the extension
    $no_ext_path = $file_info['dirname'] . '/' . $file_info['filename'];
    $cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;
    // checking if the file size is larger than the target size
    // if it is smaller or the same size, stop right here and return
    if ($image_src[1] > $width || $image_src[2] > $height) {
        // the file is larger, check if the resized version already exists (for crop = true but will also work for crop = false if the sizes match)
        if (file_exists($cropped_img_path)) {
            $cropped_img_url = str_replace(basename($image_src[0]), basename($cropped_img_path), $image_src[0]);
            $vt_image = array(
                'url' => $cropped_img_url,
                'width' => $width,
                'height' => $height
            );
            return $vt_image;
        }
        // crop = false
        if ($crop == false) {

            // calculate the size proportionaly
            $proportional_size = wp_constrain_dimensions($image_src[1], $image_src[2], $width, $height);
            $resized_img_path = $no_ext_path . '-' . $proportional_size[0] . 'x' . $proportional_size[1] . $extension;
            // checking if the file already exists
            if (file_exists($resized_img_path)) {
                $resized_img_url = str_replace(basename($image_src[0]), basename($resized_img_path), $image_src[0]);
                $vt_image = array(
                    'url' => $resized_img_url,
                    'width' => $proportional_size[0],
                    'height' => $proportional_size[1]
                );
                return $vt_image;
            }
        }
        // new function replacing image_resize()
        $img = wp_get_image_editor($file_path);
        if (!is_wp_error($img)) {
            $old_size = $img->get_size();
            // To show image old width and height as echo $old_size['width']
            $resize = $img->resize($width, $height, $crop);
            //$img->set_quality(90);
            // $resize1=$img->crop( 100, 80, $width-100, $height-80, $width, $height, false );
            if ($resize !== FALSE) {
                $new_size = $img->get_size();
                // To show image new width and height as echo $new_size['width']
            }
            //$name_file=rand().basename($file_path);
            $path = str_replace(basename($image_src[0]), '', $image_src[0]);
            $filename = $img->generate_filename('final' . $width, $path . '/', NULL);
            $image_detail = $img->save($filename);
        }
        $new_img = str_replace(basename($image_src[0]), basename($image_detail['path']), $image_src[0]);
        $vt_image = array(
            'url' => $new_img,
            'width' => $image_detail['width'],
            'height' => $image_detail['height']
        );
        return $vt_image;
    }
    // default output - without resizing
    $vt_image = array(
        'url' => $image_src[0],
        'width' => $image_src[1],
        'height' => $image_src[2]
    );
    return $vt_image;
} */

?>