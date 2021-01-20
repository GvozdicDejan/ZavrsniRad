<?php
    require("korpa.php");

class Shop {
    private $conn;
    public $greska;

    function connect(){
        $this->conn = new mysqli("localhost", "root", "", "shop");

        if($this->conn->connect_error){
            $this->greska = $this->conn->connect_error;
            return false;
        }
        $this->conn->set_charset("utf8");
        return true;
    }

    function upit($sql){
        return $this->conn->query($sql);
    }

    function real_escape_string($str){
        return $this->conn->real_escape_string($str);
    }
    
    function greska(){
        return $this->conn->error;
    }

    function affected_rows(){
        return $this->conn->affected_rows;
    }
    
    function insert_id(){
        return $this->conn->insert_id;
    }

    function daj_knjigu($id){
        $id = $_GET['id'];
        $podaci = $this->upit("SELECT * FROM knjige WHERE kid=$id");
        $red = $podaci->fetch_assoc();
        echo "<div class='knjiga_veca'>
            <a href='../view/knjiga.php?id=$id'>
                <img src=".$red['slika']." alt=''class='veca_slika'>
                <h3>".$red['naslov']."</h3>
                <p>".$red['autor']."</p>
                <p>Cena: ".$red['cena']."</p>
                </a>
                <a href='../view/korpa_table.php?id=$id'><div><button class='kupi'>Kupi</button></div><a/>
                </div>";
        echo "<div class='opis'><p>".$red['opis']."</p></div>";
        return $podaci->fetch_assoc();
        }
       
        
    function daj_sve_knjige(){
        $books = $this->upit("SELECT * FROM knjige INNER JOIN category ON knjige.category_id = category.cid");
        echo "<div class='naslovi'>";
        echo "<p>Sa ponosom predstavljamo</p>";
        echo "</div>";
        while($red = $books->fetch_assoc()){
            $id = $red['kid'];
            $cid = $red['cid'];
            echo "<div class='knjiga'>";
            echo "<a href='../view/knjiga.php?id=$id'>
                    <img src=".$red['slika']." alt=''>
                    <h3>".$red['naslov']."</h3>
                    <p>".$red['autor']."</p>

                </a>
                <a href='../view/proizvodi.php?id=$cid'>
                    <p>".$red['kategorija']."</p>
                </a>
                <a href='../view/korpa_table.php?id=$id'><div><button class='kupi'>Kupi</button></div><a/>
            </div>";
        }
        return $books->fetch_assoc();
    }

    function daj_kategoriju($cid){
        $kat = $this->upit("SELECT * FROM knjige INNER JOIN category ON knjige.category_id = category.cid WHERE category.cid=$cid");
        
        while($red = $kat->fetch_assoc()){
            $id = $red['kid'];
            $cid = $red['cid'];
            echo "<div class='knjiga'>";
            echo "<a href='knjiga.php?id=$id'>
                    <img src=".$red['slika']." alt=''>
                    <h3>".$red['naslov']."</h3>
                    <p>".$red['autor']."</p></a>
                <a href='../view/proizvodi.php?id=$cid'>
                    <p>".$red['kategorija']."</p>
                </a>
                <a href='../view/korpa_table.php?id=$id'><div><button class='kupi'>Kupi</button></div><a/>
            </div>";
        }
        return $kat->fetch_assoc();
    }

    function sve_kategorije(){
        $kategorije = $this->upit("SELECT * FROM category");
        
        while($red = $kategorije->fetch_assoc()){
            $id = $red['cid'];
            echo "<ul>
                    <li><a href='proizvodi.php?id=$id' class='tekst'>".$red['kategorija']."</a></li>
                </ul>";
        }
        return $kategorije->fetch_assoc();
    }

    function daj_nove_knjige(){
        $books = $this->upit("SELECT * FROM knjige INNER JOIN category ON knjige.category_id = category.cid ORDER BY knjige.kid DESC LIMIT 12");
        echo "<div class='naslovi'>";
        echo "<p>Novi naslovi</p>";
        echo "</div>";
        
        while($red = $books->fetch_assoc()){
            $id = $red['kid'];
            $cid = $red['cid'];
            echo "<div class='knjiga'>";
            echo "<a href='../view/knjiga.php?id=$id'>
                    <img src=".$red['slika']." alt=''>
                    <h3>".$red['naslov']."</h3>
                    <p>".$red['autor']."</p></a>
                    <a href='../view/proizvodi.php?id=$cid'>
                        <p>".$red['kategorija']."</p>
                    </a>
                    <a href='../view/korpa_table.php?id=$id'><div><input type='submit' value='Kupi' class='kupi'></div><a/>
                    </div>";
        }
        return $books->fetch_assoc();
    }

    function najtrazenije(){
        $books = $this->upit("SELECT * FROM knjige INNER JOIN category ON knjige.category_id = category.cid ORDER BY prodato_komada DESC LIMIT 8");
        echo "<div class='naslovi'>";
        echo "<p>Najtraženije</p>";
        echo "</div>";
        
        while($red = $books->fetch_assoc()){
            $id = $red['kid'];
            $cid = $red['cid'];
            echo "<div class='knjiga'>";
            echo "<a href='../view/knjiga.php?id=$id'>
                    <img src=".$red['slika']." alt=''>
                    <h3>".$red['naslov']."</h3>
                    <p>".$red['autor']."</p></a>
                <a href='../view/proizvodi.php?id=$cid'>
                    <p>".$red['kategorija']."</p>
                </a>
                <a href='../view/korpa_table.php?id=$id'><div><input type='submit' value='Kupi' class='kupi'></div><a/>
            </div>";
        }
        return $books->fetch_assoc();
    }

