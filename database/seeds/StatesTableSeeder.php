<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(array('description' => 'Acre', 'initials' => 'AC'));
        State::create(array('description' => 'Alagoas', 'initials' => 'AL'));
        State::create(array('description' => 'Amapá', 'initials' => 'AP'));
        State::create(array('description' => 'Amazonas', 'initials' => 'AM'));
        State::create(array('description' => 'Bahia', 'initials' => 'BA'));
        State::create(array('description' => 'Ceará', 'initials' => 'CE'));
        State::create(array('description' => 'Distrito Federal', 'initials' => 'DF'));
        State::create(array('description' => 'Espírito Santo', 'initials' => 'ES'));
        State::create(array('description' => 'Goiás', 'initials' => 'GO'));
        State::create(array('description' => 'Maranhão', 'initials' => 'MA'));
        State::create(array('description' => 'Mato Grosso', 'initials' => 'MT'));
        State::create(array('description' => 'Mato Grosso do Sul', 'initials' => 'MS'));
        State::create(array('description' => 'Minas Gerais', 'initials' => 'MG'));
        State::create(array('description' => 'Pará', 'initials' => 'PA'));
        State::create(array('description' => 'Paraíba', 'initials' => 'PB'));
        State::create(array('description' => 'Paraná', 'initials' => 'PR'));
        State::create(array('description' => 'Pernambuco', 'initials' => 'PE'));
        State::create(array('description' => 'Piauí', 'initials' => 'PI'));
        State::create(array('description' => 'Rio de Janeiro', 'initials' => 'RJ'));
        State::create(array('description' => 'Rio Grande do Norte', 'initials' => 'RN'));
        State::create(array('description' => 'Rio Grande do Sul', 'initials' => 'RS'));
        State::create(array('description' => 'Rondônia', 'initials' => 'RO'));
        State::create(array('description' => 'Roraima', 'initials' => 'RR'));
        State::create(array('description' => 'Santa Catarina', 'initials' => 'SC'));
        State::create(array('description' => 'São Paulo', 'initials' => 'SP'));
        State::create(array('description' => 'Sergipe', 'initials' => 'SE'));
        State::create(array('description' => 'Tocantins', 'initials' => 'TO'));
    }
}
