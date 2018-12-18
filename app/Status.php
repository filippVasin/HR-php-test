<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const STATUS_NEW = 0;
    const STATUS_CONFIRMED = 10;
    const STATUS_COMPLETED = 20;
    const STATUS_NOT_KNOWN = 1;

    public static function getInt($str)
    {
        switch ($str) {
            case 'Новый':
                return self::STATUS_NEW;
                break;
            case 'Подтвержден':
                return self::STATUS_CONFIRMED;
                break;
            case 'Завершен':
                return self::STATUS_COMPLETED;
                break;
            default:
                return self::STATUS_NOT_KNOWN;
        }
    }

    public static function getStr($int)
    {
        switch ($int) {
            case self::STATUS_NEW:
                return 'Новый';
                break;
            case self::STATUS_CONFIRMED:
                return 'Подтвержден';
                break;
            case self::STATUS_COMPLETED:
                return 'Завершен';
                break;
            default:
                return 'not known';
        }
    }

    public static function selectList()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_CONFIRMED => 'Подтвержден',
            self::STATUS_COMPLETED => 'Завершен',
        ];
    }
}
