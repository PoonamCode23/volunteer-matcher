<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Values for different interactions ratings
    $values = [
        "bad" => 0,
        "decent" => 5,
        "good" => 10
    ];
    
    $kidsValue = isset($_POST['kidsInteraction']) ? $_POST['kidsInteraction'] : '';
    $elderlyValue = isset($_POST['elderlyInteraction']) ? $_POST['elderlyInteraction'] : '';
    $kidsSum = isset($values[$kidsValue]) ? $values[$kidsValue] : 0;
    $elderlySum = isset($values[$elderlyValue]) ? $values[$elderlyValue] : 0;

    $selectedInterest = isset($_POST['interests']) ? $_POST['interests'] : '';
    $womenEmpowerment = 0;
    $illiteracy = 0;
    $medicalCrisis = 0;
    $childWelfare = 0;

    // Check the selected interest and assign points accordingly
    if ($selectedInterest == 'Women\'s Empowerment') {
        $womenEmpowerment = 30;
    } elseif ($selectedInterest == 'Illiteracy') {
        $illiteracy = 30;
    } elseif ($selectedInterest == 'Medical Crisis') {
        $medicalCrisis = 30;
    } elseif ($selectedInterest == 'Child Welfare') {
        $childWelfare = 30;
    }

    echo "Women's Empowerment: $womenEmpowerment<br>";
    echo "Illiteracy: $illiteracy<br>";
    echo "Medical Crisis: $medicalCrisis<br>";
    echo "Child Welfare: $childWelfare<br> <br>";
    echo "The value for Kids Sum is: " . $kidsSum . "<br>";
    echo "The value for Elderly Sum is: " . $elderlySum . "<br>";
}



// for calculating skills ratings
$teaching = $_POST['teaching'];
$patience = $_POST['patience'];
$socialSkills = $_POST['socialSkills'];
$nepaliProficiency = $_POST['nepaliProficiency'];
$englishProficiency = $_POST['englishProficiency'];
$creativity = $_POST['creativity'];
$teamCoordination = $_POST['teamCoordination'];
$fundraising = $_POST['fundraising'];

$tewaScore = [
    'Teaching' => $teaching * (8 / 5),
    'Social Skills' => $socialSkills * (8 / 5),
    'Nepali Proficiency' => $nepaliProficiency * (8 / 5),
    'English Proficiency' => $englishProficiency * (5 / 5),
    'Creativity' => $creativity * (8 / 5),
    'Team Coordination' => $teamCoordination * (8 / 5),
    'Fundraising' => $fundraising * (5 / 5),
];

$amaDablamScore = [
    'Teaching' => $teaching * (15 / 5),
    'Patience' => $patience * (5 / 5),
    'Social Skills' => $socialSkills * (10 / 5),
    'Nepali Proficiency' => $nepaliProficiency * (10 / 5),
    'English Proficiency' => $englishProficiency * (5 / 5),
    'Team Coordination' => $teamCoordination * (5 / 5),
];

$orphanageScore = [
    'Teaching' => $teaching * (9 / 5),
    'Patience' => $patience * (9 / 5),
    'Social Skills' => $socialSkills * (9 / 5),
    'Nepali Proficiency' => $nepaliProficiency * (9 / 5),
    'Creativity' => $creativity * (9 / 5),
    'Fundraising' => $fundraising * (5 / 5)
];

$oldagehomeScore = [
    'Patience' => $patience * (12.5 / 5),
    'Social Skills' => $socialSkills * (12.5 / 5),
    'Nepali Proficiency' => $nepaliProficiency * (12.5 / 5),
    'Creativity' => $creativity * (12.5 / 5),
];


// for calculating total scores for each organization 
$totalScoreTewa = array_sum($tewaScore);
$totalScoreAmaDablam = array_sum($amaDablamScore);
$totalScoreOrphanage = array_sum($orphanageScore);
$totalScoreOldAgeHome = array_sum($oldagehomeScore);

echo "<h2>Score for Tewa</h2>";
foreach ($tewaScore as $skill => $score) {
    echo "$skill: $score<br>";
}
echo "<b>Total sum of Tewa Score: $totalScoreTewa </b>";

echo "<h2>Score for Ama Dablam</h2>";
foreach ($amaDablamScore as $skill => $score) {
    echo "$skill: $score<br>";
}
echo "<b>Total sum of Ama Dablam: $totalScoreAmaDablam</b>";

