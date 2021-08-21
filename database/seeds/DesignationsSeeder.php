<?php

use Illuminate\Database\Seeder;

class DesignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
            'HR Manager', 'Junior HR', 'Front Office Executive',
            'Junior Developer', 'Senior Developer', 'Team Lead',
            'Project Manager', 'CTO', 'CFO', 'CEO'
        ];
        for($i=0; $i<10; $i++){
            DB::table('designations')->insert([
                'name' => $designations[$i]
            ]);
        }
    }
}
