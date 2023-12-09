<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Planer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        
        $user = User::factory()->create();

        $cat1 = Category::create(['name'=>'veliki format']);
        $cat2 = Category::create(['name'=>'srednji format']);
        $cat3 = Category::create(['name'=>'mali format']);
        
        $planer1 = Planer::create([
            'name'=>'Standardni planer',
            'page_number'=>'100',
            'category_id'=>$cat1->id,
            'body'=>'Dvanaest meseci, dvanaest boja i dvanaest motivacionih ca za bolje planiranje. Sa kalendarom za dve godine, mesecnim i nedeljnim planerima za 12 meseci i stranama za beleske, bicete sigurni da nijedna obaveza nece biti zaboravljena.',
            'user_id'=>$user->id
        ]);
       
        $planer2 = Planer::create([
            'name'=>'Biznis planer',
            'page_number'=>'80',
            'category_id'=>$cat2->id,
            'body'=>'Funkcionalnost, preglednost i sveden dizajn spojeni u ovaj rokovnik koji ce biti vas najbolji saradnik u narednih godinu dana. Rokovnik sadrzi kalendar za 2 godine, mesecne i nedeljne planere za 12 meseci i vise od 30 strana za beleske.',
            'user_id'=>$user->id
        ]);

        $planer3 = Planer::create([
            'name'=>'Planer za vencanje',
            'page_number'=>'50',
            'category_id'=>$cat3->id,
            'body'=>'Za lakse i efikasnije zavrsavanje obaveza na faksu. Uz njega ces moci dobro da organizujes oba semestra, pripremis ispite i zavrsis sve obaveze na vreme.',
            'user_id'=>$user->id
        ]);

        $planer4 = Planer::create([
            'name'=>'Planer ishrane',
            'page_number'=>'100',
            'category_id'=>$cat1->id,
            'body'=>'Praktican i lagan planer za sve one koji planiraju obroke unapred, prate poseban rezim ishrane ili jednostavno uzivaju u kuvanju.',
            'user_id'=>$user->id
        ]);

        $planer5 = Planer::create([
            'name'=>'Studentski planer',
            'page_number'=>'70',
            'category_id'=>$cat2->id,
            'body'=>'Za lakse i efikasnije zavrsavanje obaveza na faksu. Uz njega ces moci dobro da organizujes oba semestra, pripremis ispite i zavrsis sve obaveze na vreme.',
            'user_id'=>$user->id
        ]);
    }
}
