<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Faker\Factory::create();

        $this->call('CoursesTableSeeder');
        $this->call('ClassroomsTableSeeder');
        $this->call('StudentsTableSeeder');
        $this->call('TeachersTableSeeder');
        $this->call('WeeksTableSeeder');
        

    }
}


class ClassroomsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $classroom_nums = array(
            101, 102, 103, 104, 105, 106,
            201, 202, 203, 204, 205, 206,
            301, 302, 303, 304, 305, 306
        );


        for ($i = 0; $i <= count($classroom_nums)-1; $i++)
        {
            DB::table('classrooms')->insert([
                //'classroom_num' => $classroom_nums[rand(0, count($classroom_nums)-1)],
                'classroom_num' => $classroom_nums[$i],
                //'course_id' => rand(1, 20),
                'max_size'  => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}

class CoursesTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $courses = array(
             'قرآن كريم ١', 'قرآن كريم ٢', 'قرآن كريم ٣',
             'فيزياء ١', 'فيزياء ٢', 'فيزياء ٣', 'فيزياء ٤', 
             'حاسب ١', 'حاسب ٢', 'حاسب ٣',
             'كيمياء ١', 'كيمياء ٢', 'كيمياء ٣', 'كيمياء ٤', 
             'اجتماعيات ١', 'اجتماعيات ٢', 'تاريخ ١',
             'لغة عربية ١', 'لغة عربية ٢', 'لغة عربية ٣', 'لغة عربية ٤', 'لغة عربية ٥', 'لغة عربية ٦', 'لغة عربية ٧' 
        );



        for ($i = 0; $i <= count($courses)-1; $i++)
        {
            DB::table('courses')->insert([
                'name' => $courses[$i],
                'classroom_id' => rand(1, 18),
                'teacher_id' => rand(1, 20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            
        }
    }
}




class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $students = array(
            'احمد الناصر', 'سالم الحجي', 'وجدي غنيم', 'ماهر المحمدصالح', 'مصطفى أتاتورك', 'وجيه الغنام', 'مسلم البراك', 'وليد المهناء', 'وحيد المحيفيظ' 
        );
        $countries = array('السعودية', 'قطر','البحرين','الكويت','الامارات','عمان','مصر','الاردن','سوريا','السودان');

        for ($i = 0; $i <= count($students)-1; $i++)
        {
            DB::table('students')->insert([
                'academic_num' => rand(32000, 36999),
                'name'  => $students[$i], 
                'registared_at' => Carbon::now(),
                'email' => 'stud_' . $i . '@gmail.com',
                'nationality' => $countries[rand(0,count($students))], 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } 
    }
}

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        $teachers = array(
            [
               'name'                   => 'علي المحمدصالح',
               'major'                  => 'حاسب آلي',
               'num_weekly_classes'     => rand(5, 20)
            ],
            [
               'name'                   => 'سلمان البحراني',
               'major'                  => 'فيزياء',
               'num_weekly_classes'     => rand(5, 20)
            ],
            [
               'name'                   => 'أنور الثويقب',
               'major'                  => 'تربية اسلامية',
               'num_weekly_classes'     => rand(5, 20)
            ],
            [
               'name'                   => 'علي الغزال',
               'major'                  => 'كيمياء',
               'num_weekly_classes'     => rand(5, 20)
            ],
            [
               'name'                   => 'علي الدخيل',
               'major'                  => 'رياضيات',
               'num_weekly_classes'     => rand(5, 20)
            ],
            [
               'name'                   => 'علي الزويد',
               'major'                  => 'اجتماعيات',
               'num_weekly_classes'     => rand(5, 20)
            ]

        );

        for ($i = 0; $i <= count($teachers)-1; $i++)
        {
            DB::table('teachers')->insert([
                'name'  => $teachers[$i]['name'], 
                'major' => $teachers[$i]['major'], 
                'num_weekly_classes' => $teachers[$i]['num_weekly_classes'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } 

    }
}




class WeeksTableSeeder extends Seeder
{
    public function run()
    {
        $weeks = array(
            [
                'name' => 'الاسبوع الأول',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الثاني',
                'from_date' => '١٤٣٦/١١/١١',
                'to_date'   => '١٤٣٦/١١/١٥'
            ],
            [
                'name' => 'الاسبوع الثالث',
                'from_date' => '١٤٣٦/١١/١٨',
                'to_date'   => '١٤٣٦/١١/٢٢'
            ],
            [
                'name' => 'الاسبوع الرابع',
                'from_date' => '١٤٣٦/١١/٢٥',
                'to_date'   => '١٤٣٦/١١/٢٩'
            ],
            [
                'name' => 'الاسبوع الخامس',
                'from_date' => '١٤٣٦/١٢/٢',
                'to_date'   => '١٤٣٦/١٢/٦'
            ],
            [
                'name' => 'الاسبوع السادس',
                'from_date' => '١٤٣٦/١٢/٩',
                'to_date'   => '١٤٣٦/١٢/١٣'
            ],
            [
                'name' => 'الاسبوع السابع',
                'from_date' => '١٤٣٦/١٢/١٦',
                'to_date'   => '١٤٣٦/١٢/٢٠'
            ],
            [
                'name' => 'الاسبوع الثامن',
                'from_date' => '١٤٣٦/١٢/٢٣',
                'to_date'   => '١٤٣٦/١٢/٢٧'
            ],
            [
                'name' => 'الاسبوع التاسع',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع العاشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الحادي عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الثاني عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الثالث عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الرابع عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الخامس عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع السادس عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع السابع عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ],
            [
                'name' => 'الاسبوع الثامن عشر',
                'from_date' => '١٤٣٦/١١/٥',
                'to_date'   => '١٤٣٦/١١/٩'
            ]

        );

        for ($i = 0; $i <= count($weeks)-1; $i++)
        {
            DB::table('weeks')->insert([
                'name'  => $weeks[$i]['name'], 
                'from_date' => $weeks[$i]['from_date'], 
                'to_date' => $weeks[$i]['to_date'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } 
    }
}





