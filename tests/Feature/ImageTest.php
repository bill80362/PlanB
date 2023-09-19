<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

/**
 * @link https://spatie.be/docs/image/v1/introduction
 */
class ImageTest extends TestCase
{
    /**
     * 修改尺吋，補上邊框
     */
    public function test_fit(): void
    {
        $targetPath = __DIR__ . '/images/another.jpg';
        Image::load(__DIR__ . '/images/example.jpg')
            ->fit(Manipulations::FIT_FILL, 500, 700)
            ->save($targetPath);

        $this->assertTrue(file_exists($targetPath));
        // unlink($targetPath);
    }

    /**
     * 縮小 + 邊框 範例
     */
    public function test_resize(): void
    {
        $targetPath = __DIR__ . '/images/resize.jpg';
        Image::load(__DIR__ . '/images/example.jpg')
            ->width(250)
            ->height(250)
            ->border(15, '007698', Manipulations::BORDER_OVERLAY) // 邊框
            ->save($targetPath);
        $this->assertTrue(true);
    }

    /**
     * 符水印範例
     */
    public function test_watermarks(): void
    {
        $watermarksPath = __DIR__ . '/images/watermark.png';
        $outputPath = __DIR__ . '/images/wateroutput.jpg';
        Image::load(__DIR__ . '/images/example.jpg')
            ->watermark($watermarksPath)
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->save($outputPath);
        // ->watermarkOpacity(50);
        $this->assertTrue(true);
    }
}
