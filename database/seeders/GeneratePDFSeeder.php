<?php

namespace Database\Seeders;

use App\Models\GeneratePDF;
use Illuminate\Database\Seeder;

class GeneratePDFSeeder extends Seeder
{

    protected $model = GeneratePDF::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneratePDF::factory()->create([
            //'id' => 1,
            'file_pdf_id' => 1,
            'view_form_id' => 3,
            'ip' => '127.0.0.1',
            'generated' => 0,
            'download' => 'file_download.pdf',
            'path' => null,
            'fields' => '"{\"txt_name\":\"Xandra Harper\",\"txt_date\":\"1971-05-13\",\"txt_email\":\"gyhopaxa@mailinator.com\",\"txt_company\":\"Wilkerson and Rocha Plc\",\"fd0\":\"Aliquam voluptas qui\",\"fd1\":\"Sequi quo vero atque\",\"fd2\":\"Delectus in est fac\",\"fd3\":\"Neque optio qui rep\",\"fd4\":\"Blanditiis doloremqu\",\"fd5\":\"Dolores corporis har\",\"fd6\":\"Iste dolores non exe\",\"fd7\":false,\"fd8\":false,\"fd9\":true,\"fd10\":\"Vitae cumque corrupt\",\"fd11\":\"Id do neque eos est\",\"txt0\":\"Obcaecati rerum eius\",\"si0\":false,\"no0\":true,\"na0\":false,\"txt1\":\"Est voluptatibus la\",\"txt2\":\"Corporis inventore q\",\"si1\":false,\"no1\":false,\"na1\":false,\"txt3\":\"Tempor facere ex vol\",\"txt4\":\"Qui rerum ut omnis a\",\"si2\":false,\"no2\":true,\"na2\":false,\"txt5\":\"Corporis quo soluta\",\"txt6\":\"Fugiat velit volupta\",\"si3\":true,\"no3\":true,\"na3\":false,\"txt7\":\"Fugiat qui iure dig\",\"txt8\":\"Illo quia libero vel\",\"si4\":false,\"no4\":true,\"na4\":false,\"txt9\":\"Quae sed optio adip\",\"txt10\":\"Voluptas quidem even\",\"si5\":false,\"no5\":true,\"na5\":true,\"txt11\":\"Vitae id occaecat ni\"}"',
            'hash' => '3-1735883528-2',
            'count' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        GeneratePDF::factory()->create([
            //'id' => 2,
            'file_pdf_id' => 2,
            'view_form_id' => 2,
            'ip' => '127.0.0.1',
            'generated' => 1,
            'download' => 'file-2-formpdf - 1735883349.pdf',
            'path' => 'pdf-generates/IP127001-FILE2//2-file-2-formpdf-1735883349.pdf',
            'fields' => '"{\"txt_name\":\"Casey Foley\",\"txt_date\":\"1983-10-31\",\"txt_email\":\"kibubo@mailinator.com\",\"txt_company\":\"Sanford Allison Plc\",\"fd0\":\"option1\",\"fd1\":\"1\",\"fd2\":\"1998-11-20\",\"fd3\":\"41\",\"fd4\":\"83\",\"fd5\":\"1\",\"fd6\":\"2\",\"fd7\":\"Aute nemo illum eiu\",\"fd8\":\"Et qui quo id Nam e\",\"fd9\":\"option1\",\"fd10\":\"option4\",\"fd11\":false}"',
            'hash' => '2-1735883349-2',
            'count' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        GeneratePDF::factory()->create([
            //'id' => 3,
            'file_pdf_id' => 3,
            'view_form_id' => 1,
            'ip' => '127.0.0.1',
            'generated' => 0,
            'download' => 'file_download.pdf',
            'path' => null,
            'fields' => '"{\"txt_name\":\"Lawrence Lawson\",\"txt_date\":\"1982-10-04\",\"txt_email\":\"qapyfobuk@mailinator.com\",\"txt_company\":\"Moore and Shaffer Co\",\"si0\":false,\"no0\":true,\"na0\":true,\"txta0\":\"Blanditiis impedit\",\"si1\":true,\"no1\":true,\"na1\":true,\"txta1\":\"At similique ea pari\",\"si2\":false,\"no2\":true,\"na2\":false,\"txta2\":\"Enim saepe magna asp\",\"si3\":true,\"no3\":false,\"na3\":false,\"txta3\":\"Voluptas consectetur\",\"date0\":\"1981-04-18\",\"num0\":\"60\",\"slt0\":\"1\",\"rad0\":\"option1\"}"',
            'hash' => '1-1735883290-6',
            'count' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        GeneratePDF::factory()->create([
            //'id' => 4,
            'file_pdf_id' => 3,
            'view_form_id' => 1,
            'ip' => '127.0.0.1',
            'generated' => 1,
            'download' => 'file-3-formpdf - 1735883308.pdf',
            'path' => 'pdf-generates/IP127001-FILE3//3-file-3-formpdf-1735883308.pdf',
            'fields' => '"{\"txt_name\":\"Lawrence Lawson\",\"txt_date\":\"1982-10-04\",\"txt_email\":\"qapyfobuk@mailinator.com\",\"txt_company\":\"Moore and Shaffer Co\",\"si0\":false,\"no0\":true,\"na0\":true,\"txta0\":\"Blanditiis impedit \",\"si1\":true,\"no1\":true,\"na1\":true,\"txta1\":\"At similique ea pari\",\"si2\":false,\"no2\":true,\"na2\":false,\"txta2\":\"Enim saepe magna asp\",\"si3\":true,\"no3\":false,\"na3\":false,\"txta3\":\"Voluptas consectetur\",\"date0\":\"1981-04-18\",\"num0\":\"60\",\"slt0\":\"1\",\"rad0\":\"option1\"}"',
            'hash' => '1-1735883308-1',
            'count' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        GeneratePDF::factory()->create([
            //'id' => 5,
            'file_pdf_id' => 2,
            'view_form_id' => 2,
            'ip' => '127.0.0.1',
            'generated' => 0,
            'download' => 'file_download.pdf',
            'path' => null,
            'fields' => '"{\"txt_name\":\"Sade Winters\",\"txt_date\":\"2015-05-10\",\"txt_email\":\"wesini@mailinator.com\",\"txt_company\":\"Craft and Hansen Trading\",\"fd0\":\"option3\",\"fd1\":\"2\",\"fd2\":\"2022-05-08\",\"fd3\":\"37\",\"fd4\":\"98\",\"fd5\":\"1\",\"fd6\":\"2\",\"fd7\":\"Magni aut atque magn\",\"fd8\":\"Id ut consectetur cu\",\"fd9\":\"option1\",\"fd10\":\"option1\",\"fd11\":false}"',
            'hash' => '2-1735883478-4',
            'count' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        GeneratePDF::factory()->create([
            //'id' => 6,
            'file_pdf_id' => 3,
            'view_form_id' => 1,
            'ip' => '127.0.0.1',
            'generated' => 1,
            'download' => 'file-3-formpdf - 1735883554.pdf',
            'path' => 'pdf-generates/IP127001-FILE3//3-file-3-formpdf-1735883554.pdf',
            'fields' => '"{\"txt_name\":\"Xandra Harper\",\"txt_date\":\"1971-05-13\",\"txt_email\":\"gyhopaxa@mailinator.com\",\"txt_company\":\"Wilkerson and Rocha Plc\",\"fd0\":\"Aliquam voluptas qui\",\"fd1\":\"Sequi quo vero atque\",\"fd2\":\"Delectus in est fac\",\"fd3\":\"Neque optio qui rep\",\"fd4\":\"Blanditiis doloremqu\",\"fd5\":\"Dolores corporis har\",\"fd6\":\"Iste dolores non exe\",\"fd7\":false,\"fd8\":false,\"fd9\":true,\"fd10\":\"Vitae cumque corrupt\",\"fd11\":\"Id do neque eos est\",\"txt0\":\"Obcaecati rerum eius\",\"si0\":false,\"no0\":true,\"na0\":false,\"txt1\":\"Est voluptatibus la\",\"txt2\":\"Corporis inventore q\",\"si1\":false,\"no1\":false,\"na1\":false,\"txt3\":\"Tempor facere ex vol\",\"txt4\":\"Qui rerum ut omnis a\",\"si2\":false,\"no2\":true,\"na2\":false,\"txt5\":\"Corporis quo soluta\",\"txt6\":\"Fugiat velit volupta\",\"si3\":true,\"no3\":true,\"na3\":false,\"txt7\":\"Fugiat qui iure dig\",\"txt8\":\"Illo quia libero vel\",\"si4\":false,\"no4\":true,\"na4\":false,\"txt9\":\"Quae sed optio adip\",\"txt10\":\"Voluptas quidem even\",\"si5\":false,\"no5\":true,\"na5\":true,\"txt11\":\"Vitae id occaecat ni\"}"',
            'hash' => '1-1735883554-1',
            'count' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