echo "<h2>Score for Orphanage</h2>";
foreach ($orphanageScore as $skill => $score) {
    echo "$skill: $score<br>";
}
echo "<b>Total sum of Orphanage: $totalScoreOrphanage </b>";

echo "<h2>Score for Old Age Home</h2>";
foreach ($oldagehomeScore as $skill => $score) {
    echo "$skill: $score<br>";
}

echo "<b>Total sum of Old Age Home: $totalScoreOldAgeHome</b> <br> <br>";



//for calculating organizational rankings
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rankings"]) && !empty($_POST["rankings"])) {
    $rankings = json_decode($_POST["rankings"], true);

    if (is_array($rankings) && count($rankings) > 0) {
        usort($rankings, function ($a, $b) {
            return $b['points'] - $a['points'];
        });

        foreach ($rankings as $index => $rank) {
            echo "Rank " . ($index + 1) . ": " . $rank['organization'] . " - " . $rank['points'] . " points <br><br>";
        }
    } 
}
$totalScoreTewa = array_sum([$totalScoreTewa,$kidsSum,$elderlySum,$womenEmpowerment]);
$totalScoreAmaDablam = array_sum([$totalScoreAmaDablam, $kidsSum , $illiteracy]);
$totalScoreOrphanage = array_sum([$totalScoreOrphanage, $kidsSum, $childWelfare]);
$totalScoreOldAgeHome = array_sum([$totalScoreOldAgeHome, $elderlySum, $medicalCrisis]);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rankings"]) && !empty($_POST["rankings"])) {
    $rankings = json_decode($_POST["rankings"], true);

    if (is_array($rankings) && count($rankings) > 0) {
        // Sort rankings array based on points in descending order
        usort($rankings, function ($a, $b) {
            return $b['points'] - $a['points'];
        });

        foreach ($rankings as $index => $rank) {
            switch ($rank['organization']) {
                case 'Tewa':
                    $totalScoreTewa += $rank['points'];
                    break;
                case 'Aloki':
                    $totalScoreOldAgeHome += $rank['points'];
                    break;
                case 'AmaDablam':
                    $totalScoreAmaDablam += $rank['points'];
                    break;
                case 'Navakiran':
                    $totalScoreOrphanage += $rank['points'];
                    break;
            }
        }
        // Display the total rankings for each organization
        echo "Total Tewa Points: " . $totalScoreTewa . "<br>";
        echo "Total Aloki Points: " . $totalScoreOldAgeHome . "<br>";
        echo "Total AmaDablam Points: " . $totalScoreAmaDablam . "<br>";
        echo "Total Navakiran Points: " . $totalScoreOrphanage . "<br>";
    } else {
        echo "Rankings array is empty or invalid.";
    }
} else {
    echo "No rankings submitted or rankings are empty.";
}
$highestScore = max($totalScoreTewa, $totalScoreAmaDablam, $totalScoreOrphanage, $totalScoreOldAgeHome);

if ($highestScore == $totalScoreTewa) {
    $selectedOrganization = 'Tewa';
} elseif ($highestScore == $totalScoreAmaDablam) {
    $selectedOrganization = 'Ama Dablam';
} elseif ($highestScore == $totalScoreOrphanage) {
    $selectedOrganization = 'Navikaran Children Home';
} elseif ($highestScore == $totalScoreOldAgeHome) {
    $selectedOrganization = 'Aloki Care Home';
} else {
    $selectedOrganization = 'No organization found';
}

echo"Selected " .$selectedOrganization;
$_SESSION['selectedOrganization'] = $selectedOrganization;

include("database.php");

$highestScore = max($totalScoreTewa, $totalScoreAmaDablam, $totalScoreOrphanage, $totalScoreOldAgeHome);

if ($highestScore == $totalScoreTewa) {
    $selectedOrganization = 'Tewa';
    header('Location: tewa.php');
    exit();
} elseif ($highestScore == $totalScoreAmaDablam) {
    $selectedOrganization = 'Ama Dablam';
    header('Location: ama.php');
    exit();
} elseif ($highestScore == $totalScoreOrphanage) {
    $selectedOrganization = 'Orphanage';
    header('Location: navikaran.php');
    exit();
} elseif ($highestScore == $totalScoreOldAgeHome) {
    $selectedOrganization = 'Old Age Home';
    header('Location: aloki.php');
    exit();
} else {
    $selectedOrganization = 'No organization found';
    header('Location: index.php');
    exit();
}

