<!-- 1. Viết chương trình PHP để kiểm tra xem một số có phải là số chẵn hay không. -->
<?php
echo "Câu 1: <br>";
   function Kiemtrasochan($number)
   {
        if ($number % 2 == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
   }

   $number =10;
   if (Kiemtrasochan($number))
   {
        echo "$number la so chan <br>";
   }
   else 
   {
    echo "$number khong phai la so chan <br>";
   }
   echo "<br>";
?>

<!-- 2. Viết chương trình PHP để tính tổng của các số từ 1 đến n. -->
<?php
echo "Câu 2: <br>";  
    function Tinhtong ($n)
    {
        $sum = 0;
        for ($i = 1; $i <= $n ; $i++)
        {
            $sum += $i;
        }
    return $sum;
    }
    $n= 6;

    $sum = Tinhtong ($n);
    echo "Tong tu 1 đến $n là: $sum <br>";
    echo "<br>";
?>

<!-- 3. Viết chương trình PHP để in ra bảng cửu chương từ 1 đến 10. -->
<?php
echo "Câu 3: <br>";  
function printMultiplicationTable($n) {
    for ($i = 1; $i <= 10; $i++) {
        $result = $n * $i;
        echo "$n x $i = $result<br>";
    }
}
printMultiplicationTable(5);
echo "<br>";
?>

<!-- 4. Viết chương trình PHP để kiểm tra xem một chuỗi có chứa một từ cụ thể hay không. -->
<?php
echo "Câu 4: <br>";  
    function ContainWord($string,$word)
    {
        $check= strpos($string,$word);
        return $check !== false;
    }

    $string= "Hello World";
    $word = "Hello";
    if (ContainWord($string, $word))
    {
        echo "Chuỗi $string chứa từ $word <br>";
    }
    else
    {
        echo "Chuỗi $string không chứa từ $word <br>";
    }
    echo "<br>";
?>

<!-- 5. Viết chương trình PHP để tìm giá trị lớn nhất và nhỏ nhất trong một mảng. -->
<?php
echo "Câu 5: <br>";  
    function FindMinMax ($array)
    {
        $max = $min = $array[0];
        foreach($array as $value)
        {
            if ($value > $max)
            {
                $max =$value;
            }
            elseif ($value < $min)
            {
                $min =$value;
            }
        }
        return
        [
            "max" => $max,
            "min" => $min
        ];
    }

    $array = [2,5,6,7,4,6,2,7,9,1];
    $result = FindMinMax($array);
    echo "Giá trị lớn nhất là: " .$result["max"] ."<br>" ;
    echo "Giá trị nhỏ nhất là: " .$result["min"] ."<br>";
    echo "<br>";
?>

<!-- 6. Viết chương trình PHP để sắp xếp một mảng theo thứ tự tăng dần. -->
<?php
echo "Câu 6: <br>";  
    function SapXepTangDan($array)
    {
        //Hàm sắp xếp tăng dần
        sort($array);
        //Trả kết quả
        foreach ($array as $value)
        {
        echo "$value <br>";
        }
    }

    $arr = [4,7,2,9,5,1,3];
    echo "Mảng: <br>";
    foreach ($arr as $number)
    {
        echo "$number <br>";
    }
    echo "Kết quả sắp xếp theo thứ tự tăng dần: <br> " ;
    $result = SapXepTangDan($arr);
    echo "<br>";
?>

<!-- 7. Viết chương trình PHP để tính giai thừa của một số nguyên dương. -->
<?php
echo "Câu 7: <br>";  
    function TinhGiaiThua($n)
    {
        if ($n<0)
        {
            echo "So khong hop le vui long nhap lai";
        }
        if ($n==0)
        {
            return 1; // Giai thua cua 0 bang 1
        }
        $giaithua=1;
        for($i=1; $i<=$n;$i++)
        {
            $giaithua *= $i;
        }
        return $giaithua;
    }
    $number=5;
    $result = TinhGiaiThua($number);
    echo "Giai thua cua $number la: " .$result ."<br>";
    echo "<br>";
?>


<!-- 8. Viết chương trình PHP để tìm số nguyên tố trong một khoảng cho trước. -->
<?php
echo "Câu 8: <br>";  
function KiemTraSoNguyenTo($n) {
    if ($n < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }

    return true;
}

function TimSoNguyenToTrongKhoang($start, $end) {
    $SoNguyenTo = [];

    for ($i = $start; $i <= $end; $i++) {
        if (KiemTraSoNguyenTo($i)) {
            $soNguyenTo[] = $i;
        }
    }

    return $soNguyenTo;
}

$start = 17;
$end = 30;

$result = TimSoNguyenToTrongKhoang($start, $end);

echo "Các số nguyên tố trong khoảng từ $start đến $end là: <br>" ;
print_r($result);
echo "<br>";
echo "<br>";
?>

<!-- 9. Viết chương trình PHP để tính tổng của các số trong một mảng. -->
<?php
echo "Câu 9: <br>";  
function SumArray($array)
{
    $sum = 0;
    for ($i = 0; $i < count($array); $i++)
    {
        $sum += $array[$i];
    }
    return $sum;
}

$arr = [4, 7, 6, 3, 1];
$result= SumArray($arr);
echo "Tổng các phần tử trong mảng là: " . $result. "<br>";
echo"<br>";
?>

<!-- 10. Viết chương trình PHP để in ra các số Fibonacci trong một khoảng cho trước. -->
<?php
echo "Câu 10: <br>";  
    function PrintFibonacci($n)
    {
        $fibonacci= array();
        $fibonacci[0] =0;
        $fibonacci[1] = 1;
        for ($i=2; $i < $n; $i++)
        {
            $fibonacci[$i] = $fibonacci[$i-1] + $fibonacci[$i-2];
        }
        return $fibonacci;
    }
    $n=10;
    $result = PrintFibonacci($n);
    echo "$n số fibonacci đầu tiên là: ";
    print_r($result);
    echo "<br>";
    echo "<br>";
// ?>

<!-- 11. Viết chương trình PHP để kiểm tra xem một số có phải là số Armstrong hay không. -->
<?php
echo "Câu 11: <br>";  
function CheckingArmstrongNumber($number)
{
    $orginalnumber= $number;
    $sum = 0;
    $n = strlen($number);

    while ($number != 0) {
        $rest = $number % 10;
        $sum += pow($rest, $n);
        $number = (int)($number / 10);
    }

    return $sum == $orginalnumber;
}

$number = 153;

if (CheckingArmstrongNumber($number)) {
    echo "$number là số Armstrong. <br>";
} else {
    echo "$number không phải là số Armstrong. <br>";
}
echo "<br>";
?>


<!-- 12. Viết chương trình PHP để chèn một phần tử vào một mảng ở vị trí bất kỳ. -->
<?php
echo "Câu 12: <br>";  
function insertElement($array, $element, $position)
{
    array_splice($array, $position, 0, $element);
    return $array;
}

$array = array(1, 2, 3, 4, 5);
echo "Mảng ban đầu: ";
print_r($array);
echo "<br>";

$element = 10;

$position = 2;

$result = insertElement($array, $element, $position);

echo "Mảng sau khi chèn phần tử $element vào vị trí $position là: ";
print_r($result);
echo "<br>";
echo "<br>";
?>

<!-- 13. Viết chương trình PHP để loại bỏ các phần tử trùng lặp trong một mảng. -->
<?php
echo "Câu 13: <br>";
function RemovingDuplicates($arr){
    $uniquearray = array_unique($arr);
    $resultarray = array_values($uniquearray);
    return $resultarray;
}

$array = array(1, 2, 2, 3, 4, 4, 5, 6 ,7, 8);
echo "Mảng ban đầu: ";
print_r($array);
echo "<br>";
$result = RemovingDuplicates($array);
echo "Mảng sau khi loại bỏ phần tử trùng lặp: ";
print_r($result);
echo "<br>";
echo "<br>";
?>

<!-- 14. Viết chương trình PHP để tìm vị trí của một phần tử trong một mảng. -->
<?php
echo "Câu 14: <br>";
    function FindingPosition($array, $number)
    {
        for($i = 0; $i < count($array); $i++)
        {
            if($array[$i]==$number)
            {;
                return $i+=1;
            }
        }
    }

    $array =[4,6,8,4,5,8,2,4];
    foreach ($array as $value)
    {
        echo "$value<br>";
    }
    $number=5;
    $result =  FindingPosition($array,$number);
    echo "Vị trí của số $number trong mảng là: " .$result ."<br>";
    echo "<br>";
?>

<!-- 15. Viết chương trình PHP để đảo ngược một chuỗi. -->
<?php
echo "Câu 15: <br>";
    function Reverse($string)
    {
        $stringrev =strrev($string);
        return $stringrev;
    }
    $str = "long";
    $result= Reverse($str);
    echo "Chuôi đảo ngược của chuỗi $str là: " .$result ."<br>";
    echo "<br>";
?>

<!-- 16. Viết chương trình PHP để tính số lượng phần tử trong một mảng. -->
<?php
echo "Câu 16: <br>";
    function CountArray($array)
    {
        $k= 0;
        for ($i = 0; $i < count($array); $i++)
        {
            $k++;
        }
        return $k;
    }

    $arr = [5, 5, 3, 6, 6, 8, 8];
    foreach($arr as $value)
    {
        echo "$value<br>";
    }
    $result = CountArray($arr);
    echo "Số lượng phần tử có trong mảng là: " .$result ."<br>";
    echo "<br>";
?>

<!-- 17. Viết chương trình PHP để kiểm tra xem một chuỗi có phải là chuỗi Palindrome hay không. -->
<?php     
echo "Câu 17: <br>";
    function PalindromeCheck($string)
    {
        $string = strtolower(str_replace(' ','',$string));
        return $string = strrev($string);
    }
    $str = 'Radar';
    if(PalindromeCheck($str))
    {
        echo "Chuỗi $str là chuỗi Palindrome <br>";
    }
    else 
    {
        echo "Chuỗi $str không phải là chuỗi Palindrome <br>";
    }
    echo "<br>";
?>

<!-- 18. Viết chương trình PHP để đếm số lần xuất hiện của một phần tử trong một mảng. -->
<?php
echo "Câu 18: <br>";
    function CountAppearance($array, $number)
    {
        $count=0;
        for($i = 0; $i < count($array); $i++)
        {
            if($array[$i]==$number)
            {;
            $count++;
            }
        }
        return $count;
    }

    $array =[4,6,8,4,4,8,2,4];
    echo "Mảng ban đầu: ";
    print_r($array);
    echo "<br>";
    $number=4;
    $result = CountAppearance($array,$number);
    echo "Số lần xuất hiện của số $number là: " .$result ."<br>";
    echo "<br>";
?>


<!-- 19. Viết chương trình PHP để sắp xếp một mảng theo thứ tự giảm dần. -->
<?php 
echo "Câu 19: <br>";
     function SapXepGiamDan($array)
    {
        //Hàm sắp xếp tăng dần
        rsort($array);
        //Trả kết quả
        foreach ($array as $value)
        {
        echo "$value <br>";
        }
    }
    $arr = [4,7,2,9,5,1,3];
    echo "Mảng: <br>";
    foreach ($arr as $number)
    {
        echo "$number <br>";
    }
    echo "Kết quả sắp xếp theo thứ tự giảm dần: <br> " ;
    $result = SapXepGiamDan($arr);
    echo "<br>";
?>

<!-- 20. Viết chương trình PHP để thêm một phần tử vào đầu hoặc cuối của một mảng. -->
<?php
echo "Câu 20: <br>";
function AddToBeginning($array, $element)
{
    array_unshift($array, $element);
    return $array;
}

function AddToEnding($array, $element)
{
    $array[] = $element;
    return $array;
}

$array = array(1, 2, 3, 4, 5);
echo "Mảng ban đầu: ";
print_r($array);
echo "<br>";

$element = 0;


$result1 = addToBeginning($array, $element);

$result2 = addToEnding($array, $element);

echo "Mảng sau khi thêm $element vào đầu là: ";
print_r($result1);
echo "<br>";

echo "Mảng sau khi thêm $element vào cuối là: ";
print_r($result2);
echo "<br>";
echo "<br>";
?>

<!-- 21. Viết chương trình PHP để tìm số lớn thứ hai trong một mảng. -->
<?php
echo "Câu 21: <br>";
function FindingSecondLargest($array)
{
    $max = $array[0];
    $secondmax = null;

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] > $max) {
            $secondmax = $max;
            $max = $array[$i];
        } elseif ($array[$i] < $max && $array[$i] > $secondmax) {
            $secondmax = $array[$i];
        }
    }

    return $secondmax;
}

