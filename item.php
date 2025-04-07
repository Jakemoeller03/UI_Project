<?php

if (!isset($_GET['id'])) {
	die("Item not found.");
}

$itemId = $_GET['id'];

$minerals = json_decode(file_get_contents('minerals.json'), true);
$item = null;

foreach ($minerals as $mineral) {
	if ($mineral['id'] === $itemId) {
		$item = $mineral;
		break;
	}
}

if (!$item) {
	die("Item not found.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo htmlspecialchars($item['title']); ?> Details</title>
	
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-100 p-6">
	<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
		<h1 class="text-3xl font-bold mb-4"><?php echo htmlspecialchars($item['title']); ?></h1>
		<div class="sketchfab-embed-wrapper mb-4">
			<iframe title="<?php echo htmlspecialchars($item['title']); ?>"
				frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true"
				allow="autoplay; fullscreen; xr-spatial-tracking"
				src="<?php echo htmlspecialchars($item['sketchfabUrl']); ?>">
			</iframe>
		</div>
		<p class="text-gray-600"><?php echo htmlspecialchars($item['description']); ?></p>
		<p class="text-xl font-bold mt-4">$<?php echo number_format($item['price'], 2); ?></p>
		<a href="index.php" class="text-blue-500 mt-4 inline-block">Back</a>
	</div>
</body>
</html>
