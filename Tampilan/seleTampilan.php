<?php
// Data deskripsi dari database
$deskripsi = "Ini adalah contoh deskripsi dengan link: https://youtu.be/L9Vdt46tthY";

// Regex pattern untuk menemukan link dalam deskripsi
$pattern = '/\b(?:https?:\/\/|www\.)\S+\b/';

// Fungsi preg_replace untuk mengganti link dengan tag <a href>
$deskripsi_dengan_link = preg_replace($pattern, '<a href="https://youtu.be/L9Vdt46tthY" target="_blank">$0</a>', $deskripsi);

// Output hasil deskripsi yang telah dibungkus dengan tag <a href>
echo $deskripsi_dengan_link;
?>
