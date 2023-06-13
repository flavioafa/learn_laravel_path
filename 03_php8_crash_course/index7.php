<?php

//str_starts_with
$id = 'inv_slakdjlsakdjlskad';
$result = str_starts_with($id, 'inv_');
echo $result;

//str_ends_with
$id = 'slakdjlsakdjlskad_inv';
$result = str_ends_with($id, '_inv');
echo $result;

//str_contains
$id = 'https://example.com?foo=bar';
$result = str_contains($id, '?');
echo $result;