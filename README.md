# ImageColor

Creates a data-uri based on the image dominant color.

## Requirements

ImageMagick extension should be present.

## Usage

```
require './vendor/autoload.php';

$image_url = 'https://www.elephantnaturepark.org/wp-content/uploads/2016/06/Lek_20may2016_01_n.jpg';

$i = new ImageColor\ImageColor($image_url);

echo $i->get_data_uri();

```

## Credits

* https://manu.ninja/dominant-colors-for-lazy-loading-images
* https://www.webrocker.de/2016/03/28/dominant-color-in-an-image/