$array = [4, 7, 8, 4, 6, 9, 10, 22];
echo "Mảng: <br>";
    foreach ($array as $number)
    {
        echo "$number <br>";
    }
$result = FindingSecondLargest($array);

echo "Số lớn thứ 2 trong mảng là: " . $result ."<br>";
echo "<br>";
?>

<!-- 22. Viết chương trình PHP để tìm ước số chung lớn nhất và bội số chung nhỏ nhất của hai số nguyên dương. -->
<?php
echo "Câu 22: <br>";
function FindingGCD($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function FindingLCM($a, $b)
{
    return ($a * $b) / FindingGCD($a, $b);
}
$number1 = 48;
$number2 = 18;

$result1 = FindingGCD($number1, $number2);
echo "Ước số chung lớn nhất của $number1 và $number2 là: " . $result1 . "<br>";

$result2 = FindingLCM($number1, $number2);
echo "Bội số chung nhỏ nhất của $number1 và $number2 là: " . $result2 . "<br>";
echo "<br>";
?>

<!-- 23. Viết chương trình PHP để kiểm tra xem một số có phải là số hoàn hảo hay không. -->
<?php
echo "Câu 23: <br>";
function CheckingPerfectNumber($number)
{
    if ($number <= 0) {
        return false;
    }

    $sum = 0;

    for ($i = 1; $i <= $number/2; $i++) {
        if ($number % $i == 0) {
            $sum += $i;
        }
    }

    return $sum == $number;
}

// Số cần kiểm tra
$number = 28;

if (CheckingPerfectNumber($number)) {
    echo "$number là số hoàn hảo.<br>";
} else {
    echo "$number không phải là số hoàn hảo.<br>";
}
echo "<br>";
?>


<!-- 24. Viết chương trình PHP để tìm số lẻ lớn nhất trong một mảng. -->
<?php
echo "Câu 24: <br>";
    function MaxOddNumber($array)
    {
        $max = $array[0];
        for($i = 0; $i < count($array); $i++)
       {
        if ($array[$i]%2==1 && $array[$i]>$max)
        {
            $max =$array[$i];
        }
       }
       return $max;
    }
   $array = [3,5,6,2,9,11,14,16];
   echo "Mảng ban đầu: ";
   print_r($array);
   echo "<br>";
   $result = MaxOddNumber($array);
   echo "Số lẻ lớn nhất trong mảng là: ". $result ."<br>";
   echo "<br>";
?>


<!-- 25. Viết chương trình PHP để kiểm tra xem một số có phải là số nguyên tố hay không. -->
<?php
echo "Câu 25: <br>";
function CheckingPrimeNumber($n) 
{
    if ($n < 2) {
        echo "$n không phải số nguyên tố";
        return;
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) { 
            echo "$n không phải số nguyên tố";
            return;
        }
    }
    echo "$n là số nguyên tố";
}
$result = CheckingPrimeNumber(7);
echo "<br>";
echo "<br>";
?>

