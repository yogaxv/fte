<?php

namespace App\Enums;

enum StatusPekerjaan: int
{
    case OPEN = 1;
    case SURVEY = 2;
    case FOC = 3;
    case TRACING = 4;
    case JOINTING = 5;
    case FOT = 6;
    case CLOSED = 7;
    case NEEDCEK = 8;

    public function description(): string
    {
        return match ($this) {
            self::OPEN => 'open',
            self::SURVEY => 'survey',
            self::FOC => 'foc',
            self::TRACING => 'tracing',
            self::JOINTING => 'jointing',
            self::FOT => 'fot',
            self::CLOSED => 'closed',
            self::NEEDCEK => 'needcek(6-11-22)',
        };
    }

    public static function toSelectOptions(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->description(),
        ], self::cases());
    }
}
