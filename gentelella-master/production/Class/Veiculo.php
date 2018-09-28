<?php


require_once '../Model/dao.php';

class Veiculo extends dao{


    protected $table = 'Frota';
    private $id;
    private $marca;
    private $ano;
    private $motor;
    private $modelo;
    private $km;
    private $cor;
    private $comb;
    private $placa;
    private $chass;
    private $obs;
    private $doc;
    private $trocaoleo;
    private $trocafiltro;
    private $vistoria;
    private $situa;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getAno(){
        return $this->ano;
    }

    public function setAno($ano){
        $this->ano = $ano;
    }

    public function getMotor(){
        return $this->motor;
    }

    public function setMotor($motor){
        $this->motor = $motor;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getKm(){
        return $this->km;
    }

    public function setKm($km){
        $this->km = $km;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function getComb(){
        return $this->comb;
    }

    public function setComb($comb){
        $this->comb = $comb;
    }

    public function getChass(){
        return $this->chass;
    }

    public function setChass($chass){
        $this->chass = $chass;
    }

    public function getObs(){
        return $this->obs;
    }

    public function setObs($obs){
        $this->obs = $obs;
    }
    
    public function getDoc(){
        return $this->doc;
    }

    public function setDoc($doc){
        $this->doc = $doc;
    }

    public function getTrocaoleo(){
        return $this->trocaoleo;
    }

    public function setTrocaoleo($trocaoleo){
        $this->trocaoleo = $trocaoleo;
    }

    public function getTrocafiltro(){
        return $this->trocafiltro;
    }

    public function setTrocafiltro($trocafiltro){
        $this->trocafiltro = $trocafiltro;
    }

    public function getVistoria(){
        return $this->vistoria;
    }

    public function setVistoria($vistoria){
        $this->vistoria = $vistoria;
    }

    public function getSitua(){
        return $this->situa;
    }

    public function setSitua($situa){
        $this->situa = $situa;
    }

    public function getPlaca(){
        return $this->placa;
    }

    public function setPlaca($placa){
        $this->placa = $placa;
    }


    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (marca,ano,modelo,motor,km,cor,comb,chass,obs,doc,trocaoleo,trocafiltro,vistoria,situa,placa) VALUES (:marca, :ano, :modelo, :motor, :km, :cor, :comb, :chass, :obs, :doc,:trocaoleo, :trocafiltro,:vistoria,:situa,:placa)";
        
        return $conexao->query($sql, array(":marca" => $this->getMarca(), ":ano" => $this->getAno(), ":modelo" => $this->getModelo(), ":motor" => $this->getMotor(), ":km" => $this->getKm(), ":cor" => $this->getCor(), ":comb" => $this->getComb(), ":chass" => $this->getChass(), ":obs" => $this->getObs(), ":doc" => $this->getDoc(), ":trocaoleo" => $this->getTrocaoleo(), ":trocafiltro" => $this->getTrocafiltro(), ":vistoria" => $this->getVistoria(), ":situa" => $this->getSitua(), ":placa" => $this->getPlaca()));

    }

    public function update($id){

        $conexao = new Conexao();
    
        $sql = "UPDATE $this->table SET marca = :marca, modelo = :modelo , motor = :motor , cor = :cor, comb = :comb, chass = :chass, obs = :obs, situa = :situa, placa = :placa, ano = :ano WHERE id = :id";
        
        return $conexao->query($sql, array(":marca" => $this->getMarca(), ":modelo" => $this->getModelo(), ":motor" => $this->getMotor(), ":cor" => $this->getCor(), ":comb" => $this->getComb(), ":ano" => $this->getAno() ,":chass" => $this->getChass(), ":obs" => $this->getObs(), ":placa" => $this->getPlaca() ,":situa" => $this->getSitua(), ":id" => $this->getId()));

    }

    public function updateManutencao($id){

        $conexao = new Conexao();
    
        $sql = "UPDATE $this->table SET km = :km, doc = :doc, trocaoleo = :trocaoleo, trocafiltro = :trocafiltro, vistoria = :vistoria WHERE id = :id";
        
        return $conexao->query($sql, array(":km" => $this->getKm(), ":doc" => $this->getDoc(), ":trocaoleo" => $this->getTrocaoleo(), ":trocafiltro" => $this->getTrocafiltro(), ":vistoria" => $this->getVistoria(), ":id" => $this->getId()));

    }

    public function findVeiculos($nome,$cpf){
        
        $conexao = new Conexao();

        $sql = "SELECT * FROM $this->table WHERE nome LIKE '%". $nome ."%' AND cpf LIKE '%". $cpf ."%'";

        return $conexao->select($sql, array(":nome" => $nome , ":cpf" => $cpf));
    }

    public function findById($id){
        
        $conexao = new Conexao();

        $sql = "SELECT * FROM $this->table WHERE id = :id";

        return $conexao->select($sql, array(":id" => $id));
    }


}



?>