<?php
class Item extends Conexao{
    public function insert_item($data)
    {

        $pdo = parent::get_instance();

        $sql = "INSERT INTO equipamento VALUES(NULL, :nome, :quantidade, :tipo, :precototal, :user_id)";

        $statement = $pdo->prepare($sql);
        foreach($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        session_start();
        $IID = $_SESSION['user_id'];
        $statement->bindValue(":user_id", $IID, PDO::PARAM_INT);
        $statement->execute();

    }

    public function list_item()
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM equipamento order by idEquipamento desc";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();

    }

    public function list_item_by_id($id)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM equipamento WHERE idEquipamento = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        return $statement->fetchAll();

    }

    public function delete_item($id)
    {
        $pdo = parent::get_instance();
        $sql = "DELETE FROM equipamento WHERE idEquipamento = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
    }

    public function update_item($data)
    {
        $pdo = parent::get_instance();
        $sql = "UPDATE equipamento
                    set Nome = :nome,
                        Quantidade = :quantidade,
                            Tipo = :tipo,
                                PrecoTotal = :precototal
                                            WHERE idEquipamento = :id";
        var_dump($sql);
        $statement = $pdo->prepare($sql);
        foreach ($data as $key => $value){
                $statement->bindValue(":$key", $value);
        }
        $statement->execute();
    }
}
?>