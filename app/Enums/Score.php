<?php

namespace App\Enums;

enum Score: string
{
    case Lose = 'X';
    case Draw = 'Y';
    case Win = 'Z';
}