<!-- 26. Viết chương trình PHP để tìm số dương lớn nhất trong một mảng. -->
<?php
echo "Câu 26: <br>";
function FindingMaxPositiveNumber($arr)
{
    $maxpositive = null;

    foreach ($arr as $number) {
        if ($number > 0 && $number > $maxpositive) {
            $maxpositive = $number;
        }
    }

    return $maxpositive;
}

$array = array(3, -5, 7, 0, -2, 10, 4);
echo "Mảng ban đầu: ";
print_r($array);
echo "<br>";
$maxpositivenumber = FindingMaxPositiveNumber($array);

if ($maxpositivenumber !== null) {
    echo "Số dương lớn nhất trong mảng là: $maxpositivenumber <br>";
} else {
    echo "Không có số dương trong mảng. <br>";
}
echo "<br>";
?>

<!-- 27. Viết chương trình PHP để tìm số âm lớn nhất trong một mảng. -->
<?php
echo "Câu 27: <br>";
    function FindingMaxNegativeNumber($arr)
    {
    $maxnegative = null;

    foreach ($arr as $number) {
        if ($number < 0 && $number > $maxnegative) {
            $maxnegative = $number;
        }
    }

    return $maxnegative;
    }

    $array = array(3, -5, 7, 0, -2, 10, 4);
    echo "Mảng ban đầu: ";
    print_r($array);
    echo "<br>";
    $result = FindingMaxNegativeNumber($array);

    if ($result !== null) 
    {
        echo "Số âm lớn nhất trong mảng là: " .$result ."<br>";
    } 
    else 
    {
    echo "Không có số âm trong mảng.<br>";
    }
    echo "<br>";
