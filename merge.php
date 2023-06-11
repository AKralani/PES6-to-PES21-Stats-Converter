<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define the path where the merged CSV file will be saved
    $mergedFilePath = 'players.csv';
    $mergedFile = fopen($mergedFilePath, 'w');

    // Static line to be added at the beginning of the merged CSV file
    $staticLine = "Id;Name;JapName;Shirt;ShirtNational;Commentary;Country;Country2;Height;Weight;Age;Foot;PlayingStyle;POS;GK;CB;LB;RB;DMF;CMF;LMF;RMF;AMF;LWF;RWF;SS;CF;OffensiveAwareness;BallControl;Dribbling;TightPossession;LowPass;LoftedPass;Finishing;Heading;PlaceKicking;Curl;Speed;Acceleration;KickingPower;Jump;PhysicalContact;Balance;Stamina;DefensiveAwareness;BallWinning;Aggression;GKAwareness;GKCatching;GKClearing;GKReflexes;GKReach;WeakFootUsage;WeakFootAcc;Form;InjuryResistance;Reputation;PlayingAttitude;Trickster;MazingRun;SpeedingBullet;IncisiveRun;LongBallExpert;EarlyCross;LongRanger;ScissorsFeint;DoubleTouch;FlipFlap;MarseilleTurn;Sombrero;CrossOverTurn;CutBehindAndTurn;ScotchMove;StepOnSkillcontrol;HeadingSpecial;LongRangeDrive;Chipshotcontrol;LongRangeShot;KnuckleShot;DippingShots;RisingShots;AcrobaticFinishing;HeelTrick;FirstTimeShot;OneTouchPass;ThroughPassing;WeightedPass;PinpointCrossing;OutsideCurler;Rabona;NoLookPass;LowLoftedPass;GKLowPunt;GKHighPunt;LongThrow;GKLongThrow;PenaltySpecialist;GKPenaltySaver;Gamesmanship;ManMarking;TrackBack;Interception;AcrobaticClear;Captaincy;SuperSub;FightingSpirit;Celebration1;Celebration2;DribblingHunching;DribblingArmMove.;RunningHunching;RunningArmMovement;CornerKicks;FreeKicks;PenaltyKick;DribbleMotion;YouthClub;OwnerClub;ContractUntil;LoanUntil;MarketValue;NationalCaps;Legend;Hand;WinnerGoldenBall;EditName;EditBasics;EditPosition;EditPositions;EditAbilities;EditPlayerSkills;EditPlayingStyle;EditCOMPlayingStyles;EditMovements;Edit1;Edit2;Edit3;Edit4;Edit5;Edit6;Edit7;Value1;Value2;Value3;Value2020_1;Value2020_2;Appearance;ListBoots;ListGloves;InEditFile;OverallStats" . PHP_EOL;

    // Write the static line to the merged CSV file
    fwrite($mergedFile, $staticLine);

    // Loop through each uploaded file
    foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
        if (!empty($tmpName)) {
            // Open the uploaded CSV file
            $csvFile = fopen($tmpName, 'r');

            // Read the content of the CSV file
            $content = fread($csvFile, filesize($tmpName));

            // Write the content to the merged CSV file
            fwrite($mergedFile, $content);

            // Close the uploaded CSV file
            fclose($csvFile);
        }
    }

    // Close the merged CSV file
    fclose($mergedFile);

    echo 'CSV files merged successfully!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSV File Merger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: block;
            margin: 0 auto;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CSV File Merger</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="files[]" multiple accept=".csv">
            <input type="submit" value="Merge CSV Files">
        </form>
    </div>
</body>
</html>