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
            ['prices', '/prices', true, true, true],
            ['tutorial', '/tutorial', true, true, true],
            ['feedback', '/page/feedback?product=ims-studio', true, true, false],
            ['blog', '/blog', true, true, false],
            ['terms', '/page/terms', false, true, false],
            ['privacy', '/page/privacy', false, true, false],
        ];
        foreach ($menuElements1 as $element):
            $menuElements2[] = [
                'name' => $element[0],
                'url' => $element[1],
                'in_header' => $element[2],
                'in_footer' => $element[3],
                'is_studio' => $element[4]
            ];
        endforeach ;

        DB::table('menu_elements')->insert($menuElements2);
    }
}
