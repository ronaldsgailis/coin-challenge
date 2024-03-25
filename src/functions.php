<?php

function getCoinBalances(array $arr1, array $arr2): array
{
    $countShares = static fn($actions) => count(array_filter($actions, static fn($item) => $item === 'share'));
    $firstPlayerShares = $countShares($arr1);
    $secondPlayerShares = $countShares($arr2);

    return [
        3 - $firstPlayerShares + 3 * $secondPlayerShares,
        3 - $secondPlayerShares + 3 * $firstPlayerShares
    ];
}