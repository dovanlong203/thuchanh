<!-- Phần 1. Trắc nghiệm
Câu 1:
- Kết quả: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 [6] => 9 )
Câu 2: a
Câu 3: a
Câu 4: a
Câu 5: b -->

<!-- Phần 2: Tự luận -->
<!-- Câu 1 -->
<?php
echo "Câu 1: <br>";
        function generateFibonacci($n)
        {
            if($n<0)
            {
                echo "Không thỏa mãn điều kiện!";
                return;
            }
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
        $result = generateFibonacci($n);
        echo "$n số fibonacci đầu tiên là: ";
        print_r($result);
        echo "<br>";
        echo "<br>";
?>

<?php
echo "Câu 2: <br>";
$students = array(
    array(
        "id" => "18D1",
        "name" => "Nguyễn Văn A",
        "age" => 18,
        "grade" => 9
    ),
    array(
        "id" => "18D2",
        "name" => "Lương Thị B",
        "age" => 18,
        "grade" => 5
    ),
    array(
        "id" => "18D3",
        "name" => "Đỗ Văn C",
        "age" => 18,
        "grade" => 10
    ),
    array(
        "id" => "18D4",
        "name" => "Lưu Thị D",
        "age" => 18,
        "grade" => 8
    )
);

echo "Thông tin học sinh trong lớp: <br> ";
foreach ($students as $value) {
    echo "ID: " . $value["id"] . "<br>";
    echo "Name: " . $value["name"] . "<br>";
    echo "Age: " . $value["age"] . "<br>";
    echo "Grade: " .$value["grade"] ."<br>";
    echo "....................... <br>";
}

function FindingMaxGrade($students)
{
    $maxGrade = 0;
    $maxGradeStudent = null;
    foreach($students as $value)
    {
        if($value["grade"]>$maxGrade)
        {
            $maxGrade = $value["grade"];
            $maxGradeStudent = $value;
        }
    }
    return $maxGradeStudent;
}

$maxGradeStudent = FindingMaxGrade($students);
echo "Học sinh có điểm cao nhất lớp là: <br>";
echo "ID: " . $maxGradeStudent["id"] . "<br>";
echo "Name: " .$maxGradeStudent ["name"] . "<br>";
echo "Age: " . $maxGradeStudent["age"] . "<br>";
echo "Grade: " .$maxGradeStudent["grade"] ."<br>";
echo "....................... <br>";
