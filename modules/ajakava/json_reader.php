<?php


// JSON в ассоциативный массив
$json = file_get_contents('https://playarena.space/api/v1/rent/screen?token=hePK3tRh8zkLkqbzJROOulvoMLGDTFTylB9UMnhWiro');
$jsonArr = json_decode($json, true);

// Функция для замены двух элементов массива местами
function array_swap(&$array, $swap_a, $swap_b)
{
    list($array[$swap_a], $array[$swap_b]) = array($array[$swap_b], $array[$swap_a]);
}

// Сортировка массива по времени по возрастанию...
$sortedTime = array();
for ($i = 0; $i < count($jsonArr); $i++) {
    array_push($sortedTime, $jsonArr[$i]['rent']['court']['view']['time_from']);
}
array_multisort($sortedTime, SORT_ASC);
for ($i = 0; $i < count($jsonArr); $i++) {
    for ($j = 0; $j < count($jsonArr); $j++) {
        if ($sortedTime[$i] == $jsonArr[$j]['rent']['court']['view']['time_from']) {
            array_swap($jsonArr, $i, $j);
        }
    }
}
// ...Конец сортировки

function lockers_convert($temp)
{
    if (count($temp) > 0) {
        for ($i = 0; $i < count($temp); $i++) {
            $temp[$i] = substr($temp[$i], 21);
            $temp[$i] = explode(" — ", $temp[$i]);
            $temp[$i][0] = trim($temp[$i][0]);
            //echo ($i + 1) . " " . count($temp) . "<br>";
            if ($temp[$i][1] == "Мужская") {
                if (($i + 1) != count($temp)) {
                    echo "R" . $temp[$i][0] . "-" . "Meeste,<br>";
                } else {
                    echo "R" . $temp[$i][0] . "-" . "Meeste";
                }
            } elseif ($temp[$i][1] == "Женская") {
                if (($i + 1) != count($temp)) {
                    echo "R" . $temp[$i][0] . "-" . "Naiste,<br>";
                } else {
                    echo "R" . $temp[$i][0] . "-" . "Naiste";
                }
            }
        }
    } else {
        echo "—";
    }
}

function court_convert($court)
{
    $court = explode(" ", $court);
    echo "Väljak " . $court[2];
}

// for ($i = 0; $i < count($jsonArr); $i++) {
//     echo "<tr>";
//     echo "<th> " . $jsonArr[$i]['rent']['court']['view']['time_from'] . " - " . $jsonArr[$i]['rent']['court']['view']['time_to'] . "</th>";
//     echo "<th> " . $jsonArr[$i]['title'] . "</th>";
//     echo "<th class=\"text-center\"> " . lockers_convert($jsonArr[$i]['rent']['lockers']['view']['title']) . " </th>";
//     echo "<th class=\"text-center\"></th>";
//     echo "</tr>";
// }


//array_swap($jsonArr, 0, 1);
// echo "<br>";
// for ($i = 0; $i < count($jsonArr); $i++) {
//     echo $jsonArr[$i]['title'] . " " . $jsonArr[$i]['rent']['court']['view']['time_from'] . " " . $i . "<br>";
// }

// function locker_convert($jsonArr, $iterator)
// {
//     echo count($jsonArr[$iterator]['rent']['lockers']['view']['title']);
// }

//$sortedTime = sort_time($jsonArr);
//$repeatingTime = array();

// for ($i = 0; $i < count($jsonArr); $i++) {
//     for ($j = 0; $j < count($jsonArr); $j++) {
//         $time = $jsonArr[$j]['rent']['court']['view']['time_from'];
//         $title = $jsonArr[$j]['title'];
//         // while (count($jsonArr) < count($jsonArr) - 1) {
//         //     if ($sortedTime[$i] == $sortedTime[$i + 1]) {
//         //         array_push($repeatingTime, $i);
//         //     }
//         // }
//         if ($sortedTime[$i] == $time) {
//             echo "<tr>";
//             echo "<th>" . $time . "</th><br>";
//             echo "<th>" . $title . "</th><br>";
//             echo "<th class=\"text-center\">" . locker_convert($jsonArr, $j) . "</th><br>";
//             //echo "<th class=\"text-center\">Väljak 1.2</th><br>";
//             echo "</tr>";
//             break;
//         }
//     }
//     echo "<br>";
// }
