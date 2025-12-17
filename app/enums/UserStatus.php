<?php

namespace App\enums;

enum UserStatus: string
{
    case Active = 'active';
    case InActive = 'in_active';
    case Banned = 'banned';
}
