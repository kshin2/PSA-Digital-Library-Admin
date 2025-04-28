<?php
include('db_connect.php');

// Count student records
$recordQuery = "SELECT COUNT(*) AS total_records FROM records";
$recordResult = $conn->query($recordQuery);
$totalRecords = ($recordResult && $recordResult->num_rows > 0) ? $recordResult->fetch_assoc()['total_records'] : 0;

// Count infographics
$infographicQuery = "SELECT COUNT(*) AS total_infographics FROM infographics";
$infographicResult = $conn->query($infographicQuery);
$totalInfographics = ($infographicResult && $infographicResult->num_rows > 0) ? $infographicResult->fetch_assoc()['total_infographics'] : 0;

// Count special releases
$specialQuery = "SELECT COUNT(*) AS total_special FROM special_releases";
$specialResult = $conn->query($specialQuery);
$totalSpecial = ($specialResult && $specialResult->num_rows > 0) ? $specialResult->fetch_assoc()['total_special'] : 0;

// Count women and men
$wamQuery = "SELECT COUNT(*) AS total_wam FROM wam";
$wamResult = $conn->query($wamQuery);
$totalWam = ($wamResult && $wamResult->num_rows > 0) ? $wamResult->fetch_assoc()['total_wam'] : 0;

// Count country in figures
$cifQuery = "SELECT COUNT(*) AS total_cif FROM cif";
$cifResult = $conn->query($cifQuery);
$totalCif = ($cifResult && $cifResult->num_rows > 0) ? $cifResult->fetch_assoc()['total_cif'] : 0;

// Count public used files
$pufQuery = "SELECT COUNT(*) AS total_puf FROM puf";
$pufResult = $conn->query($pufQuery);
$totalPuf = ($pufResult && $pufResult->num_rows > 0) ? $pufResult->fetch_assoc()['total_puf'] : 0;

// Total resources = infographics + special releases + wam
$totalResources = $totalInfographics + $totalSpecial + $totalWam + $totalCif + $totalPuf;

$conn->close();

// Return as JSON
header('Content-Type: application/json');
echo json_encode([
  'total_records' => $totalRecords,
  'total_resources' => $totalResources
]);
