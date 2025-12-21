<?php
function sanitize($data) {
    return htmlspecialchars(trim($data));
}

function grade($score) {
    if ($score >= 80) return "A";
    elseif ($score >= 60) return "B";
    else return "C";
}