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
        ['table' => 'pes2021', 'columns' => ['Id', 'Name', 'JapName', 'Shirt', 'ShirtNational', 'Commentary', 'Country', 'Country2', 'Height', 'Weight', 'Age', 'Foot', 'PlayingStyle', 'POS', 'GK', 'CB', 'LB', 'RB', 'DMF', 'CMF', 'LMF', 'RMF', 'AMF', 'LWF', 'RWF', 'SS', 'CF']],
        ['table' => 'pes6', 'columns' => ['ATTACK', 'TECHNIQUE', 'DRIBBLE_ACCURACY', 'AGILITY', 'SHORT_PASS_ACCURACY', 'LONG_PASS_ACCURACY', 'SHOT_ACCURACY', 'HEADING', 'FREE_KICK_ACCURACY', 'SWERVE', 'TOP_SPEED', 'ACCELERATION', 'SHOT_POWER', 'JUMP']],
        ['table' => 'pes2021', 'columns' => ['PhysicalContact', 'Balance']],
        ['table' => 'pes6', 'columns' => ['STAMINA', 'DEFENSE']],
        ['table' => 'pes2021', 'columns' => ['BallWinning', 'Aggression', 'GKAwareness', 'GKCatching', 'GKClearing', 'GKReflexes', 'GKReach', 'WeakFootUsage', 'WeakFootAcc', 'Form', 'InjuryResistance', 'Reputation', 'PlayingAttitude', 'Trickster', 'MazingRun', 'SpeedingBullet', 'IncisiveRun', 'LongBallExpert', 'EarlyCross', 'LongRanger', 'ScissorsFeint', 'DoubleTouch', 'FlipFlap', 'MarseilleTurn', 'Sombrero', 'CrossOverTurn', 'CutBehindAndTurn', 'ScotchMove', 'StepOnSkillcontrol', 'HeadingSpecial', 'LongRangeDrive', 'Chipshotcontrol', 'LongRangeShot', 'KnuckleShot', 'DippingShots', 'RisingShots', 'AcrobaticFinishing', 'HeelTrick', 'FirstTimeShot', 'OneTouchPass', 'ThroughPassing', 'WeightedPass', 'PinpointCrossing', 'OutsideCurler', 'Rabona', 'NoLookPass', 'LowLoftedPass', 'GKLowPunt', 'GKHighPunt', 'LongThrow', 'GKLongThrow', 'PenaltySpecialist', 'GKPenaltySaver', 'Gamesmanship', 'ManMarking', 'TrackBack', 'Interception', 'AcrobaticClear', 'Captaincy', 'SuperSub', 'FightingSpirit', 'Celebration1', 'Celebration2', 'DribblingHunching', 'DribblingArmMove', 'RunningHunching', 'RunningArmMovement', 'CornerKicks', 'FreeKicks', 'PenaltyKick', 'DribbleMotion', 'YouthClub', 'OwnerClub', 'ContractUntil', 'LoanUntil', 'MarketValue', 'NationalCaps', 'Legend', 'Hand', 'WinnerGoldenBall', 'EditName', 'EditBasics', 'EditPosition', 'EditPositions', 'EditAbilities', 'EditPlayerSkills', 'EditPlayingStyle', 'EditCOMPlayingStyles', 'EditMovements', 'Edit1', 'Edit2', 'Edit3', 'Edit4', 'Edit5', 'Edit6', 'Edit7', 'Value1', 'Value2', 'Value3', 'Value2020_1', 'Value2020_2', 'Appearance', 'ListBoots', 'ListGloves', 'InEditFile', 'OverallStats']]
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
            // Check if the "ATTACK" column exists and is lesser than 40
            if (isset($row['ATTACK']) && $row['ATTACK'] < 40) {
                // Modify the value to x in the fetched row
                $row['ATTACK'] = 40;
            // Check if the "ATTACK" column exists and is equal to x
            } else if (isset($row['ATTACK']) && $row['ATTACK'] === 81 || $row['ATTACK'] === 82 || $row['ATTACK'] === 83 || $row['ATTACK'] === 84 || $row['ATTACK'] === 85) {
                // Modify the value to x in the fetched row
                $row['ATTACK'] = $row['ATTACK'] - 1;
            } else if (isset($row['ATTACK']) && $row['ATTACK'] === 86 || $row['ATTACK'] === 87 || $row['ATTACK'] === 88 || $row['ATTACK'] === 89 || $row['ATTACK'] === 90) {
                // Modify the value to x in the fetched row
                $row['ATTACK'] = $row['ATTACK'] - 2;
            } else if (isset($row['ATTACK']) && $row['ATTACK'] === 91 || $row['ATTACK'] === 92 || $row['ATTACK'] === 93 || $row['ATTACK'] === 94 || $row['ATTACK'] === 95) {
                // Modify the value to x in the fetched row
                $row['ATTACK'] = $row['ATTACK'] - 3;
            } else if (isset($row['ATTACK']) && $row['ATTACK'] === 96 || $row['ATTACK'] === 97 || $row['ATTACK'] === 98 || $row['ATTACK'] === 99) {
                // Modify the value to x in the fetched row
                $row['ATTACK'] = $row['ATTACK'] - 4;
            }

            // Check if the "TECHNIQUE" column exists and is lesser than 40
            if (isset($row['TECHNIQUE']) && $row['TECHNIQUE'] < 40) {
                // Modify the value to x in the fetched row
                $row['TECHNIQUE'] = 40;
            // Check if the "TECHNIQUE" column exists and is equal to x
            } else if (isset($row['TECHNIQUE']) && $row['TECHNIQUE'] === 81 || $row['TECHNIQUE'] === 82 || $row['TECHNIQUE'] === 83 || $row['TECHNIQUE'] === 84 || $row['TECHNIQUE'] === 85) {
                // Modify the value to x in the fetched row
                $row['TECHNIQUE'] = $row['TECHNIQUE'] - 1;
            } else if (isset($row['TECHNIQUE']) && $row['TECHNIQUE'] === 86 || $row['TECHNIQUE'] === 87 || $row['TECHNIQUE'] === 88 || $row['TECHNIQUE'] === 89 || $row['TECHNIQUE'] === 90) {
                // Modify the value to x in the fetched row
                $row['TECHNIQUE'] = $row['TECHNIQUE'] - 2;
            } else if (isset($row['TECHNIQUE']) && $row['TECHNIQUE'] === 91 || $row['TECHNIQUE'] === 92 || $row['TECHNIQUE'] === 93 || $row['TECHNIQUE'] === 94 || $row['TECHNIQUE'] === 95) {
                // Modify the value to x in the fetched row
                $row['TECHNIQUE'] = $row['TECHNIQUE'] - 3;
            } else if (isset($row['TECHNIQUE']) && $row['TECHNIQUE'] === 96 || $row['TECHNIQUE'] === 97 || $row['TECHNIQUE'] === 98 || $row['TECHNIQUE'] === 99) {
                // Modify the value to x in the fetched row
                $row['TECHNIQUE'] = $row['TECHNIQUE'] - 4;
            }

            // Check if the "DRIBBLE_ACCURACY" column exists and is lesser than 40
            if (isset($row['DRIBBLE_ACCURACY']) && $row['DRIBBLE_ACCURACY'] < 40) {
                // Modify the value to x in the fetched row
                $row['DRIBBLE_ACCURACY'] = 40;
            // Check if the "DRIBBLE_ACCURACY" column exists and is equal to x
            } else if (isset($row['DRIBBLE_ACCURACY']) && $row['DRIBBLE_ACCURACY'] === 81 || $row['DRIBBLE_ACCURACY'] === 82 || $row['DRIBBLE_ACCURACY'] === 83 || $row['DRIBBLE_ACCURACY'] === 84 || $row['DRIBBLE_ACCURACY'] === 85) {
                // Modify the value to x in the fetched row
                $row['DRIBBLE_ACCURACY'] = $row['DRIBBLE_ACCURACY'] - 1;
            } else if (isset($row['DRIBBLE_ACCURACY']) && $row['DRIBBLE_ACCURACY'] === 86 || $row['DRIBBLE_ACCURACY'] === 87 || $row['DRIBBLE_ACCURACY'] === 88 || $row['DRIBBLE_ACCURACY'] === 89 || $row['DRIBBLE_ACCURACY'] === 90) {
                // Modify the value to x in the fetched row
                $row['DRIBBLE_ACCURACY'] = $row['DRIBBLE_ACCURACY'] - 2;
            } else if (isset($row['DRIBBLE_ACCURACY']) && $row['DRIBBLE_ACCURACY'] === 91 || $row['DRIBBLE_ACCURACY'] === 92 || $row['DRIBBLE_ACCURACY'] === 93 || $row['DRIBBLE_ACCURACY'] === 94 || $row['DRIBBLE_ACCURACY'] === 95) {
                // Modify the value to x in the fetched row
                $row['DRIBBLE_ACCURACY'] = $row['DRIBBLE_ACCURACY'] - 3;
            } else if (isset($row['DRIBBLE_ACCURACY']) && $row['DRIBBLE_ACCURACY'] === 96 || $row['DRIBBLE_ACCURACY'] === 97 || $row['DRIBBLE_ACCURACY'] === 98 || $row['DRIBBLE_ACCURACY'] === 99) {
                // Modify the value to x in the fetched row
                $row['DRIBBLE_ACCURACY'] = $row['DRIBBLE_ACCURACY'] - 4;
            }

            // Check if the "AGILITY" column exists and is lesser than 40
            if (isset($row['AGILITY']) && $row['AGILITY'] < 40) {
                // Modify the value to x in the fetched row
                $row['AGILITY'] = 40;
            // Check if the "AGILITY" column exists and is equal to x
            } else if (isset($row['AGILITY']) && $row['AGILITY'] === 81 || $row['AGILITY'] === 82 || $row['AGILITY'] === 83 || $row['AGILITY'] === 84 || $row['AGILITY'] === 85) {
                // Modify the value to x in the fetched row
                $row['AGILITY'] = $row['AGILITY'] - 1;
            } else if (isset($row['AGILITY']) && $row['AGILITY'] === 86 || $row['AGILITY'] === 87 || $row['AGILITY'] === 88 || $row['AGILITY'] === 89 || $row['AGILITY'] === 90) {
                // Modify the value to x in the fetched row
                $row['AGILITY'] = $row['AGILITY'] - 2;
            } else if (isset($row['AGILITY']) && $row['AGILITY'] === 91 || $row['AGILITY'] === 92 || $row['AGILITY'] === 93 || $row['AGILITY'] === 94 || $row['AGILITY'] === 95) {
                // Modify the value to x in the fetched row
                $row['AGILITY'] = $row['AGILITY'] - 3;
            } else if (isset($row['AGILITY']) && $row['AGILITY'] === 96 || $row['AGILITY'] === 97 || $row['AGILITY'] === 98 || $row['AGILITY'] === 99) {
                // Modify the value to x in the fetched row
                $row['AGILITY'] = $row['AGILITY'] - 4;
            }

            // Check if the "SHORT_PASS_ACCURACY" column exists and is lesser than 40
            if (isset($row['SHORT_PASS_ACCURACY']) && $row['SHORT_PASS_ACCURACY'] < 40) {
                // Modify the value to x in the fetched row
                $row['SHORT_PASS_ACCURACY'] = 40;
            // Check if the "SHORT_PASS_ACCURACY" column exists and is equal to x
            } else if (isset($row['SHORT_PASS_ACCURACY']) && $row['SHORT_PASS_ACCURACY'] === 81 || $row['SHORT_PASS_ACCURACY'] === 82 || $row['SHORT_PASS_ACCURACY'] === 83 || $row['SHORT_PASS_ACCURACY'] === 84 || $row['SHORT_PASS_ACCURACY'] === 85) {
                // Modify the value to x in the fetched row
                $row['SHORT_PASS_ACCURACY'] = $row['SHORT_PASS_ACCURACY'] - 1;
            } else if (isset($row['SHORT_PASS_ACCURACY']) && $row['SHORT_PASS_ACCURACY'] === 86 || $row['SHORT_PASS_ACCURACY'] === 87 || $row['SHORT_PASS_ACCURACY'] === 88 || $row['SHORT_PASS_ACCURACY'] === 89 || $row['SHORT_PASS_ACCURACY'] === 90) {
                // Modify the value to x in the fetched row
                $row['SHORT_PASS_ACCURACY'] = $row['SHORT_PASS_ACCURACY'] - 2;
            } else if (isset($row['SHORT_PASS_ACCURACY']) && $row['SHORT_PASS_ACCURACY'] === 91 || $row['SHORT_PASS_ACCURACY'] === 92 || $row['SHORT_PASS_ACCURACY'] === 93 || $row['SHORT_PASS_ACCURACY'] === 94 || $row['SHORT_PASS_ACCURACY'] === 95) {
                // Modify the value to x in the fetched row
                $row['SHORT_PASS_ACCURACY'] = $row['SHORT_PASS_ACCURACY'] - 3;
            } else if (isset($row['SHORT_PASS_ACCURACY']) && $row['SHORT_PASS_ACCURACY'] === 96 || $row['SHORT_PASS_ACCURACY'] === 97 || $row['SHORT_PASS_ACCURACY'] === 98 || $row['SHORT_PASS_ACCURACY'] === 99) {
                // Modify the value to x in the fetched row
                $row['SHORT_PASS_ACCURACY'] = $row['SHORT_PASS_ACCURACY'] - 4;
            }

            // Check if the "LONG_PASS_ACCURACY" column exists and is lesser than 40
            if (isset($row['LONG_PASS_ACCURACY']) && $row['LONG_PASS_ACCURACY'] < 40) {
                // Modify the value to x in the fetched row
                $row['LONG_PASS_ACCURACY'] = 40;
            // Check if the "LONG_PASS_ACCURACY" column exists and is equal to x
            } else if (isset($row['LONG_PASS_ACCURACY']) && $row['LONG_PASS_ACCURACY'] === 81 || $row['LONG_PASS_ACCURACY'] === 82 || $row['LONG_PASS_ACCURACY'] === 83 || $row['LONG_PASS_ACCURACY'] === 84 || $row['LONG_PASS_ACCURACY'] === 85) {
                // Modify the value to x in the fetched row
                $row['LONG_PASS_ACCURACY'] = $row['LONG_PASS_ACCURACY'] - 1;
            } else if (isset($row['LONG_PASS_ACCURACY']) && $row['LONG_PASS_ACCURACY'] === 86 || $row['LONG_PASS_ACCURACY'] === 87 || $row['LONG_PASS_ACCURACY'] === 88 || $row['LONG_PASS_ACCURACY'] === 89 || $row['LONG_PASS_ACCURACY'] === 90) {
                // Modify the value to x in the fetched row
                $row['LONG_PASS_ACCURACY'] = $row['LONG_PASS_ACCURACY'] - 2;
            } else if (isset($row['LONG_PASS_ACCURACY']) && $row['LONG_PASS_ACCURACY'] === 91 || $row['LONG_PASS_ACCURACY'] === 92 || $row['LONG_PASS_ACCURACY'] === 93 || $row['LONG_PASS_ACCURACY'] === 94 || $row['LONG_PASS_ACCURACY'] === 95) {
                // Modify the value to x in the fetched row
                $row['LONG_PASS_ACCURACY'] = $row['LONG_PASS_ACCURACY'] - 3;
            } else if (isset($row['LONG_PASS_ACCURACY']) && $row['LONG_PASS_ACCURACY'] === 96 || $row['LONG_PASS_ACCURACY'] === 97 || $row['LONG_PASS_ACCURACY'] === 98 || $row['LONG_PASS_ACCURACY'] === 99) {
                // Modify the value to x in the fetched row
                $row['LONG_PASS_ACCURACY'] = $row['LONG_PASS_ACCURACY'] - 4;
            }

            // Check if the "SHOT_ACCURACY" column exists and is lesser than 40
            if (isset($row['SHOT_ACCURACY']) && $row['SHOT_ACCURACY'] < 40) {
                // Modify the value to x in the fetched row
                $row['SHOT_ACCURACY'] = 40;
            // Check if the "SHOT_ACCURACY" column exists and is equal to x
            } else if (isset($row['SHOT_ACCURACY']) && $row['SHOT_ACCURACY'] === 81 || $row['SHOT_ACCURACY'] === 82 || $row['SHOT_ACCURACY'] === 83 || $row['SHOT_ACCURACY'] === 84 || $row['SHOT_ACCURACY'] === 85) {
                // Modify the value to x in the fetched row
                $row['SHOT_ACCURACY'] = $row['SHOT_ACCURACY'] - 1;
            } else if (isset($row['SHOT_ACCURACY']) && $row['SHOT_ACCURACY'] === 86 || $row['SHOT_ACCURACY'] === 87 || $row['SHOT_ACCURACY'] === 88 || $row['SHOT_ACCURACY'] === 89 || $row['SHOT_ACCURACY'] === 90) {
                // Modify the value to x in the fetched row
                $row['SHOT_ACCURACY'] = $row['SHOT_ACCURACY'] - 2;
            } else if (isset($row['SHOT_ACCURACY']) && $row['SHOT_ACCURACY'] === 91 || $row['SHOT_ACCURACY'] === 92 || $row['SHOT_ACCURACY'] === 93 || $row['SHOT_ACCURACY'] === 94 || $row['SHOT_ACCURACY'] === 95) {
                // Modify the value to x in the fetched row
                $row['SHOT_ACCURACY'] = $row['SHOT_ACCURACY'] - 3;
            } else if (isset($row['SHOT_ACCURACY']) && $row['SHOT_ACCURACY'] === 96 || $row['SHOT_ACCURACY'] === 97 || $row['SHOT_ACCURACY'] === 98 || $row['SHOT_ACCURACY'] === 99) {
                // Modify the value to x in the fetched row
                $row['SHOT_ACCURACY'] = $row['SHOT_ACCURACY'] - 4;
            }

            // Check if the "HEADING" column exists and is lesser than 40
            if (isset($row['HEADING']) && $row['HEADING'] < 40) {
                // Modify the value to x in the fetched row
                $row['HEADING'] = 40;
            // Check if the "HEADING" column exists and is equal to x
            } else if (isset($row['HEADING']) && $row['HEADING'] === 81 || $row['HEADING'] === 82 || $row['HEADING'] === 83 || $row['HEADING'] === 84 || $row['HEADING'] === 85) {
                // Modify the value to x in the fetched row
                $row['HEADING'] = $row['HEADING'] - 1;
            } else if (isset($row['HEADING']) && $row['HEADING'] === 86 || $row['HEADING'] === 87 || $row['HEADING'] === 88 || $row['HEADING'] === 89 || $row['HEADING'] === 90) {
                // Modify the value to x in the fetched row
                $row['HEADING'] = $row['HEADING'] - 2;
            } else if (isset($row['HEADING']) && $row['HEADING'] === 91 || $row['HEADING'] === 92 || $row['HEADING'] === 93 || $row['HEADING'] === 94 || $row['HEADING'] === 95) {
                // Modify the value to x in the fetched row
                $row['HEADING'] = $row['HEADING'] - 3;
            } else if (isset($row['HEADING']) && $row['HEADING'] === 96 || $row['HEADING'] === 97 || $row['HEADING'] === 98 || $row['HEADING'] === 99) {
                // Modify the value to x in the fetched row
                $row['HEADING'] = $row['HEADING'] - 4;
            }

            // Check if the "FREE_KICK_ACCURACY" column exists and is lesser than 40
            if (isset($row['FREE_KICK_ACCURACY']) && $row['FREE_KICK_ACCURACY'] < 40) {
                // Modify the value to x in the fetched row
                $row['FREE_KICK_ACCURACY'] = 40;
            // Check if the "FREE_KICK_ACCURACY" column exists and is equal to x
            } else if (isset($row['FREE_KICK_ACCURACY']) && $row['FREE_KICK_ACCURACY'] === 81 || $row['FREE_KICK_ACCURACY'] === 82 || $row['FREE_KICK_ACCURACY'] === 83 || $row['FREE_KICK_ACCURACY'] === 84 || $row['FREE_KICK_ACCURACY'] === 85) {
                // Modify the value to x in the fetched row
                $row['FREE_KICK_ACCURACY'] = $row['FREE_KICK_ACCURACY'] - 1;
            } else if (isset($row['FREE_KICK_ACCURACY']) && $row['FREE_KICK_ACCURACY'] === 86 || $row['FREE_KICK_ACCURACY'] === 87 || $row['FREE_KICK_ACCURACY'] === 88 || $row['FREE_KICK_ACCURACY'] === 89 || $row['FREE_KICK_ACCURACY'] === 90) {
                // Modify the value to x in the fetched row
                $row['FREE_KICK_ACCURACY'] = $row['FREE_KICK_ACCURACY'] - 2;
            } else if (isset($row['FREE_KICK_ACCURACY']) && $row['FREE_KICK_ACCURACY'] === 91 || $row['FREE_KICK_ACCURACY'] === 92 || $row['FREE_KICK_ACCURACY'] === 93 || $row['FREE_KICK_ACCURACY'] === 94 || $row['FREE_KICK_ACCURACY'] === 95) {
                // Modify the value to x in the fetched row
                $row['FREE_KICK_ACCURACY'] = $row['FREE_KICK_ACCURACY'] - 3;
            } else if (isset($row['FREE_KICK_ACCURACY']) && $row['FREE_KICK_ACCURACY'] === 96 || $row['FREE_KICK_ACCURACY'] === 97 || $row['FREE_KICK_ACCURACY'] === 98 || $row['FREE_KICK_ACCURACY'] === 99) {
                // Modify the value to x in the fetched row
                $row['FREE_KICK_ACCURACY'] = $row['FREE_KICK_ACCURACY'] - 4;
            }

            // Check if the "SWERVE" column exists and is lesser than 40
            if (isset($row['SWERVE']) && $row['SWERVE'] < 40) {
                // Modify the value to x in the fetched row
                $row['SWERVE'] = 40;
            // Check if the "SWERVE" column exists and is equal to x
            } else if (isset($row['SWERVE']) && $row['SWERVE'] === 81 || $row['SWERVE'] === 82 || $row['SWERVE'] === 83 || $row['SWERVE'] === 84 || $row['SWERVE'] === 85) {
                // Modify the value to x in the fetched row
                $row['SWERVE'] = $row['SWERVE'] - 1;
            } else if (isset($row['SWERVE']) && $row['SWERVE'] === 86 || $row['SWERVE'] === 87 || $row['SWERVE'] === 88 || $row['SWERVE'] === 89 || $row['SWERVE'] === 90) {
                // Modify the value to x in the fetched row
                $row['SWERVE'] = $row['SWERVE'] - 2;
            } else if (isset($row['SWERVE']) && $row['SWERVE'] === 91 || $row['SWERVE'] === 92 || $row['SWERVE'] === 93 || $row['SWERVE'] === 94 || $row['SWERVE'] === 95) {
                // Modify the value to x in the fetched row
                $row['SWERVE'] = $row['SWERVE'] - 3;
            } else if (isset($row['SWERVE']) && $row['SWERVE'] === 96 || $row['SWERVE'] === 97 || $row['SWERVE'] === 98 || $row['SWERVE'] === 99) {
                // Modify the value to x in the fetched row
                $row['SWERVE'] = $row['SWERVE'] - 4;
            }

            // Check if the "TOP_SPEED" column exists and is lesser than 40
            if (isset($row['TOP_SPEED']) && $row['TOP_SPEED'] < 40) {
                // Modify the value to x in the fetched row
                $row['TOP_SPEED'] = 40;
            // Check if the "TOP_SPEED" column exists and is equal to x
            } else if (isset($row['TOP_SPEED']) && $row['TOP_SPEED'] === 81 || $row['TOP_SPEED'] === 82 || $row['TOP_SPEED'] === 83 || $row['TOP_SPEED'] === 84 || $row['TOP_SPEED'] === 85) {
                // Modify the value to x in the fetched row
                $row['TOP_SPEED'] = $row['TOP_SPEED'] - 1;
            } else if (isset($row['TOP_SPEED']) && $row['TOP_SPEED'] === 86 || $row['TOP_SPEED'] === 87 || $row['TOP_SPEED'] === 88 || $row['TOP_SPEED'] === 89 || $row['TOP_SPEED'] === 90) {
                // Modify the value to x in the fetched row
                $row['TOP_SPEED'] = $row['TOP_SPEED'] - 2;
            } else if (isset($row['TOP_SPEED']) && $row['TOP_SPEED'] === 91 || $row['TOP_SPEED'] === 92 || $row['TOP_SPEED'] === 93 || $row['TOP_SPEED'] === 94 || $row['TOP_SPEED'] === 95) {
                // Modify the value to x in the fetched row
                $row['TOP_SPEED'] = $row['TOP_SPEED'] - 3;
            } else if (isset($row['TOP_SPEED']) && $row['TOP_SPEED'] === 96 || $row['TOP_SPEED'] === 97 || $row['TOP_SPEED'] === 98 || $row['TOP_SPEED'] === 99) {
                // Modify the value to x in the fetched row
                $row['TOP_SPEED'] = $row['TOP_SPEED'] - 4;
            }

            // Check if the "ACCELERATION" column exists and is lesser than 40
            if (isset($row['ACCELERATION']) && $row['ACCELERATION'] < 40) {
                // Modify the value to x in the fetched row
                $row['ACCELERATION'] = 40;
            // Check if the "ACCELERATION" column exists and is equal to x
            } else if (isset($row['ACCELERATION']) && $row['ACCELERATION'] === 81 || $row['ACCELERATION'] === 82 || $row['ACCELERATION'] === 83 || $row['ACCELERATION'] === 84 || $row['ACCELERATION'] === 85) {
                // Modify the value to x in the fetched row
                $row['ACCELERATION'] = $row['ACCELERATION'] - 1;
            } else if (isset($row['ACCELERATION']) && $row['ACCELERATION'] === 86 || $row['ACCELERATION'] === 87 || $row['ACCELERATION'] === 88 || $row['ACCELERATION'] === 89 || $row['ACCELERATION'] === 90) {
                // Modify the value to x in the fetched row
                $row['ACCELERATION'] = $row['ACCELERATION'] - 2;
            } else if (isset($row['ACCELERATION']) && $row['ACCELERATION'] === 91 || $row['ACCELERATION'] === 92 || $row['ACCELERATION'] === 93 || $row['ACCELERATION'] === 94 || $row['ACCELERATION'] === 95) {
                // Modify the value to x in the fetched row
                $row['ACCELERATION'] = $row['ACCELERATION'] - 3;
            } else if (isset($row['ACCELERATION']) && $row['ACCELERATION'] === 96 || $row['ACCELERATION'] === 97 || $row['ACCELERATION'] === 98 || $row['ACCELERATION'] === 99) {
                // Modify the value to x in the fetched row
                $row['ACCELERATION'] = $row['ACCELERATION'] - 4;
            }

            // Check if the "SHOT_POWER" column exists and is lesser than 40
            if (isset($row['SHOT_POWER']) && $row['SHOT_POWER'] < 40) {
                // Modify the value to x in the fetched row
                $row['SHOT_POWER'] = 40;
            // Check if the "SHOT_POWER" column exists and is equal to x
            } else if (isset($row['SHOT_POWER']) && $row['SHOT_POWER'] === 81 || $row['SHOT_POWER'] === 82 || $row['SHOT_POWER'] === 83 || $row['SHOT_POWER'] === 84 || $row['SHOT_POWER'] === 85) {
                // Modify the value to x in the fetched row
                $row['SHOT_POWER'] = $row['SHOT_POWER'] - 1;
            } else if (isset($row['SHOT_POWER']) && $row['SHOT_POWER'] === 86 || $row['SHOT_POWER'] === 87 || $row['SHOT_POWER'] === 88 || $row['SHOT_POWER'] === 89 || $row['SHOT_POWER'] === 90) {
                // Modify the value to x in the fetched row
                $row['SHOT_POWER'] = $row['SHOT_POWER'] - 2;
            } else if (isset($row['SHOT_POWER']) && $row['SHOT_POWER'] === 91 || $row['SHOT_POWER'] === 92 || $row['SHOT_POWER'] === 93 || $row['SHOT_POWER'] === 94 || $row['SHOT_POWER'] === 95) {
                // Modify the value to x in the fetched row
                $row['SHOT_POWER'] = $row['SHOT_POWER'] - 3;
            } else if (isset($row['SHOT_POWER']) && $row['SHOT_POWER'] === 96 || $row['SHOT_POWER'] === 97 || $row['SHOT_POWER'] === 98 || $row['SHOT_POWER'] === 99) {
                // Modify the value to x in the fetched row
                $row['SHOT_POWER'] = $row['SHOT_POWER'] - 4;
            }

            // Check if the "JUMP" column exists and is lesser than 40
            if (isset($row['JUMP']) && $row['JUMP'] < 40) {
                // Modify the value to x in the fetched row
                $row['JUMP'] = 40;
            // Check if the "JUMP" column exists and is equal to x
            } else if (isset($row['JUMP']) && $row['JUMP'] === 81 || $row['JUMP'] === 82 || $row['JUMP'] === 83 || $row['JUMP'] === 84 || $row['JUMP'] === 85) {
                // Modify the value to x in the fetched row
                $row['JUMP'] = $row['JUMP'] - 1;
            } else if (isset($row['JUMP']) && $row['JUMP'] === 86 || $row['JUMP'] === 87 || $row['JUMP'] === 88 || $row['JUMP'] === 89 || $row['JUMP'] === 90) {
                // Modify the value to x in the fetched row
                $row['JUMP'] = $row['JUMP'] - 2;
            } else if (isset($row['JUMP']) && $row['JUMP'] === 91 || $row['JUMP'] === 92 || $row['JUMP'] === 93 || $row['JUMP'] === 94 || $row['JUMP'] === 95) {
                // Modify the value to x in the fetched row
                $row['JUMP'] = $row['JUMP'] - 3;
            } else if (isset($row['JUMP']) && $row['JUMP'] === 96 || $row['JUMP'] === 97 || $row['JUMP'] === 98 || $row['JUMP'] === 99) {
                // Modify the value to x in the fetched row
                $row['JUMP'] = $row['JUMP'] - 4;
            }

            // Check if the "STAMINA" column exists and is lesser than 40
            if (isset($row['STAMINA']) && $row['STAMINA'] < 40) {
                // Modify the value to x in the fetched row
                $row['STAMINA'] = 40;
            // Check if the "STAMINA" column exists and is equal to x
            } else if (isset($row['STAMINA']) && $row['STAMINA'] === 81 || $row['STAMINA'] === 82 || $row['STAMINA'] === 83 || $row['STAMINA'] === 84 || $row['STAMINA'] === 85) {
                // Modify the value to x in the fetched row
                $row['STAMINA'] = $row['STAMINA'] - 1;
            } else if (isset($row['STAMINA']) && $row['STAMINA'] === 86 || $row['STAMINA'] === 87 || $row['STAMINA'] === 88 || $row['STAMINA'] === 89 || $row['STAMINA'] === 90) {
                // Modify the value to x in the fetched row
                $row['STAMINA'] = $row['STAMINA'] - 2;
            } else if (isset($row['STAMINA']) && $row['STAMINA'] === 91 || $row['STAMINA'] === 92 || $row['STAMINA'] === 93 || $row['STAMINA'] === 94 || $row['STAMINA'] === 95) {
                // Modify the value to x in the fetched row
                $row['STAMINA'] = $row['STAMINA'] - 3;
            } else if (isset($row['STAMINA']) && $row['STAMINA'] === 96 || $row['STAMINA'] === 97 || $row['STAMINA'] === 98 || $row['STAMINA'] === 99) {
                // Modify the value to x in the fetched row
                $row['STAMINA'] = $row['STAMINA'] - 4;
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