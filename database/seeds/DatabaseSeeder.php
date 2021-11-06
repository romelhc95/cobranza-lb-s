<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $documents = [
            ['document' => 'DNI'],
            ['document' => 'CE'],
            ['document' => 'RUC']
        ];

        foreach ($documents as $document){
            App\Document::create($document);
        }
        // $this->call(UsersTableSeeder::class);
        $sectors = [
            ['name' => 'Santa Ursula'],
            ['name' => 'Cine'],
            ['name' => 'La Casona'],
            ['name' => 'Peluqueria'],
            ['name' => 'Grau'],
            ['name' => 'Bahia Diego Ferre'],
            ['name' => 'Tupac Amaru'],
            ['name' => 'Ex-Bahia']
        ];

        foreach ($sectors as $sector) {
            App\Sector::create($sector);
        }

        App\User::create([
            'document' => 'DNI',
            'document_number' => '71234567',
            'first_name' => 'Admin',
            'second_name' => ' ',
            'last_name' => ' ',
            'second_last_name' => ' ',
            'phone' => '956644522',
            'password' => bcrypt('123456780.'),
            'address' => 'Sin dirección',
            'sector_id' => 1,
            'is_admin' => 1
        ]/**,
        [
            'document' => 'DNI',
            'document_number' => '76907170',
            'first_name' => 'Aura',
            'second_name' => 'Violeta',
            'last_name' => 'La Barrera',
            'second_last_name' => 'Salazar',
            'phone' => '977820728',
            'password' => bcrypt('07170967'),
            'address' => 'Sin dirección',
            'sector_id' => 1,
            'is_admin' => 1
        ],
        [
            'document' => 'DNI',
            'document_number' => '41884997',
            'first_name' => 'Margarita',
            'second_name' => '',
            'last_name' => 'La Barrera',
            'second_last_name' => 'Salazar',
            'phone' => '999234948',
            'password' => bcrypt('79948814'),
            'address' => 'Sin dirección',
            'sector_id' => 1,
            'is_admin' => 1
        ],
        [
            'document' => 'DNI',
            'document_number' => '03569286',
            'first_name' => 'Gloria',
            'second_name' => '',
            'last_name' => 'Salazar',
            'second_last_name' => 'Ato',
            'phone' => '996778684',
            'password' => bcrypt('68296503'),
            'address' => 'Sin dirección',
            'sector_id' => 1,
            'is_admin' => 1
        ] */);

        //factory(App\User::class, 100)->create();

        /**App\Loan::create([
            'loan' => 3000,
            'monetary_interest' => 10,
            'amount' => 3300,
            'user_id' => 1
        ]); 
        
        App\Payment::create([
            'payment' => 300,
            'new_payment' => 3000,
            'loan_status' => 'Pendiente',
            'payment_status' => 'Pagado',
            'loan_id' => 1,
            'user_id' => 1
        ]);*/
        
    }
}
