<?php

/**
 * photos.php - Get Latest Photos(files) From a Directory
 *
 * @author      https://joshbagnall.com
 * @license     https://opensource.org/licenses/gpl-license.php GNU Public License
 */

if (!class_exists('getPhotos')) {

    class getPhotos
    {
        //class changable options 
        public $img_tag_start = '<img src="'; //image tag start template
        public $img_tag_end = '/[src]" class="get-latest-photos-image">'; //image tag end template

        public $container_tag_start = '<div class="photos-container">';
        public $container_tag_end = '</div>';

        public $css_file = 'css/index.css'; //css to import, path realtive to this php file

        /**
         * __construct
         * 
         * @param $run - runs the functionality, set to false to change public variable options, then ->run
         * @param $main_dir - directory this php is located in
         * @param $dir - relative location of images directory to this php file
         * @param $num_images_to_get - number of images to return
         * @param $add_img_tag - determines if you want to output just sources or image tags
         * 
         */
        public function __construct($run = true, $main_dir = 'get-latest-photos', $dir = 'img', $num_images_to_get = '5', $add_img_tag = true)
        {
            if ($run) {
                $this->run();
            }
        }

        private function run($main_dir = 'get-latest-photos', $dir = 'img', $num_images_to_get = '5', $add_img_tag = true)
        {
            $images = scandir($dir, SCANDIR_SORT_DESCENDING); //get contents as array sorted by date descending

            $img_tag = $this->img_tag_start . $main_dir . '/' . $dir . $this->img_tag_end;

            if (!empty($images)) { //if images array is not empty

                $sb = ''; //string buffer
                $num_images = count($images) - 2; //length of array minus updir('../') and downdir('./') indexes
                ($num_images < $num_images_to_get) ? $max = $num_images : $max = $num_images_to_get; //if array coutn < 5 set max to count

                for ($i = 0; $i < $max; $i++) { //loop through array
                    if ($add_img_tag) { //if using template
                        $img = str_replace('[src]', $images[$i], $img_tag); //put current index into tag
                        $sb .= $img; //add to string buffer
                    } else {
                        $sb .= $images[$i]; //add to string buffer
                    }
                }

                $css_file = $this->css_file;

                if (file_exists($css_file)) {
                    $css = file_get_contents($css_file);
                    $css = str_replace('-photos-container', '-photos-container' . date('gis'), $css);
                    echo '<style>' . $css . '</style>';
                }

                echo $this->container_tag_start . $sb . $this->container_tag_end; //return string buffer
            }
        }
    }

    new getPhotos();
}
