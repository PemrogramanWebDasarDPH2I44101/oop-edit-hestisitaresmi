<?php
class Kalkulator{
    private $conn;

    public function Kalkulator(){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $db         = "webdasar";       
        $this->conn = mysqli_connect($servername, $username, 
                           $password, $db);                        
    }    

    public function tambah(){
        $angka1 = $_POST['input1'];
        $angka2 = $_POST['input2'];
        $angka3 = $_POST['input3'];
        $sql    = "INSERT INTO siswa(nama, nim, tgal_lahir) 
                    VALUES ('$angka1','$angka2','$angka3')";
        mysqli_query($this->conn, $sql);   

    }   

    public function kurang(){        
        $angka1 = $_POST['input1'];
        $angka2 = $_POST['input2'];
        $sql    = "DELETE FROM siswa WHERE nim=$angka2";        
        mysqli_query($this->conn, $sql);

    }

    public function bagi(){
        $sql    = "SELECT * FROM siswa";        
        return mysqli_query($this->conn, $sql);
    }
    public function view_data($nim){
            $sql = "SELECT * FROM siswa where nim = '$nim'";
            return mysqli_query($this->conn,$sql);

    }

}
@$operasi = $_POST["operasi"];
$kalkulator = new Kalkulator();
if($operasi == "+"){
    $kalkulator->tambah();
    echo "Data Telah Ditambahkan";
}
if($operasi == "-"){
    $kalkulator->kurang();
    echo "Data Telah Terhapus";
}
if($operasi == "/"){
    $result = $kalkulator->bagi();
    require_once("data.php");
}
    

?>