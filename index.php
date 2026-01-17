<?php
if ($argc < 2) {
    fwrite(STDERR, "usage: php index.php <path> [--top N]\n");
    exit(1);
}
$top = 10;
$path = null;
for ($i = 1; $i < $argc; $i++) {
    if ($argv[$i] === "--top" && $i + 1 < $argc) {
        $top = intval($argv[++$i]);
    } elseif ($path === null) {
        $path = $argv[$i];
    }
}
$text = file_get_contents($path);
$lines = $text === "" ? 0 : substr_count($text, "\n") + 1;
preg_match_all('/[A-Za-z0-9]+/', strtolower($text), $matches);
$words = $matches[0];
$counts = [];
foreach ($words as $w) {
    $counts[$w] = ($counts[$w] ?? 0) + 1;
}
uksort($counts, function($a, $b) use ($counts) {
    if ($counts[$a] === $counts[$b]) {
        return strcmp($a, $b);
    }
    return $counts[$b] <=> $counts[$a];
});

echo "lines: $lines\n";
echo "words: " . count($words) . "\n";
echo "chars: " . strlen($text) . "\n";
echo "top words:\n";
$i = 0;
foreach ($counts as $word => $count) {
    echo "  $word: $count\n";
    $i++;
    if ($i >= $top) break;
}
