<?php
namespace App\Enums;

enum CustomerStatus: string
{
    case NEW = 'new';
    case VERIFIED = 'verified';
    case SUSPENDED = 'suspended';
    case DELETED = 'deleted';

    public function getLabel(): string
    {
        return match($this) {
            self::NEW => 'New',
            self::VERIFIED => 'Verified',
            self::SUSPENDED => 'Suspended',
            self::DELETED => 'Deleted',
        };
    }
}
