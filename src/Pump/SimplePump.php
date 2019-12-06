<?php
declare(strict_types=1);

namespace I3or1s\Pump;

final class SimplePump
{
    public function __invoke($input)
    {
        return $input;
    }
}