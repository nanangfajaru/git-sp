<?php

namespace Modules\Serikatpekerja\Entities;

use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{

    public $timestamps = false;
    
    protected $table = 'tr_history_status';

    protected $guarded = [
        'id'
    ];
}
