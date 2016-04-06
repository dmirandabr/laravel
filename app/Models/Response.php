<?php

namespace Poc\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $table = 'reviews_responses';
    public $timestamps = false;
    protected $fillable = [
        'ReviewId',
        'Response',
        'Name',
        'Department',
        'SubmissionTime'
    ];

    public function review()
    {
        return $this->belongsTo('Poc\Models\Review', 'Id', 'ReviewId');
    }

}
