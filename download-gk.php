<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
// Database connection details
$host = 'localhost';
$dbName = 'pesconvert';
$user = 'root';
$password = '';

// Retrieve data from the database
try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the columns to retrieve and their order
    $columns = [
        ['table' => 'pes2021', 'columns' => ['Id', 'Name', 'JapName', 'Shirt', 'ShirtNational', 'Commentary', 'Country', 'Country2', 'Height', 'Weight', 'Age', 'Foot', 'PlayingStyle', 'POS', 'GK', 'CB', 'LB', 'RB', 'DMF', 'CMF', 'LMF', 'RMF', 'AMF', 'LWF', 'RWF', 'SS', 'CF', 'OffensiveAwareness', 'BallControl', 'Dribbling', 'TightPossession', 'LowPass', 'LoftedPass', 'Finishing', 'Heading', 'PlaceKicking', 'Curl', 'Speed', 'Acceleration', 'KickingPower', 'Jump', 'PhysicalContact', 'Balance', 'Stamina', 'DefensiveAwareness', 'BallWinning', 'Aggression']],
        ['table' => 'pes6', 'columns' => ['GOAL_KEEPING']],
        ['table' => 'pes2021', 'columns' => ['GKCatching', 'GKClearing']],
        ['table' => 'pes6', 'columns' => ['RESPONSE', 'DEFENSE']],
        ['table' => 'pes2021', 'columns' => ['WeakFootUsage', 'WeakFootAcc', 'Form', 'InjuryResistance', 'Reputation', 'PlayingAttitude', 'Trickster', 'MazingRun', 'SpeedingBullet', 'IncisiveRun', 'LongBallExpert', 'EarlyCross', 'LongRanger', 'ScissorsFeint', 'DoubleTouch', 'FlipFlap', 'MarseilleTurn', 'Sombrero', 'CrossOverTurn', 'CutBehindAndTurn', 'ScotchMove', 'StepOnSkillcontrol', 'HeadingSpecial', 'LongRangeDrive', 'Chipshotcontrol', 'LongRangeShot', 'KnuckleShot', 'DippingShots', 'RisingShots', 'AcrobaticFinishing', 'HeelTrick', 'FirstTimeShot', 'OneTouchPass', 'ThroughPassing', 'WeightedPass', 'PinpointCrossing', 'OutsideCurler', 'Rabona', 'NoLookPass', 'LowLoftedPass', 'GKLowPunt', 'GKHighPunt', 'LongThrow', 'GKLongThrow', 'PenaltySpecialist', 'GKPenaltySaver', 'Gamesmanship', 'ManMarking', 'TrackBack', 'Interception', 'AcrobaticClear', 'Captaincy', 'SuperSub', 'FightingSpirit', 'Celebration1', 'Celebration2', 'DribblingHunching', 'DribblingArmMove', 'RunningHunching', 'RunningArmMovement', 'CornerKicks', 'FreeKicks', 'PenaltyKick', 'DribbleMotion', 'YouthClub', 'OwnerClub', 'ContractUntil', 'LoanUntil', 'MarketValue', 'NationalCaps', 'Legend', 'Hand', 'WinnerGoldenBall', 'EditName', 'EditBasics', 'EditPosition', 'EditPositions', 'EditAbilities', 'EditPlayerSkills', 'EditPlayingStyle', 'EditCOMPlayingStyles', 'EditMovements', 'Edit1', 'Edit2', 'Edit3', 'Edit4', 'Edit5', 'Edit6', 'Edit7', 'Value1', 'Value2', 'Value3', 'Value2020_1', 'Value2020_2', 'Appearance', 'ListBoots', 'ListGloves', 'InEditFile', 'OverallStats']]
    ];

    // Generate CSV content
    $csvData = '';

    foreach ($columns as $columnSet) {
        $table = $columnSet['table'];
        $tableColumns = $columnSet['columns'];

        $columnsString = implode(',', $tableColumns);
        $query = "SELECT $columnsString FROM $table LIMIT 1";
        $statement = $pdo->query($query);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if the table is "pes6"
        if ($table === 'pes6') {
            // Check if the "GOAL_KEEPING" column exists and is lesser than 40
            if (isset($row['GOAL_KEEPING']) && $row['GOAL_KEEPING'] < 40) {
                // Modify the value to x in the fetched row
                $row['GOAL_KEEPING'] = 40;
            // Check if the "GOAL_KEEPING" column exists and is equal to x
            } else if (isset($row['GOAL_KEEPING']) && $row['GOAL_KEEPING'] === 81 || $row['GOAL_KEEPING'] === 82 || $row['GOAL_KEEPING'] === 83 || $row['GOAL_KEEPING'] === 84 || $row['GOAL_KEEPING'] === 85) {
                // Modify the value to x in the fetched row
                $row['GOAL_KEEPING'] = $row['GOAL_KEEPING'] - 1;
            } else if (isset($row['GOAL_KEEPING']) && $row['GOAL_KEEPING'] === 86 || $row['GOAL_KEEPING'] === 87 || $row['GOAL_KEEPING'] === 88 || $row['GOAL_KEEPING'] === 89 || $row['GOAL_KEEPING'] === 90) {
                // Modify the value to x in the fetched row
                $row['GOAL_KEEPING'] = $row['GOAL_KEEPING'] - 2;
            } else if (isset($row['GOAL_KEEPING']) && $row['GOAL_KEEPING'] === 91 || $row['GOAL_KEEPING'] === 92 || $row['GOAL_KEEPING'] === 93 || $row['GOAL_KEEPING'] === 94 || $row['GOAL_KEEPING'] === 95) {
                // Modify the value to x in the fetched row
                $row['GOAL_KEEPING'] = $row['GOAL_KEEPING'] - 3;
            } else if (isset($row['GOAL_KEEPING']) && $row['GOAL_KEEPING'] === 96 || $row['GOAL_KEEPING'] === 97 || $row['GOAL_KEEPING'] === 98 || $row['GOAL_KEEPING'] === 99) {
                // Modify the value to x in the fetched row
                $row['GOAL_KEEPING'] = $row['GOAL_KEEPING'] - 4;
            }

            // Check if the "RESPONSE" column exists and is lesser than 40
            if (isset($row['RESPONSE']) && $row['RESPONSE'] < 40) {
                // Modify the value to x in the fetched row
                $row['RESPONSE'] = 40;
            // Check if the "RESPONSE" column exists and is equal to x
            } else if (isset($row['RESPONSE']) && $row['RESPONSE'] === 81 || $row['RESPONSE'] === 82 || $row['RESPONSE'] === 83 || $row['RESPONSE'] === 84 || $row['RESPONSE'] === 85) {
                // Modify the value to x in the fetched row
                $row['RESPONSE'] = $row['RESPONSE'] - 1;
            } else if (isset($row['RESPONSE']) && $row['RESPONSE'] === 86 || $row['RESPONSE'] === 87 || $row['RESPONSE'] === 88 || $row['RESPONSE'] === 89 || $row['RESPONSE'] === 90) {
                // Modify the value to x in the fetched row
                $row['RESPONSE'] = $row['RESPONSE'] - 2;
            } else if (isset($row['RESPONSE']) && $row['RESPONSE'] === 91 || $row['RESPONSE'] === 92 || $row['RESPONSE'] === 93 || $row['RESPONSE'] === 94 || $row['RESPONSE'] === 95) {
                // Modify the value to x in the fetched row
                $row['RESPONSE'] = $row['RESPONSE'] - 3;
            } else if (isset($row['RESPONSE']) && $row['RESPONSE'] === 96 || $row['RESPONSE'] === 97 || $row['RESPONSE'] === 98 || $row['RESPONSE'] === 99) {
                // Modify the value to x in the fetched row
                $row['RESPONSE'] = $row['RESPONSE'] - 4;
            }

            // Check if the "DEFENSE" column exists and is lesser than 40
            if (isset($row['DEFENSE']) && $row['DEFENSE'] < 40) {
                // Modify the value to x in the fetched row
                $row['DEFENSE'] = 40;
            // Check if the "DEFENSE" column exists and is equal to x
            } else if (isset($row['DEFENSE']) && $row['DEFENSE'] === 81 || $row['DEFENSE'] === 82 || $row['DEFENSE'] === 83 || $row['DEFENSE'] === 84 || $row['DEFENSE'] === 85) {
                // Modify the value to x in the fetched row
                $row['DEFENSE'] = $row['DEFENSE'] - 1;
            } else if (isset($row['DEFENSE']) && $row['DEFENSE'] === 86 || $row['DEFENSE'] === 87 || $row['DEFENSE'] === 88 || $row['DEFENSE'] === 89 || $row['DEFENSE'] === 90) {
                // Modify the value to x in the fetched row
                $row['DEFENSE'] = $row['DEFENSE'] - 2;
            } else if (isset($row['DEFENSE']) && $row['DEFENSE'] === 91 || $row['DEFENSE'] === 92 || $row['DEFENSE'] === 93 || $row['DEFENSE'] === 94 || $row['DEFENSE'] === 95) {
                // Modify the value to x in the fetched row
                $row['DEFENSE'] = $row['DEFENSE'] - 3;
            } else if (isset($row['DEFENSE']) && $row['DEFENSE'] === 96 || $row['DEFENSE'] === 97 || $row['DEFENSE'] === 98 || $row['DEFENSE'] === 99) {
                // Modify the value to x in the fetched row
                $row['DEFENSE'] = $row['DEFENSE'] - 4;
            }
        }

        // Append the columns from the current table to the CSV data
        foreach ($tableColumns as $column) {
            $csvData .= $row[$column] . ";";
        }
    }

    // Remove the trailing comma and add a line break
    $csvData = rtrim($csvData, ';') . "\n";

    // Set headers for file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="player stats converted.csv"');

    // Output the CSV file
    echo $csvData;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}