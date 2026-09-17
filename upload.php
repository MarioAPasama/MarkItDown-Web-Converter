<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}

if (!isset($_FILES['file'])) {
    echo json_encode(['error' => 'No file uploaded']);
    exit;
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['error' => 'File upload error code: ' . $file['error']]);
    exit;
}

// Create a temporary file path
$tempDir = sys_get_temp_dir();
$tempPath = $tempDir . DIRECTORY_SEPARATOR . basename($file['name']);

if (!move_uploaded_file($file['tmp_name'], $tempPath)) {
    echo json_encode(['error' => 'Failed to save uploaded file']);
    exit;
}

// Execute python script
$pythonScript = __DIR__ . DIRECTORY_SEPARATOR . 'convert.py';
// Explicit path to python might be needed if python is not in PATH for the webserver,
// but we'll try 'python' first. If this fails, we will need the full path to python.exe.
$command = "python " . escapeshellarg($pythonScript) . " " . escapeshellarg($tempPath) . " 2>&1";

$output = shell_exec($command);

// Clean up temporary file
if (file_exists($tempPath)) {
    unlink($tempPath);
}

// Check if there was an output
if ($output === null) {
    echo json_encode(['error' => 'Python script failed to execute. Ensure Python is in your PATH.']);
    exit;
}

// Return result
echo json_encode(['markdown' => $output]);
?>
