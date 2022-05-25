<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menuElements1 = [
            [1,'Цены','Plans', '/prices', true, true, true],
            [2,'Справка','Guide', '/tutorial', true, true, true],
            [3,'Обратная связь','Feedback', '/page/feedback?product=ims-studio', true, true, false],
            [4,'Блог','Blog', '/blog', true, true, false],
            [5,'Условия использования','Terms and Conditions', '/page/terms', false, true, false],
            [6,'Политика конфиденциальности','Privacy Policy', '/page/privacy', false, true, false],
        ];
        foreach ($menuElements1 as $element):
            $menuElements2[] = [
                'order' => $element[0],
                'name_ru' => $element[1],
                'name_en' => $element[2],
                'url' => $element[3],
                'in_header' => $element[4],
                'in_footer' => $element[5],
                'is_studio' => $element[6]
            ];
        endforeach ;

        DB::table('menu_elements')->insert($menuElements2);
    }
}
