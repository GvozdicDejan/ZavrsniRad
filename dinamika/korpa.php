<?php
    session_start();

    class Korpa {
        public $niz;
        function __construct()
        {
            if(!isset($_SESSION['stavke_korpe'])){
                $_SESSION['stavke_korpe'] = [];
            }
        }

        function dodaj_proizvod_u_korpu($id, $kol, $cena, $naslov){
            array_push($_SESSION['stavke_korpe'], 
                ['id'=>$id, 'naslov'=>$naslov, 'cena'=>$cena, 'kolicina'=>$kol]);
        }
        function promeni_kolicinu($id, $kol){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id'] === $id)
                   $_SESSION['stavke_korpe'][$i]['kolicina'] = $kol; 
        }
        function dodaj_kolicinu($id, $kol){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id'] === $id)
                   $_SESSION['stavke_korpe'][$i]['kolicina'] += $kol; 
        }
        function obrisi_proizvod($id){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id'] === $id){
                    array_splice($_SESSION['stavke_korpe'], $i, 1);
                    return;
                }
        }

        function obrisi_korpu(){
            $_SESSION['stavke_korpe'] = [];
        }
        
        function da_li_postoji_proizvod($id){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
                if($_SESSION['stavke_korpe'][$i]['id'] === $id)
                    return true;
            }
            return false;
        }

        function prikazi(){
            ?>
            <table border="1">
            <thead>
                <tr>
                    <th>Naslov</th>
                    <th>Cena</th>
                    <th>Kolicina</th>
                    <th>Ukupno</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($_SESSION['stavke_korpe'] as $red){
                        echo "<tr>";
                        echo "<td>".$red['naslov']."</td>";
                        echo "<td>".$red['cena']."</td>";
                        echo "<td>".$red['kolicina']."</td>";
                        echo "<td>".($red['cena'] * $red['kolicina'])."</td>";
                        echo "<td>
                            <form action='../dinamika/dodaj_kolicinu.php' method='GET'>
                                <input type='hidden' value='".$red['id']."' name='id' />
                                <input type='submit' value='Dodaj' />
                            </form>
                            </td>";
                            echo "<td>
                            <form action='../dinamika/obrisi.php' method='GET'>
                                <input type='hidden' value='".$red['id']."' name='id' />
                                <input type='submit' value='Obriši' />
                            </form>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>

                <button class="kupi2"><a href="../dinamika/dodaj.php">Dodaj</a></button>
                <button class="kupi2"><a href="../dinamika/obrisi_korpu.php">Obriši korpu</a></button>
                <button class="kupi2"><a href="../dinamika/snimi_korpu.php">Snimi korpu</a></button>
            <?php
        }

        function ukupno(){
            $s = 0;
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                $s += $_SESSION['stavke_korpe'][$i]['cena'] * $_SESSION['stavke_korpe'][$i]['kolicina'];
            return $s;
        }
    }

    $korpa = new Korpa();