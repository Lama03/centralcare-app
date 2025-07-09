<?php

namespace Modules\Doctor\Seeds;


use Illuminate\Database\Seeder;
use Modules\Doctor\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'ar' => [
                'name'       => 'د. عبدالرؤوف الغزالي',
                'slug'       => 'عبدالرؤوف-الغزالي',
                'description'       => '<div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>
                                    <div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>',
                'bio'       => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوالوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا',
            ],
            'en' => [
                'name'       => 'Dr. Abdul Raouf Al-Ghazali',
                'slug'       => 'Abdul-Raouf-Al-Ghazali',
                'description'       => '<div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>
                                    <div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>',
                'bio'       => 'Dr.. Abdul-Raouf Al-Ghazali Lorem Epsom Dollar Set Amit, Consector Adaiba Asking Alite, Set de Ayusmod tempur ankidionteut laborit at Magna Dollar Aliquiwallurem Epsom Dollar Set Amit, Consector Adaiba Isking Alite, Sit de Ayosemod Dollar Tempur Labourye Ankidionte
                ',
            ],
            'start_time' =>'09:00:00',
            'end_time' =>'21:00:00',
            'years_of_experience' => '+9',
            'image' => '/web/assets/images/doctors/5.jpg',
            'country_id' => 3,
            'specialty_id' => 1,
        ];

        $doctor = Doctor::create($data);

        #$doctor->branches()->attach([3,4]);
        $doctor->specificities()->attach([1,2,3]);

        $data = [
            'ar' => [
                'name'       => 'د. عبير عبد المنعم',
                'slug'       => 'عبير-عبد-المنعم',
                'description'       => '<div class="info-card">
                                    <div class=" d-flex align-items-center info-data">
                                        <div class="logo-container">
                                            <img src="/web/assets/images/icons/Group 77.svg" />
                                        </div>
                                        <p class="title">
                                            أخصائية جلدية وتجميل
                                        </p>
                                    </div>
                                    <div class="title-info">
                                        عيادات رام الطبية
                                    </div>
                                </div>
                                <div class="info-card">
                                    <div class=" d-flex align-items-center info-data">
                                        <div class="logo-container">
                                            <img src="/web/assets/images/icons/Group 77.svg" />
                                        </div>
                                        <p class="title">
                                            أخصائية جلدية وتجميل
                                        </p>
                                    </div>
                                    <div class="title-info">
                                        عيادات رام الطبية
                                    </div>
                                </div>',
                'bio'       => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوالوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا',
            ],
            'en' => [
                'name'       => 'Dr.Abeer Abdel Moneim',
                'slug'       => 'Abeer-Abdel-Moneim',
                'description'       => '<div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>
                                    <div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>',
                'bio'       => 'Dr.. Abdul-Raouf Al-Ghazali Lorem Epsom Dollar Set Amit, Consector Adaiba Asking Alite, Set de Ayusmod tempur ankidionteut laborit at Magna Dollar Aliquiwallurem Epsom Dollar Set Amit, Consector Adaiba Isking Alite, Sit de Ayosemod Dollar Tempur Labourye Ankidionte
                ',
            ],
            'start_time' =>'16:15:00',
            'end_time' =>'20:30:00',
            'years_of_experience' => '+9',
            'image' => '/web/assets/images/doctors/2.jpg',
            'country_id' => 2,
            'specialty_id' => 1,
        ];

        $doctor2 = Doctor::create($data);

        #$doctor2->branches()->attach([1,2]);
        $doctor2->specificities()->attach([3,4]);

        $data = [
            'ar' => [
                'name'       => 'د. عبير العنزي',
                'slug'       => 'عبير-العنزي',
                'description'       => '<div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>
                                    <div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>',
                'bio'       => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوالوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا',
            ],
            'en' => [
                'name'       => 'Dr.Abeer Al-Anzi',
                'slug'       => 'Abeer-Al-Anzi',
                'description'       => '<div class="info-card">
                                <div class=" d-flex align-items-center info-data">
                                    <div class="logo-container">
                                        <img src="/web/assets/images/icons/Group 77.svg" />
                                    </div>
                                    <p class="title">
                                        أخصائية جلدية وتجميل
                                    </p>
                                </div>
                                <div class="title-info">
                                    عيادات رام الطبية
                                </div>
                            </div>
                            <div class="info-card">
                                <div class=" d-flex align-items-center info-data">
                                    <div class="logo-container">
                                        <img src="/web/assets/images/icons/Group 77.svg" />
                                    </div>
                                    <p class="title">
                                        أخصائية جلدية وتجميل
                                    </p>
                                </div>
                                <div class="title-info">
                                    عيادات رام الطبية
                                </div>
                            </div>',
                'bio'       => 'Dr.. Abdul-Raouf Al-Ghazali Lorem Epsom Dollar Set Amit, Consector Adaiba Asking Alite, Set de Ayusmod tempur ankidionteut laborit at Magna Dollar Aliquiwallurem Epsom Dollar Set Amit, Consector Adaiba Isking Alite, Sit de Ayosemod Dollar Tempur Labourye Ankidionte
                ',
            ],
            'start_time' =>'08:30:00',
            'end_time' =>'13:00:00',
            'years_of_experience' => '+5',
            'image' => '/web/assets/images/doctors/4.jpg',
            'country_id' => 2,
            'specialty_id' => 1,
        ];

        $doctor3 = Doctor::create($data);

        #$doctor3->branches()->attach([2]);
        $doctor3->specificities()->attach([4,5]);

        $data = [
            'ar' => [
                'name'       => ' د. عبداللطيف محمد',
                'slug'       => 'عبداللطيف-محمد',
                'description'       => '<div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>
                                    <div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
            </div>',
                'bio'       => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوالوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا',
            ],
            'en' => [
                'name'       => 'Dr.Abdul Latif Muhammed',
                'slug'       => 'Abdul-Latif-Muhammed',
                'description'       => '<div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>
                                    <div class="info-card">
                                        <div class=" d-flex align-items-center info-data">
                                            <div class="logo-container">
                                                <img src="/web/assets/images/icons/Group 77.svg" />
                                            </div>
                                            <p class="title">
                                                أخصائية جلدية وتجميل
                                            </p>
                                        </div>
                                        <div class="title-info">
                                            عيادات رام الطبية
                                        </div>
                                    </div>',
                'bio'       => 'Dr.. Abdul-Raouf Al-Ghazali Lorem Epsom Dollar Set Amit, Consector Adaiba Asking Alite, Set de Ayusmod tempur ankidionteut laborit at Magna Dollar Aliquiwallurem Epsom Dollar Set Amit, Consector Adaiba Isking Alite, Sit de Ayosemod Dollar Tempur Labourye Ankidionte
                ',
            ],
            'start_time' =>'19:00:00',
            'end_time' =>'23:00:00',
            'years_of_experience' => '+6',
            'image' => '/web/assets/images/doctors/1.jpg',
            'country_id' => 3,
            'specialty_id' => 1,
        ];

        $doctor4 = Doctor::create($data);

        #$doctor4->branches()->attach([3,4]);
        $doctor4->specificities()->attach([3,4,5]);
    }
}
