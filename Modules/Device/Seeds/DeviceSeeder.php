<?php

namespace Modules\Device\Seeds;

use Illuminate\Database\Seeder;
use Modules\Device\Models\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices =
            [
                [
                    'ar' => [
                        'name' => 'جنتل ليز',
                        'description' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.',
                        'features' => '
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>',
                    ],
                    'en' => [
                        'name' => 'Gentle Liz',
                        'description' => 'There is a proven fact for a long time that the readable content of a page will distract the reader from focusing on the external form of the text or the form of paragraphs placed on the page he reads.',
                        'features' => '
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>',
                    ],
                    'image' => '/web/assets/images/device/device.png',
                    'status' => 2
                ],
                [
                    'ar' => [
                        'name' => 'جنتل ليز',
                        'description' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.',
                        'features' => '
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                </span>
                                            </li>',
                    ],
                    'en' => [
                        'name' => 'Gentle Liz',
                        'description' => 'There is a proven fact for a long time that the readable content of a page will distract the reader from focusing on the external form of the text or the form of paragraphs placed on the page he reads.',
                        'features' => '
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>
                                            <li>
                                                <div class="img-container">
                                                    <img src="/web/assets/images/icons/keyboard_arrow_right-5.svg" />
                                                </div>
                                                <span class="text">
                                                    There is a long-established fact that the readable content of a page will distract the reader from focus
                                                </span>
                                            </li>',
                    ],
                    'image' => '/web/assets/images/device/device.png',
                    'status' => 2
                ],
            ];

        foreach ($devices as $device){
            Device::create($device);
        }
    }
}