    function insert_knjiga($naslov, $autor, $opis, $slika, $cena, $category_id){
        $naslov = $this->real_escape_string($naslov);
        $autor = $this->real_escape_string($autor);
        $opis = $this->real_escape_string($opis);
        $slika = $this->real_escape_string($slika);
        $cena = $this->real_escape_string($cena);
        $category_id = $this->real_escape_string($category_id);

        return $this->upit("INSERT INTO knjige(naslov, autor, opis, slika, cena, category_id) VALUES 
        ('$naslov', '$autor', '$opis', '$slika', $cena, $category_id)");
    }

    function update_knjiga($id, $naslov, $autor, $opis, $slika, $cena, $category_id){
        $naslov = $this->real_escape_string($naslov);
        $autor = $this->real_escape_string($autor);
        $opis = $this->real_escape_string($opis);
        $slika = $this->real_escape_string($slika);
        $cena = $this->real_escape_string($cena);
        $category_id = $this->real_escape_string($category_id);

        return $this->upit("UPDATE knjige 
        SET naslov='$naslov', autor='$autor', opis='$opis', slika='$slika', cena='$cena', category_id='$category_id'
        WHERE kid='$id'");
    }

    function delete_knjiga($id){
        $id = $this->real_escape_string($id);
        return $this->upit("DELETE FROM knjige WHERE kid=$id");
    }

    function tabela_admin(){
        $books = $this->upit("SELECT * FROM knjige INNER JOIN category ON knjige.category_id = category.cid");
        echo "<br><br>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Knjiga</th>";
        echo "<th>Pisac</th>";
        echo "<th>Slika</th>";
        echo "<th>Cena</th>";
        echo "<th>Kategorija</th>";
        echo "</tr>";
        $books->data_seek(0);
        while($red = $books->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$red['naslov']."</td>";
            echo "<td>".$red['autor']."</td>";
            echo "<td><img src='".$red['slika']."' class='mala_slika'></td>";
            echo "<td>".$red['cena']."</td>";
            echo "<td>".$red['kategorija']."</td>";
            
            echo "<td><a href='../view/update_knjiga.php?id=".$red['kid']."'>Promeni</a></td>";
            echo "<td><a href='../dinamika/delete_knjiga.php?id=".$red['kid']."'>Obriši</a></td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }

   

    function tabela_grupe(){
        $grupe = $this->upit("SELECT * FROM category");
        echo "<br>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Kategorija</th>";
        echo "</tr>";
        while($red = $grupe->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$red['kategorija']."</td>";
            
            echo "<td><a href='../view/update_kategorije.php?id=".$red['cid']."'>Promeni</a></td>";
            echo "<td><a href='../dinamika/delete_kategorije.php?id=".$red['cid']."'>Obriši</a></td>";
            echo "</tr>";
        }
        echo "</table><br>";
    }

    function insert_kategorija($kategorija){
        $kategorija = $this->real_escape_string($kategorija);

        return $this->upit("INSERT INTO category(kategorija) VALUES ('$kategorija')");
    }

    function update_kategorije($id, $kategorija){
        $kategorija = $this->real_escape_string($kategorija);

        return $this->upit("UPDATE category 
        SET kategorija='$kategorija' WHERE cid='$id'");
    }

    function delete_kategorija($id){
        $id = $this->real_escape_string($id);
        return $this->upit("DELETE FROM category WHERE cid=$id");
    }

    function proizvod_1($id){
        $proizvodi = $this->conn->query("SELECT * FROM knjige WHERE kid=$id");
        $p = $proizvodi->fetch_all(MYSQLI_ASSOC);
        return $p[0];
    }
    
    function snimi($uku){
        $this->conn->autocommit(FALSE);  
        $t = $this->conn->query("INSERT INTO `korpa`(`id`, `datum_vreme`, `ukupno`) VALUES 
            (null, NOW(), $uku )");
        $id = $this->conn->insert_id;
        if(!$t){
            $this->conn->rollback();
            die("Nije upisano! ".$this->conn->error);
        }
        for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
            $t = $this->conn->query("INSERT INTO `stavke_korpe`
            (`id`, `korpa_id`, `knjiga_id`, `cena`, `kolicina`) VALUES 
            (null, $id, ".
            $_SESSION['stavke_korpe'][$i]['id'].", ".
            $_SESSION['stavke_korpe'][$i]['cena'].", ".
            $_SESSION['stavke_korpe'][$i]['kolicina']." ) "
            );
            if(!$t){
                $this->conn->rollback();
                die("NEUSPESNO: $i".$this->conn->error);
            }
        }
            
        $this->conn->commit();
        $this->conn->autocommit(TRUE);
    }
    
}

$shop = new Shop();
if(!$shop->connect()){
    die($shop->greska);
} 



?>