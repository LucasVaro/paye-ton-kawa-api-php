<?php
$files = glob(__DIR__ . '/{Controller,Model}/*.php', GLOB_BRACE);
if ($files === false) {
    throw new RuntimeException("Failed to glob for function files");
}
foreach ($files as $file) {
    require_once $file;
}
unset($file);
unset($files);