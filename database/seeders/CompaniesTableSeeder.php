<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Company',
                'phone' => '0168550022',
                'address' => '27 Leltz Road Houston, TX 33035',
                'email' => 'admin@gmail.com',
                'location' => 'https://maps.app.goo.gl/FavYJYd2f67xHvi57',
                'google_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17234.176040415095!2d104.87120311184437!3d11.53142483416979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095050d34b7671%3A0xc88a0cd5a428971a!2sNew%20Steung%20Mean%20Chey%20Market!5e0!3m2!1sen!2skh!4v1699155808613!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'facebook' => 'https://maps.app.goo.gl/FavYJYd2f67xHvi57',
                'twitter' => 'https://maps.app.goo.gl/FavYJYd2f67xHvi57',
                'instagram' => 'https://maps.app.goo.gl/FavYJYd2f67xHvi57',
                'linkedin' => 'https://maps.app.goo.gl/FavYJYd2f67xHvi57',
                'skype' => 'https://maps.app.goo.gl/FavYJYd2f67xHvi57',
                'logo' => 'company/cNAaLRmAGi2cRmhx59Qry006XX00ZvGvg8uKgVbx.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}