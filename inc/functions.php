<?php

declare(strict_types=1);

function url(string $path = '/'): string
{
  $path = '/' . ltrim($path, '/');
  return rtrim(BASE_URL, '/') . $path;
}
