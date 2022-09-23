<?php

    class Bijuu {
        private $nome = null;    
        private $animal = null;    
        private $quantidade_caudas = 0;    
        private $jinchuuriki = null;    
        private $descricao_fisica = null;    
        private $aldeia_residente = null;    
        private $status = null;    
        private $quem_capturou = null;    
        private $quem_matou = null;
        private $imagem = null;
    
        public function getNome(){
            return $this->nome;    
        }

        public function setNome($nome){
            $this->nome = $nome;
            return $this;    
        }

        public function getAnimal(){
            return $this->animal;    
        }

        public function setAnimal($animal){
            $this->animal = $animal;
            return $this;    
        }
    
        public function getQuantidade_caudas(){
            return $this->quantidade_caudas;    
        }

        public function setQuantidade_caudas($quantidade_caudas){
            $this->quantidade_caudas = $quantidade_caudas;
            return $this;    
        }
    
        public function getJinchuuriki(){
            return $this->jinchuuriki;    
        }

        public function setJinchuuriki($jinchuuriki){
            $this->jinchuuriki = $jinchuuriki;
            return $this;    
        }
    
        public function getDescricao_fisica(){
            return $this->descricao_fisica;    
        }

        public function setDescricao_fisica($descricao_fisica){
            $this->descricao_fisica = $descricao_fisica;
            return $this;    
        }
    
        public function getAldeia_residente(){
            return $this->aldeia_residente;    
        }

        public function setAldeia_residente($aldeia_residente){
            $this->aldeia_residente = $aldeia_residente;
            return $this;    
        }
    
        public function getStatus(){
            return $this->status;    
        }

        public function setStatus($status){
            $this->status = $status;
            return $this;    
        }
    
        public function getQuem_capturou(){
            return $this->quem_capturou;    
        }

        public function setQuem_capturou($quem_capturou){
            $this->quem_capturou = $quem_capturou;
            return $this;    
        }
    
        public function getQuem_matou(){
            return $this->quem_matou;    
        }

        public function setQuem_matou($quem_matou){
            $this->quem_matou = $quem_matou;
            return $this;    
        }

        function getImagem() {
            return $this->imagem;
        }
        
        function setImagem($imagem) {
            $this->imagem = $imagem;
            return $this;
        }

        public function conexao() :\PDO
        {
            return new \PDO("mysql:host=localhost;dbname=bijuus", "root", "davidspfcfcb1992-21");
        }

        public function create() :array
        {
            $con = $this->conexao();

            switch ($this->getQuantidade_caudas()) {
                case 1:
                    $this->setImagem("https://pm1.narvii.com/6251/602ed2f83067e56bffeb748083dab36b5f998e1e_hq.jpg");
                    break;
                case 2:
                    $this->setImagem("https://pm1.narvii.com/6366/eca2588df86002de80a06f267b5a1a32b65f5ecd_hq.jpg");
                    break;
                case 3:
                    $this->setImagem("http://pm1.narvii.com/6639/f05bda0da40e81cb8613c2decfe6bb6828464068_00.jpg");
                    break;
                case 4:
                    $this->setImagem("https://static3.cbrimages.com/wordpress/wp-content/uploads/2020/11/Son-Goku-Naruto.png");
                    break;
                case 5:
                    $this->setImagem("http://pm1.narvii.com/6481/f19f50b4c84ea83d3d84cd8cd5dab342b7f09b91_00.jpg");
                    break;
                case 6:
                    $this->setImagem("http://pm1.narvii.com/6572/4331d4d1a2e89a3bcbd9b0c662ea16608f681cfd_00.jpg");
                    break;
                case 7:
                    $this->setImagem("http://1.bp.blogspot.com/-6M82NQOCGa4/UcTDt5eQsCI/AAAAAAAACDo/Kp3iBndTKuc/s1600/nanabi___7_caudas_by_luisuchihahatake-d5d5ek1.png");
                    break;
                case 8:
                    $this->setImagem("https://upload.wikimedia.org/wikipedia/pt/8/8f/Gyuuki_%28Hachibi%29.png");
                    break;
                case 9:
                    $this->setImagem("https://i.pinimg.com/736x/d9/db/c3/d9dbc30d4fb8ac7f1cd6f5d820d18bec--collection-image.jpg");
                    break;
                default:
                    $this->setImagem(null);
            }

            $stmt = $con->prepare("INSERT INTO besta_com_cauda VALUES(:_nome, :_animal, :_qtd_de_caudas, :_jinchuuriki, :_descricao, :_aldeia_reside, :_status_bijuu, :_quem_capturou, :_quem_matou, :_img)");
            $stmt->bindValue(":_nome", $this->getNome(), \PDO::PARAM_STR);
            $stmt->bindValue(":_animal", $this->getAnimal(), \PDO::PARAM_STR);
            $stmt->bindValue(":_qtd_de_caudas", $this->getQuantidade_caudas(), \PDO::PARAM_INT);
            $stmt->bindValue(":_jinchuuriki", $this->getJinchuuriki(), \PDO::PARAM_STR);
            $stmt->bindValue(":_descricao", $this->getDescricao_fisica(), \PDO::PARAM_STR);
            $stmt->bindValue(":_aldeia_reside", $this->getAldeia_residente(), \PDO::PARAM_STR);
            $stmt->bindValue(":_status_bijuu", $this->getStatus(), \PDO::PARAM_STR);
            $stmt->bindValue(":_quem_capturou", $this->getQuem_capturou(), \PDO::PARAM_STR);
            $stmt->bindValue(":_quem_matou", $this->getQuem_matou(), \PDO::PARAM_STR);
            $stmt->bindValue(":_img", $this->getImagem(), PDO::PARAM_STR);
            if($stmt->execute()){
                return $this->read($this->getQuantidade_caudas());
            }
            return [];
        }

        public function read($chave) :array
        {
            $con = $this->conexao();
            if($chave === 0){
                $stmt = $con->prepare("SELECT * FROM besta_com_cauda");//proteção contra comandos maliciosos (como alter table)
                if($stmt->execute()){
                    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                }
            } else if($chave <= 9){
                $stmt = $con->prepare("SELECT * FROM besta_com_cauda WHERE qtd_de_caudas = :_caudas");
                $stmt->bindValue(":_caudas", $chave, \PDO::PARAM_INT);
                if($stmt->execute()){
                    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                }
            }
            return [];
        }

        public function update() :array
        {
            $con = $this->conexao();

            switch ($this->getQuantidade_caudas()) {
                case 1:
                    $this->setImagem("https://pm1.narvii.com/6251/602ed2f83067e56bffeb748083dab36b5f998e1e_hq.jpg");
                    break;
                case 2:
                    $this->setImagem("https://pm1.narvii.com/6366/eca2588df86002de80a06f267b5a1a32b65f5ecd_hq.jpg");
                    break;
                case 3:
                    $this->setImagem("http://pm1.narvii.com/6639/f05bda0da40e81cb8613c2decfe6bb6828464068_00.jpg");
                    break;
                case 4:
                    $this->setImagem("https://static3.cbrimages.com/wordpress/wp-content/uploads/2020/11/Son-Goku-Naruto.png");
                    break;
                case 5:
                    $this->setImagem("http://pm1.narvii.com/6481/f19f50b4c84ea83d3d84cd8cd5dab342b7f09b91_00.jpg");
                    break;
                case 6:
                    $this->setImagem("http://pm1.narvii.com/6572/4331d4d1a2e89a3bcbd9b0c662ea16608f681cfd_00.jpg");
                    break;
                case 7:
                    $this->setImagem("http://1.bp.blogspot.com/-6M82NQOCGa4/UcTDt5eQsCI/AAAAAAAACDo/Kp3iBndTKuc/s1600/nanabi___7_caudas_by_luisuchihahatake-d5d5ek1.png");
                    break;
                case 8:
                    $this->setImagem("https://upload.wikimedia.org/wikipedia/pt/8/8f/Gyuuki_%28Hachibi%29.png");
                    break;
                case 9:
                    $this->setImagem("https://i.pinimg.com/736x/d9/db/c3/d9dbc30d4fb8ac7f1cd6f5d820d18bec--collection-image.jpg");
                    break;
                default:
                    $this->setImagem(null);
            }

            $stmt = $con->prepare("UPDATE besta_com_cauda SET nome=:_nome, animal=:_animal, qtd_de_caudas=:_caudas, jinchuuriki=:_jinchuuriki, descricao=:_descricao, aldeia_reside=:_aldeia_reside, status_bijuu=:_status_bijuu, quem_capturou=:_quem_capturou, quem_matou=:_quem_matou, img_src=:_img WHERE qtd_de_caudas = :_qtd_caudas");
            $stmt->bindValue(":_nome", $this->getNome(), \PDO::PARAM_STR);
            $stmt->bindValue(":_animal", $this->getAnimal(), \PDO::PARAM_STR);
            $stmt->bindValue(":_caudas", $this->getQuantidade_caudas(), \PDO::PARAM_INT);
            $stmt->bindValue(":_jinchuuriki", $this->getJinchuuriki(), \PDO::PARAM_STR);
            $stmt->bindValue(":_descricao", $this->getDescricao_fisica(), \PDO::PARAM_STR);
            $stmt->bindValue(":_aldeia_reside", $this->getAldeia_residente(), \PDO::PARAM_STR);
            $stmt->bindValue(":_status_bijuu", $this->getStatus(), \PDO::PARAM_STR);
            $stmt->bindValue(":_quem_capturou", $this->getQuem_capturou(), \PDO::PARAM_STR);
            $stmt->bindValue(":_quem_matou", $this->getQuem_matou(), \PDO::PARAM_STR);
            $stmt->bindValue(":_img", $this->getImagem(), \PDO::PARAM_STR);
            $stmt->bindValue(":_qtd_caudas", $this->getQuantidade_caudas(), \PDO::PARAM_INT);
            if($stmt->execute()){
                return $this->read($this->getQuantidade_caudas());
            }
            return [];
        }

        public function delete() :array
        {
            $con = $this->conexao();
            //proteção contra comandos maliciosos (como alter table)
            $stmt = $con->prepare("DELETE FROM besta_com_cauda WHERE qtd_de_caudas = :_caudas");
            $stmt->bindValue(":_caudas", $this->getQuantidade_caudas(), \PDO::PARAM_STR);
            if($stmt->execute()){
                return $this->read(0);
            }
            return [];
        }
}