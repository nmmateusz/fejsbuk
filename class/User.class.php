<?php
class User{
      //klasa user ma zawierać wszystkie informacje i czynności związane z użytkownikiem portalu
     //modelem w bazie danych jest tabela user

     static function Register( string $email, string $password)  : bool{
        //ponizsza funkcja odpowiada za dodanie użytkownika do właściwej tabeli w bazie danych
        //user{id INT, email VARCHAR(128), password VARCHAR(128)}

        //skonwertuj haslo do hasha
        $passwrodHash = password_hash($password, PASSWORD_ARGON2I);


        //połączenie do bazy danych borzej
        $db = new mysqli('localhost', 'root', '', 'fejsbuk');
        //kwerenda do bazy danych
        $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
        //zapytanie
        $q = $db->prepare($sql);
        //podstaw dane
        $q->bind_param("ss", $email, $passwordHash);

        //wyslioj zapytanie
        $result = $q->execute();
        //zwróć wynik rejestracji 
        return $result;
     }
}
?>