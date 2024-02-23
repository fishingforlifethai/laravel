<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"เว็บไซต์ ขายอุปกรณ์ตกปลา พัฒนาโดย นาย เศรษฐ์ เกิดแสง 062-5952829.",
            'short_des'=>"เว็บไซต์ ขายอุปกรณ์ตกปลา พัฒนาโดย นาย เศรษฐ์ เกิดแสง 062-5952829.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"199 หมู่9 ต.รางหวาย อ.พนมทวน จ.กาญจนบุรี 71170",
            'email'=>"bill.satekerdsaeng@gmail.com",
            'phone'=>"0625952829",
        );
        DB::table('settings')->insert($data);
    }
}
