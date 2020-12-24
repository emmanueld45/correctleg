<?php
if (isset($_POST['get_regions'])) {

    $country = $_POST['country'];

    if ($country == "Nigeria") {
        echo "<option>Rivers</option>
        <option>Abia</option>
        <option>Adamawa</option>
        <option>Akwa Ibom</option>
        <option>Anambra</option>
        <option>Bauchi</option>
        <option>Bayelsa</option>
        <option>Benue</option>
        <option>Cross River</option>
        <option>Delta</option>
        <option>Ebonyi</option>
        <option>Edo</option>
        <option>Ekiti</option>
        <option>Enugu</option>
        <option>Federal Capital Territory</option>
        <option>Gombe</option>
        <option>Imo</option>
        <option>Jigawa</option>
        <option>Kaduna</option>
        <option>Kano</option>
        <option>Katsina</option>
        <option>Kebbi</option>
        <option>Kogi</option>
        <option>Kwara</option>
        <option>Lagos</option>
        <option>Nasarawa</option>
        <option>Niger</option>
        <option>Ogun</option>
        <option>Ondo</option>
        <option>Osun</option>
        <option>Oyo</option>
        <option>Plateau</option>
        <option>Rivers</option>
        <option>Sokoto</option>
        <option>Taraba</option>
        <option>Zamfara</option>
       ";
    }


    if ($country == "Ghana") {
        echo "<option>Akosombo</option>
        <option>Accra</option>
        <option>Adenta</option>
        <option>Aflao</option>
        <option>Agogo</option>
        <option>AgonaSwedru</option>
        <option>AkimOda</option>
        <option>Anloga</option>
        <option>Asamankese</option>
        <option>Ashiaman</option>
        <option>Bawku</option>
        <option>Berekum</option>
        <option>Bolgatanga</option>
        <option>Cape Coast</option>
        <option>Dome</option>
        <option>Effiakuma</option>
        <option>Ejura</option>
        <option>Gbawe</option>
        <option>Ho</option>
        <option>Hohoe</option>
        <option>Kasoa</option>
        <option>Kintampo</option>
        <option>Koforidua</option>
        <option>Konongo</option>
        <option>Kumasi</option>
        <option>Lashibi</option>
        <option>Madina</option>
        <option>Mampong</option>
        <option>Nkawkaw</option>
        <option>Nsawam</option>
        <option>Nungua</option>
        <option>Obuasi</option>
        <option>Oduponkpehe</option>
        <option>Prestea</option>
        <option>Savelugu</option>
        <option>Suhum</option>
        <option>Sunyani</option>
        <option>Taifa</option>
        <option>Takoradi</option>
        <option>Tamale</option>
        <option>Tarkwa</option>
        <option>Techiman</option>
        <option>Tema</option>
        <option>Teshie</option>
        <option>Wa</option>
        <option>Wenchi</option>
        <option>Winneba</option>
        <option>Yendi</option>
       ";
    }


    if ($country == "South Africa") {
        echo "<option>Alice</option>
        <option>Butterworth</option>
        <option>East London</option>
        <option>Graaff-Reinet</option>
        <option>Grahams-town</option>
        <option>King William’s Town</option>
        <option>Mthatha</option>
        <option>Port Elizabeth</option>
        <option>Queenstown</option>
        <option>Uitenhage</option>
        <option>Zwelitsha</option>
        <option>Bethlehem</option>
        <option>Bloemfontein</option>
        <option>Jagersfontein</option>
        <option>Kroonstad</option>
        <option>Odendaalsrus</option>
        <option>Parys</option>
        <option>Phuthaditjhaba</option>
        <option>Sasolburg</option>
        <option>Virginia</option>
        <option>Welkom</option>
        <option>Benoni</option>
        <option>Boksburg</option>
        <option>Brakpan</option>
        <option>Carletonville</option>
        <option>Germiston</option>
        <option>Johannesburg</option>
        <option>Krugersdorp</option>
        <option>Pretoria</option>
        <option>Randburg</option>
        <option>Randfontein</option>
        <option>Roodepoort</option>
        <option>Soweto</option>
        <option>Springs</option>
        <option>Vanderbijlpark</option>
        <option>Vereeniging</option>
        <option>Durban</option>
        <option>Empangeni</option>
        <option>Ladysmith</option>
        <option>Newcastle</option>
        <option>Pietermaritzburg</option>
        <option>Pinetown</option>
        <option>Ulundi</option>
        <option>Umlazi</option>
        <option>Giyani</option>
        <option>Lebowakgomo</option>
        <option>Musina</option>
        <option>Phalaborwa</option>
        <option>Polokwane</option>
        <option>Seshego</option>
        <option>Sibasa</option>
        <option>Thabazimbi</option>
        <option>Emalahleni</option>
        <option>Nelspruit</option>
        <option>Secunda</option>
        <option>Klerksdorp</option>
        <option>Mahikeng</option>
        <option>Mmabatho</option>
        <option>Potchefstroom</option>
        <option>Rustenburg</option>
        <option>Kimberley</option>
        <option>Kuruman</option>
        <option>Port Nolloth</option>
        <option>Bellville</option>
        <option>Cape Town</option>
        <option>Constantia</option>
        <option>George</option>
        <option>Hopefield</option>
        <option>Oudtshoorn</option>
        <option>Paarl</option>
        <option>Simon’s Town</option>
        <option>Stellenbosch</option>
        <option>Swellendam</option>
        <option>Worcester</option>


       ";
    }


    if ($country == "Egypt") {
        echo "
    
    <option>Aswān</option>
    <option>Idfū</option>
    <option>KawmUmbū</option>
    <option>Asyūṭ</option>
    <option>Al-Ghardaqah</option>
    <option>BanīSuwayf</option>
    <option>Damanhūr</option>
    <option>Idkū</option>
    <option>Rosetta</option>
    <option>Port Said</option>
    <option>Cairo</option>
    <option>Ḥulwān</option>
    <option>MadīnatKhāmastāsharMāyo</option>
    <option>Al-Manṣūrah</option>
    <option>Damietta</option>
    <option>Al-Fayyūm</option>
    <option>Al-Maḥallah al-Kubrā</option>
    <option>Sais</option>
    <option>Ṭanṭā</option>
    <option>Alexandria</option>
    <option>Al-ʿĀmiriyyah</option>
    <option>Ismailia</option>
    <option>Al-Ṭūr</option>
    <option>Al-Jīzah</option>
    <option>Kafr al-Shaykh</option>
    <option>El-Alamein</option>
    <option>MarsāMaṭrūḥ</option>
    <option>Madīnat al-Sādāt</option>
    <option>Shibīn al-Kawm</option>
    <option>Al-Minyā</option>
    <option>Banhā</option>
    <option>Qalyūb</option>
    <option>Shubrā al-Khaymah</option>
    <option>Dandarah</option>
    <option>NajʿḤammādī</option>
    <option>Naqādah</option>
    <option>Qifṭ</option>
    <option>Qinā</option>
    <option>Al-ʿArīsh</option>
    <option>Bilbays</option>
    <option>Madīnat al-ʿĀshir min Ramaḍān</option>
    <option>Al-Zaqāzīq</option>
    <option>Akhmīm</option>
    <option>Jirjā</option>
    <option>Sūhāj</option>
    <option>Suez</option>
    <option>Luxor</option>
    <option>Al-Khārijah</option>
    ";
    }



    if ($country == "Kenya") {
        echo "
        <option>Eldoret</option>
        <option>Embu</option>
        <option>Garissa</option>
        <option>Kakamega</option>
        <option>Kisumu</option>
        <option>Lamu</option>
        <option>Meru</option>
        <option>Mombasa</option>
        <option>Nairobi</option>
        <option>Nakuru</option>
        <option>Nyeri</option>
        <option>Thika</option>

        ";
    }



    if ($country == "Rwanda") {
        echo "
        <option>Kigali </option>
        <option>Kicukiro</option>
        <option>Rutongo</option>
        <option>Nyanza </option>
        <option>Muhanga</option>
        <option>Kamonyi</option>
        <option>Ruhango</option>
        <option>Butare</option>
        <option>Gisagara</option>
        <option>Nyaruguru</option>
        <option>Nyamagabe</option>
        <option>Byumba</option> 
        <option>Ruhengeri</option>
        <option>Kibuye</option> 
        <option>Cyangugu</option>
        <option>Gisenyi</option>
        <option>Rwamagana Kibungo</option>
        ";
    }
}
