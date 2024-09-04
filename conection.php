<?php
    class crudtest{
        public static function conect()
        {
           try {
            $con=new PDO('mysql:localhost=host; dbname=crudtest','root','');
            return $con;
           } catch (PDOException $error1) {
                echo 'Something went wrong, with you conection!'.$error1->getMessage();
           }catch (Exception $error2){
                 echo 'Generic error!'.$error2->getMessage();
           }
        }
        public static function Selectdata()
        {
            $data=array();
            $p=crudtest::conect()->prepare('SELECT * FROM tabletest');
            $p->execute();
           $data=$p->fetchAll(PDO::FETCH_ASSOC);
           return $data;
        }
        public static function delete($id)
        {
            $p=tabletest::conect()->prepare('DELETE FROM crudtest WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        }
public static function userDataPerId($id)
{
    $data=array();
    $p=tabletest::conect()->prepare('SELECT * FROM crudtest WHERE id=:id');
    $p->bindValue(':id',$id);
    $p->execute();
   $data=$p->fetch(PDO::FETCH_ASSOC);
   return $data;
}




    }





?>