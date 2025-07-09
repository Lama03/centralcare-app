<?php

use App\Constants\Templates;
use Modules\Setting\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings =
            [
                [
                    'en' => [
                        'value' => 'Welcome to central care!'
                    ],
                    'ar' => [
                        'value' => 'مرحبا بكم في عيادات سنترال كير!'
                    ],
                    'key' => 'website_name',
                    'translatable' => 2,
                ],
                [
                    'key' => 'phone',
                    'other_value' => '0531117087'
                ],
                [
                    'key' => 'email',
                    'other_value' => 'info@centeralcare.com'
                ],
                [
                    'key' => 'facebook',
                    'other_value' => 'facebook.com'
                ],
                [
                    'key' => 'twitter',
                    'other_value' => 'twitter.com'
                ],
                [
                    'key' => 'instagram',
                    'other_value' => 'instagram.com'
                ],
                [
                    'key' => 'snapchat',
                    'other_value' => 'snapchat.com'
                ],
                [
                    'key' => 'youtube',
                    'other_value' => 'youtube.com'
                ],
                [
                    'key' => 'linkedin',
                    'other_value' => 'linkedin.com'
                ],
                [
                    'en' => [
                        'value' => 'Al Khobar - Olaya - Opposite to Al Rashid Mall Gate 6'
                    ],
                    'ar' => [
                        'value' => 'الخبر - العليا - مقابل الراشد مول بوابة 6'
                    ],
                    'key' => 'address',
                    'translatable' => 2,
                ],
                [
                    'en' => [
                        'value' => 'Saturday to Thursday'
                    ],
                    'ar' => [
                        'value' => 'من السبت إلى الخميس'
                    ],
                    'key' => 'working_days',
                    'translatable' => 2,
                ],
                [
                    'key' => 'working_time',
                    'other_value' => '08:00 - 20:00'
                ],
                [
                    'en' => [
                        'value' => 'Saturday to Thursday'
                    ],
                    'ar' => [
                        'value' => 'من السبت إلى الخميس'
                    ],
                    'key' => 'working_days',
                    'translatable' => 2,
                ],
                [
                    'en' => [
                        'value' => 'Friday'
                    ],
                    'ar' => [
                        'value' => 'جمعة'
                    ],
                    'key' => 'day_off',
                    'translatable' => 2,
                ],
                [
                    'en' => [
                        'value' => '2022. Al Doha Medical Clinics. All Rights Reserved.'
                    ],
                    'ar' => [
                        'value' => 'كل الحقوق محفوظة لعيادات الدوحة الطبية. 2022'
                    ],
                    'key' => 'copyright',
                    'translatable' => 2,
                ],
                [
                    'en' => [
                        'value' => 'The symbol of professionalism in providing medical and cosmetic care services'
                    ],
                    'ar' => [
                        'value' => 'رمز الاحتراف في تقديم خدمات الرعاية الطبية والتجميلية'
                    ],
                    'key' => 'about_us_title',
                    'translatable' => 2,
                ],
                [
                    'en' => [
                        'value' => 'Where our importance lies in high-level medical staff in terms of diagnosis, treatment and medical advice that works to change the lives of our patients and clients for the better, as we are keen to provide the best treatment and cosmetic services in dental, dermatology and laser specialties in one place with the best medical technologies and devices.'
                    ],
                    'ar' => [
                        'value' => 'حيث تكمن أهميتنا بالكوادر الطبية ذات المستوى العالي من حيث التشخيص وتقديم العلاج والنصائح الطبية التي تعمل على تغيير حياة مرضانا وعملائنا للأفضل، حيث أننا نحرص على تقديم أفضل الخدمات العلاجية والتجميلية بتخصصات الأسنان والجلدية والليزر فى مكان واحد بأفضل التقنيات والأجهزة الطبية.'
                    ],
                    'key' => 'about_us_content',
                    'translatable' => 2,
                ],
                # our services content
                [
                    'en' => [
                        'value' => 'We are keen to provide the best treatment and cosmetic services in dental, dermatology and laser specialties in one place with the best medical technologies and devices.'
                    ],
                    'ar' => [
                        'value' => 'نحرص على تقديم أفضل الخدمات العلاجية والتجميلية بتخصصات الأسنان والجلدية والليزر فى مكان واحد بأفضل التقنيات والأجهزة الطبية.'
                    ],
                    'key' => 'our_services_content',
                    'translatable' => 2,
                ],

                [
                    'en' => [
                        'value' => 'Where our importance lies in high-level medical staff in terms of diagnosis, treatment and medical advice that works to change the lives of our patients and clients for the better, as we are keen to provide the best treatment and cosmetic services in dental, dermatology and laser specialties in one place with the best medical technologies and devices.'
                    ],
                    'ar' => [
                        'value' => 'حيث تكمن أهميتنا بالكوادر الطبية ذات المستوى العالي من حيث التشخيص وتقديم العلاج والنصائح الطبية التي تعمل على تغيير حياة مرضانا وعملائنا للأفضل، حيث أننا نحرص على تقديم أفضل الخدمات العلاجية والتجميلية بتخصصات الأسنان والجلدية والليزر فى مكان واحد بأفضل التقنيات والأجهزة الطبية.'
                    ],
                    'key' => 'devices_content',
                    'translatable' => 2,
                ],

                # Doctor Content.
                [
                    'en' => [
                        'value' => 'Our importance lies in the high-level medical staff in terms of diagnosis, treatment and medical advice that works to change the lives of our patients and clients for the better.'
                    ],
                    'ar' => [
                        'value' => 'تكمن أهميتنا بالكوادر الطبية ذات المستوى العالي من حيث التشخيص وتقديم العلاج والنصائح الطبية التي تعمل على تغيير حياة مرضانا وعملائنا للأفضل.'
                    ],
                    'key' => 'doctor_content',
                    'translatable' => 2,
                ],

                # cases page Content.
                [
                    'en' => [
                        'value' => 'We are keen to provide the best medical and cosmetic services in dental and ice specialties in one place with the best medical services.'
                    ],
                    'ar' => [
                        'value' => 'نحرص على تقديم أفضل الخدمات العلاجية والتجميلية بتخصصات الأسنان والجلدية والليزر فى مكان واحد بأفضل التقنيات والأجهزة الطبية.

'
                    ],
                    'key' => 'cases_page_content',
                    'translatable' => 2,
                ],

                # Review Content.
                [
                    'en' => [
                        'value' => 'We always strive to satisfy our customers by developing the skills of those in charge of customer service to guarantee them luxury and a unique experience to achieve maximum satisfaction with the services provided.'
                    ],
                    'ar' => [
                        'value' => 'نسعى دائماً لإرضاء عملائنا بتنمية مهارات القائمين على خدمة العملاء لنضمن لهم الرفاهية والتجربة الفريدة لتحقيق أقصى درجات الرضا عن الخدمات المقدمة.'
                    ],
                    'key' => 'review_content',
                    'translatable' => 2,
                ],

                # Article content.
                [
                    'en' => [
                        'value' => 'Latest articles'
                    ],
                    'ar' => [
                        'value' => 'اخر الاخبار'
                    ],
                    'key' => 'articles_content',
                    'translatable' => 2,
                ],

                # Insurance Companies content.
                [
                    'en' => [
                        'value' => 'We are distinguished by high quality and the latest advanced technologies in all services'
                    ],
                    'ar' => [
                        'value' => 'نعمل جاهدين من أجل سعادتكم وخدمتكم'
                    ],
                    'key' => 'insurance_companies',
                    'translatable' => 2,
                ],

                # About Us home page title.
                [
                    'en' => [
                        'value' => 'We care about commitment and respect for the dignity and rights of patients by providing medical care and support services in a professional manner.'
                    ],
                    'ar' => [
                        'value' => 'نقدم الخدمات الطبية بجودة عالية من خلال الكوادر المؤهلة والتكنولوجيا المتقدمة.'
                    ],
                    'key' => 'about_us_page_title',
                    'translatable' => 2,
                ],

                # About Us Home Page Content.
                [
                    'en' => [
                        'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, nam voluptatum? Maxime dignissimos voluptas atque, placeat aspernatur eveniet, saepe dolor aperiam sit velit porro harum nemo libero? Ad, reprehenderit labore.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, nam voluptatum? Maxime dignissimos voluptas atque, placeat aspernatur eveniet, saepe dolor aperiam sit velit porro harum nemo libero? Ad, reprehenderit labore.'
                    ],
                    'ar' => [
                        'value' => 'هنالك العديد من الأنواع المتوفرة في مجمع الدوحة الطبي نهتم بالإلتزام وبإحترام كرامة وحقوق المرضى من خلال تقديم الرعاية الطبية والخدمات المساندة بشكل إحترافي يضمن رضا المراجع لنصوص لوريم إيبسوم
                                    هنالك العديد من الأنواع المتوفرة في مجمع الدوحة الطبي نهتم بالإلتزام وبإحترام كرامة وحقوق المرضى من خلال تقديم الرعاية الطبية والخدمات المساندة بشكل إحترافي يضمن رضا المراجع لنصوص لوريم إيبسوم'
                    ],
                    'key' => 'about_us_page_content',
                    'translatable' => 2,
                ],

                # Mission content.
                [
                    'en' => [
                        'value' => 'Adopting the highest quality standards in providing medical and cosmetic services through the best medical cadres and modern technologies in the region'
                    ],
                    'ar' => [
                        'value' => 'إنتهاج أعلى معايير الجودة في تقديم الخدمات الطبية والتجميلية من خلال أفضل الكوادر الطبية والتقنيات الحديثة في المنطقة'
                    ],
                    'key' => 'about_message',
                    'translatable' => 2,
                ],

                # Vision content.
                [
                    'en' => [
                        'value' => 'Working hard and effort to provide the best dental, dermatology and laser services in order to be the leader in the luxury of medical care in our specialties'
                    ],
                    'ar' => [
                        'value' => 'العمل بجد وإجتهاد لتقديم أفضل خدمات طب الأسنان وطب الأمراض الجلدية والليزر كي نكون الرائدين في صناعة الرفاهية في خدمات الرعاية الطبية في تخصصاتنا'
                    ],
                    'key' => 'about_vision',
                    'translatable' => 2,
                ],

                # Footer content.
                [
                    'en' => [
                        'value' => 'We at Central Care clinics consider ourselves the symbol of professionalism in providing medical and cosmetic care services, where our importance lies in the medical staff of a high level in terms of diagnosis, treatment and medical advice that works to change the lives of our patients and clients for the better.'
                    ],
                    'ar' => [
                        'value' => 'نحن في عيادات سنترال كير نعتبر أنفسنا رمز الاحتراف في تقديم خدمات الرعاية الطبية والتجميلية، حيث تكمن أهميتنا بالكوادر الطبية ذات المستوى العالي من حيث التشخيص وتقديم العلاج والنصائح الطبية التي تعمل على تغيير حياة مرضانا وعملائنا للأفضل'
                    ],
                    'key' => 'footer_content',
                    'translatable' => 2,
                ],

                # Page Booking content.
                [
                    'en' => [
                        'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, nam voluptatum? Maxime dignissimos voluptas atque, placeat aspernatur eveniet, saepe dolor aperiam sit velit porro harum nemo libero.'
                    ],
                    'ar' => [
                        'value' => 'هنالك العديد من الأنواع المتوفرة في مجمع الدوحة الطبي نهتم بالإلتزام وبإحترام كرامة وحقوق المرضى من خلال تقديم الرعاية الطبية والخدمات المساندة بشكل إحترافي'
                    ],
                    'key' => 'page_booking_content',
                    'translatable' => 2,
                ],

                # Page Offer content.
                [
                    'en' => [
                        'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, nam voluptatum? Maxime dignissimos voluptas atque, placeat aspernatur eveniet, saepe dolor aperiam sit velit porro harum nemo libero.'
                    ],
                    'ar' => [
                        'value' => 'هنالك العديد من الأنواع المتوفرة في مجمع الدوحة الطبي نهتم بالإلتزام وبإحترام كرامة وحقوق المرضى من خلال تقديم الرعاية الطبية والخدمات المساندة بشكل إحترافي'
                    ],
                    'key' => 'page_offer_content',
                    'translatable' => 2,
                ],

                # page news and events content content.
                [
                    'en' => [
                        'value' => 'There are many types of Lorem Ipsum texts available, but most have been modified in some form by introducing some random anecdotes or words into the text. If you want to use a Lorem Ipsum text, you must first verify that there are no embarrassing or inappropriate words or phrases hidden in this text.'
                    ],
                    'ar' => [
                        'value' => 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص.'
                    ],
                    'key' => 'news_and_events_content',
                    'translatable' => 2,
                ],

                # Page installment content.
                [
                    'en' => [
                        'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis, nam voluptatum? Maxime dignissimos voluptas atque, placeat aspernatur eveniet, saepe dolor aperiam sit velit porro harum nemo libero.'
                    ],
                    'ar' => [
                        'value' => 'هنالك العديد من الأنواع المتوفرة في مجمع الدوحة الطبي نهتم بالإلتزام وبإحترام كرامة وحقوق المرضى من خلال تقديم الرعاية الطبية والخدمات المساندة بشكل إحترافي'
                    ],
                    'key' => 'page_installment_content',
                    'translatable' => 2,
                ],
            ];

        foreach ($settings as $setting){
            $settingData = new Setting();
            $settingData->fill($setting);
            $settingData->save();
        }
    }
}