?>

<!-- 28. Viết chương trình PHP để tính tổng các số lẻ từ 1 đến n. -->
<?php
echo "Câu 28: <br>";
    function SumOddNumber($n)
    {
        $sum=0;
        for($i=1; $i<=$n; $i++)
        {
            if($i%2==1)
            {
                $sum+=$i;
            }
        }
        return $sum;
    }
    $n=15;
    $result = SumOddNumber($n);
    echo "Tổng các số lẻ từ 1 đến $n là: " .$result ."<br>";
    echo "<br>";
?>

<!-- 29. Viết chương trình PHP để tìm số chính phương trong một khoảng cho trước. -->
<?php
echo "Câu 29: <br>";
function CheckingPerfectSquare($number)
{
    $sqrt = sqrt($number);
    return ((int)$sqrt *(int)$sqrt == $number );
}

function FindingPerfectSquare($start, $end)
{
    $perfectsquare = array();

    for ($i = $start; $i <= $end; $i++) {
        if (CheckingPerfectSquare($i)) {
            $perfectsquare[] = $i;
        }
    }

    return $perfectsquare;
}

// Khoảng cần kiểm tra
$start = 1;
$end = 100;

$result = FindingPerfectSquare($start, $end);

echo "Các số chính phương trong khoảng từ $start đến $end là: <br> ";
foreach ($result as $value) 
{
    echo $value . " " . "<br>";
}
echo "<br>";
?>

<!-- 30. Viết chương trình PHP để kiểm tra xem một chuỗi có phải là chuỗi con của một chuỗi khác hay không. -->
<?php
echo "Câu 30: <br>";
function CheckingContainWWord($substring, $mainstring)
{
    if (strpos($substring,$mainstring) !== false) {
        echo "Chuỗi $mainstring chứa chuỗi con $substring.";
    } else {
        echo "Chuỗi $mainstring không chứa chuỗi con $substring.";
    }
}

$substring = "Hell";
$mainstring = "Hello World";
$result = CheckingContainWWord($substring, $mainstring);
echo "$result <br>";
?>