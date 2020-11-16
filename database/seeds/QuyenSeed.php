<?php

use Illuminate\Database\Seeder;

class QuyenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quyen=[
            [
                'q_ten' => 'Quản lý'
            ],
            [
                'q_ten' => 'Nhân viên'
            ]
        ];
        $addQuyen = DB::table('quyen')->insert($quyen);
    }
}
