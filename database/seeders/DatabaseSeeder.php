<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Locatario;
use App\Models\Imobiliaria;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gestor de Locatários',
            'email' => 'gestor.locatarios@magnicred.com.br',
            'password' => Hash::make('12345'),
            'role' => 'gestor_locatarios',
        ]);

        User::create([
            'name' => 'Gestor de Imobiliárias',
            'email' => 'gestor.imobiliarias@magnicred.com.br',
            'password' => Hash::make('12345'),
            'role' => 'gestor_imobiliarias',
        ]);

        User::create([
            'name' => 'Usuário Normal',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345')
        ]);

        Locatario::create([
            'name' => 'João Teste',
            'email' => 'joao@teste.com',
            'address' => 'Rua das Flores, 123',
            'city' => 'São Paulo',
            'state' => 'SP',
            'phone' => '(11) 91234-5678',
        ]);

        Locatario::create([
            'name' => 'Maria Teste',
            'email' => 'maria@teste.com',
            'address' => 'Av. Central, 456',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'phone' => '(21) 91234-5678',
        ]);

        Locatario::create([
            'name' => 'Carlos Teste',
            'email' => 'carlos@teste.com',
            'address' => 'Praça da Liberdade, 789',
            'city' => 'Belo Horizonte',
            'state' => 'MG',
            'phone' => '(31) 91234-5678',
        ]);

        Locatario::create([
            'name' => 'Alberto Teste',
            'email' => 'alberto@teste.com',
            'address' => 'Avenida Presidente Vargas, 789',
            'city' => 'Santa Maria',
            'state' => 'RS',
            'phone' => '(55) 91234-5678',
        ]);

        Locatario::create([
            'name' => 'Thiago Teste',
            'email' => 'thiago@teste.com',
            'address' => 'Av. Medianeira, 234',
            'city' => 'Santa Maria',
            'state' => 'RS',
            'phone' => '(31) 91224-5678',
        ]);

        Locatario::create([
            'name' => 'Pedro Teste',
            'email' => 'pedro@teste.com',
            'address' => 'Rua Jose Gabriel, 35',
            'city' => 'Santa Maria',
            'state' => 'RS',
            'phone' => '(55) 91244-5678',
        ]);

        Locatario::create([
            'name' => 'Jorge Teste',
            'email' => 'jorge@teste.com',
            'address' => 'Aparicio, 55',
            'city' => 'Porto Alegre',
            'state' => 'RS',
            'phone' => '(55) 91134-5678',
        ]);
        
        Locatario::create([
            'name' => 'Bruna Teste',
            'email' => 'bruna@teste.com',
            'address' => 'Av. Central, 123',
            'city' => 'Florianópolis',
            'state' => 'SC',
            'phone' => '(49) 99234-5678',
        ]);

        Locatario::create([
            'name' => 'Bianca Teste',
            'email' => 'bianca@teste.com',
            'address' => 'Av. Juscelino, 555',
            'city' => 'Curitiba',
            'state' => 'PR',
            'phone' => '(41) 91274-5678',
        ]);

        Locatario::create([
            'name' => 'Helena Teste',
            'email' => 'helena@teste.com',
            'address' => 'Rua das Flores, 780',
            'city' => 'Brasilia',
            'state' => 'DF',
            'phone' => '(61) 91114-5678',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária SP',
            'email' => 'imobiliaria1@teste.com',
            'phone' => '(11) 98765-1234',
            'city' => 'São Paulo',
            'state' => 'SP',
            'responsible' => 'Ana Costa',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária RJ',
            'email' => 'imobiliaria2@teste.com',
            'phone' => '(21) 99234-5678',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'responsible' => 'Carlos Mendes',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária MG',
            'email' => 'imobiliaria3@teste.com',
            'phone' => '(31) 99876-5432',
            'city' => 'Belo Horizonte',
            'state' => 'MG',
            'responsible' => 'Joana Almeida',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária RS',
            'email' => 'imobiliaria4@teste.com',
            'phone' => '(55) 91234-5678',
            'city' => 'Porto Alegre',
            'state' => 'RS',
            'responsible' => 'Pedro Silva',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária SC',
            'email' => 'imobiliaria5@teste.com',
            'phone' => '(49) 99234-5678',
            'city' => 'Florianópolis',
            'state' => 'SC',
            'responsible' => 'Maria Santos',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária PR',
            'email' => 'imobiliaria6@teste.com',
            'phone' => '(41) 91234-5678',
            'city' => 'Curitiba',
            'state' => 'PR',
            'responsible' => 'Lucas Oliveira',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária DF',
            'email' => 'imobiliaria7@teste.com',
            'phone' => '(61) 91234-5678',
            'city' => 'Brasilia',
            'state' => 'DF',
            'responsible' => 'Mariana Silva',
        ]);
        
        Imobiliaria::create([
            'name' => 'Imobiliária 2 RS',
            'email' => 'imobiliaria2rs@teste.com',
            'phone' => '(55) 91244-5678',
            'city' => 'Porto Alegre',
            'state' => 'RS',
            'responsible' => 'Pedro',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária 3 RS',
            'email' => 'imobiliaria3rs@teste.com',
            'phone' => '(55) 91234-5678',
            'city' => 'Santa Maria',
            'state' => 'RS',
            'responsible' => 'Joao',
        ]);

        Imobiliaria::create([
            'name' => 'Imobiliária 4 RS',
            'email' => 'imobiliaria4rs@teste.com',
            'phone' => '(55) 91237-5678',
            'city' => 'Porto Alegre',
            'state' => 'RS',
            'responsible' => 'Maria',
        ]);
    }
}
