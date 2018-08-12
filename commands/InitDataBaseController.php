<?php
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Faker\Factory;
use app\models\Paises;
use app\models\Estados;
use app\models\Status;
use app\models\Itens;
use app\models\Kits;
use app\models\Pedidos;
use app\models\DadosEnvio;
use app\models\HistoricosPedido;

use yii\db\Expression;

/**
 * @author Guilherme Altmann
 * @since 1.0
 */

class InitDataBaseController extends Controller
{
    private $faker;

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

        $statuses = ['Em Revisão', 'Faturado', 'Novo', 'NFe Gerada'];

        foreach($statuses as $status){

            $this->criarStatus($status);
        }

        $kit = $this->criarKit();

        $itens[] = ['descricao' => 'Tablet samsung tab e 9.6',
                    'imagem' => 'tab-e-image.webp',
                    'kit' => $kit];
        $itens[] = ['descricao' => 'Suporte metalico tablet', 
                    'imagem' => 'tab-suporte.jpg',
                    'kit' => $kit];

        foreach($itens as $item){
            
            $itensCriados[] = $this->criarItem($item);
        }

        for ($i=0; $i < 4; $i++) {

            $this->criarPedido($kit, 
                                Status::find()
                                ->where(['descricao' => $statuses[0]])
                                ->one()
                            );
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

        $brasil = Paises::find()->where(['descricao' => $pais])->one();

        if(!$brasil){

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

        Itens::deleteAll();
        DadosEnvio::deleteAll();
        HistoricosPedido::deleteAll();
        Pedidos::deleteAll();
        Kits::deleteAll();
        Status::deleteAll();
        Estados::deleteAll();
        Paises::deleteAll();
    }

    private function criarStatus($nomeStatus){

        $status = new Status();
        $status->descricao = $nomeStatus;
        $status->save();
    }

    private function criarItem($item){

        $itens = new Itens();
        $itens->descricao = $item['descricao'];
        $itens->imagem = $item['imagem'];
        $itens->idkit = $item['kit']->idkit;
        $itens->save();
        
        return $itens;
    }

    private function criarKit(){

        $kit = new Kits();
        $kit->descricao = 'Bemacash Bar e Restaurante NFC-e';
        $kit->save();
        return $kit;
    }

    private function criarPedido($kit, $status){

        $pedido = new Pedidos();
        $pedido->contrato_licenca = $this->faker->ipv4;
        $pedido->preco = $this->faker->randomFloat(NULL, 100, 400);
        $pedido->idkit = $kit->idkit;
        $pedido->idstatus = $status->idstatus;
        $pedido->save();

        $this->criarDadosEnvio($pedido);
        $this->criarHistoricoPedido($pedido);
        $this->criarHistoricoPedido($pedido, 'Em Revisão');
    }

    private function criarDadosEnvio($pedido)
    {

        $dadosEnvio = new DadosEnvio();
        $dadosEnvio->cnpj = $this->faker->cnpj(false);
        $dadosEnvio->endereco = $this->faker->address;
        $dadosEnvio->telefone = $this->faker->phoneNumber;
        $dadosEnvio->cep = $this->faker->postcode;
        $dadosEnvio->idestado = $this->pegarEstadoAleatorio()->idestado;
        $dadosEnvio->idpedido = $pedido->idpedido;
        $dadosEnvio->save();
    }

    private function pegarEstadoAleatorio(){

        return Estados::find()
                ->orderBy(new Expression('rand()'))
                ->one();
    }

    private function criarHistoricoPedido($pedido, $status = 'Novo')
    {

        $historicoPedido = new HistoricosPedido();
        $historicoPedido->idpedido = $pedido->idpedido;
        $historicoPedido->idstatus = $this->pegarStatus($status)->idstatus;
        $historicoPedido->save();
    }

    private function pegarStatus($descricao){

        return Status::find()
                ->where(['descricao' => $descricao])
                ->one();
    }
}
