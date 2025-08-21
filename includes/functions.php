
<?php
function sanitize(string $s): string { return htmlspecialchars(trim($s), ENT_QUOTES, 'UTF-8'); }
function excerpt(string $text, int $len = 140): string { $t = trim(strip_tags($text)); return mb_strlen($t) <= $len ? $t : mb_substr($t, 0, $len) . '...'; }
function moneyIDR(int $n): string { return 'Rp' . number_format($n, 0, ',', '.'); }
