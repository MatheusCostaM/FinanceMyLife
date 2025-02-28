<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function cadastrar($conn) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $this->nome, $this->email, $this->senha);
        return $stmt->execute();
    }

    public function iniciarconfigs($conn) {
        $select = "SELECT id FROM usuarios WHERE email = ?";
        $selectid = $conn->prepare($select);
        $selectid->bind_param("s", $this->email);
        $selectid->execute();
        $result = $selectid->get_result();

        $row = $result->fetch_assoc();
        $id = $row['id'];
        $sql = "INSERT INTO controladores (user_id, botao1, botao2, botao3, botao4, botao5, botao6, botao7, botao8, tipo1, tipo2, tipo3, tipo4) 
                VALUES (?, 0, 0, 0, 0, 0, 0, 0, 0, 'reduzir', 'reduzir', 'reduzir', 'reduzir')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function autenticar($conn, $email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    public static function recuperar($conn, $email, $nome, $newsenha) {

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if($usuario['nome'] == $nome){
            
            $senha = password_hash($newsenha, PASSWORD_DEFAULT);

            $sql = "UPDATE  usuarios 
            SET senha= '$senha'  
            WHERE email='$email'
            AND nome='$nome'";
    
            $sql_query = $conn->query($sql) or die($conn->error);

            return true;
        } else {
            return false;
        }

    }
}
?>