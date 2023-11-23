<?php

namespace App\Enums;

enum BookStatus: string
{
    case Published = 'published';
    case Draft = 'draft';
}
