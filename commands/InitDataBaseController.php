<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Faker\Factory;
use app\models\Paises;
use app\models\Estados;
use app\models\Status;

/**
 * @author Guilherme Altmann
 * @since 2.0
 */
class InitDataBaseController extends Controller
{
    private $faker;
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $this->faker = Factory::create('pt_BR');

        $this->apagarDadosTabelas();

        for ($i=0; $i < 40; $i++) {

            $this->criarPaisAleatorio();
        }

        $brasil = $this->criarBrasil();

        for ($i=0; $i < 40; $i++) {

            $this->criarEstados($brasil);
        }

        $statuses = ['Em Revisão', 'Faturado', 'Novo'];

        foreach($statuses as $status){

            $this->criarStatus($status);
        }

        $itens[] = ['Tablet samsung tab e 9.6', 'tab-e-image.webp'];
        //$itens[] = ['Tablet samsung tab e 9.6', 'tab-e-image.webp'];
        foreach($items as $item){
            

        }

        return ExitCode::OK;
    }

    private function criarEstados(Paises $brasil){

        if(!Estados::find()->where(['descricao' => $this->faker->state])->one()){
            
            $estado = new Estados();
            $estado->descricao = $this->faker->state;
            $estado->idpais = $brasil->idpais;
            $estado->save();
        }
    }

    private function criarPaisAleatorio(){

        if(!Paises::find()->where(['descricao' => $this->faker->country])->one()){
            
            $this->criarPais();
        }        
    }

    private function criarBrasil(){

        $pais = 'Brasil';

        if(!Paises::find()->where(['descricao' => $pais])->one()){

            $brasil = $this->criarPais($pais);
        }

        return $brasil;
    }

    private function criarPais($paisEscolhido = null){

        if(is_null($paisEscolhido)){

            $paisEscolhido = $this->faker->country;
        }

        $pais = new Paises();
        $pais->descricao =  $paisEscolhido;
        $pais->save();

        return $pais;
    }

    private function apagarDadosTabelas(){

        Estados::deleteAll();
        Paises::deleteAll();
        Status::deleteAll();
        Itens::deleteAll();
    }

    private function criarStatus($nomeStatus){

        $status = new Status();
        $status->descricao = $nomeStatus;
        $status->save();
    }
}
