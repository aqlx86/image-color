<?php

namespace ImageColor;

class ImageColor
{
    protected $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function get_dominant_color()
    {
        $image = new \Imagick($this->image);
        $image->resizeImage(3, 3, \Imagick::FILTER_GAUSSIAN, 1);
        $image->quantizeImage(1, \Imagick::COLORSPACE_RGB, 0, false, false);
        $image->setFormat('RGB');

        return substr(bin2hex($image), 0, 6);
    }

    public function get_data_uri()
    {
        $header                  = pack('H*',"474946383961");
        $logicalScreenDescriptor = pack('H*',"01000100800100");
        $imageColor              = pack('H*', $this->get_dominant_color());
        $colorPad                = pack('H*',"000000");
        $imageDescriptor         = pack('H*',"2c000000000100010000");
        $imageData               = pack('H*',"0202440100");

        $binary  = $header .
            $logicalScreenDescriptor .
            $imageColor .
            $colorPad .
            $imageDescriptor .
            $imageData;

        return 'data:image/gif;base64,'. base64_encode($binary);
    }
}
