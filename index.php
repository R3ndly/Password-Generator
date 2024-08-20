<!DOCTYPE html>
<html>
<head>
<title>Генератор паролей</title>
<meta charset="utf-8" />
</head>
<body>

<h3>Генератор паролей</h3>
<form method="POST">
    <input type="text" placeholder="Введите длину пароля" value="8" name="passwordLength"/><br><br>
    <input type="checkbox" name="numbers" value="have"/>Содержит цифры <br>
    <input type="checkbox" name="symbol" value="yes"/>Содержит символ <br>
    <input type="checkbox" name="uppercase" value="up"/>Содержит заглавные буквы<br><br>
    <input type="submit" value="Сгенерировать"><br>
</form>
</body>
</html>

<?php       
        $passwordLength = $_POST["passwordLength"];
        $haveNumbers = $_POST["numbers"];
        $haveUpperCase = $_POST["uppercase"];
        $haveSymbol = $_POST["symbol"];
//123
        $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $symbols = ['$', '!', '%', '*', '_', '@', '#', '№'];
    
    function getPassword($passwordLength, $haveNumbers, $haveUpperCase, $haveSymbol, $letters, $numbers, $symbols) {

        $result = '';

        for($i = 0; $i < $passwordLength; $i++) {
            
            if($haveNumbers == "have") {
                if(rand(0, 6) > 4) {
                    $result .= $numbers[rand(0, 9)]; 
                    continue;
                } 
            }
            
            if($haveSymbol == "yes") {
                $result .= $symbols[rand(0, 7)];
                $haveSymbol = "no";
                continue;
            }
            
            if($haveUpperCase == "up") {
                if(rand(0, 10) > 5) {
                    $result .= strtoupper($letters[rand(0, 25)]); 
                    continue;
                } 
            }
            $result .= $letters[rand(0, 9)]; 
        }
        
        return "<br>" . $result;
    }
    
    if($passwordLength < 8) {
        echo '<h1>Такие короткие пароли нигде больше не принимают!</h1><br>';
    } else {
        echo "<b>Ваши пароли: </b>" . getPassword($passwordLength, $haveNumbers, $haveUpperCase, $haveSymbol, $letters, $numbers, $symbols);
        echo getPassword($passwordLength, $haveNumbers, $haveUpperCase, $haveSymbol, $letters, $numbers, $symbols);
        echo getPassword($passwordLength, $haveNumbers, $haveUpperCase, $haveSymbol, $letters, $numbers, $symbols);
        echo getPassword($passwordLength, $haveNumbers, $haveUpperCase, $haveSymbol, $letters, $numbers, $symbols);
    }
?>