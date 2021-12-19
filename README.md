# get-latest-photos

#Overview:
Gets photos from a directory sorted by date descending and outputs them via ajax php

##Setup

    ###Files

    1. copy /get-latest-photos/get-latest-photos sub-directory to your web hosting

        -hosting
            -webpage (that the script is included on)
            -get-latest-photos
                -js/photos.js

    2. Put <div id="photos-container"></div> where you want the images to show up on the webpage

    ###Webpage

    3. Put <script src="get-latest-photos/js/photos.js"></script> just before the </body> (closing) tag
        Note: If get-latest-photos directory is not a sibling of the webpage it is included on, then you will need to alter the script src to reflect it


    ###Images

    Default image directory is /get-latest-photos/img

        To change this edit the function call on Line 60 : photos.php

        getPhotos($run=true, $main_dir = 'get-latest-photos', $dir = 'img', $num_images_to_get = '5', $add_img_tag = true)

            $run - runs the functionality, set to false to change public variable options, then ->run
            $main_dir - directory this php is located in
            $dir - relative location of images directory to this php file
            $num_images_to_get - number of images to return
            $add_img_tag - determines if you want to output just sources or image tags
