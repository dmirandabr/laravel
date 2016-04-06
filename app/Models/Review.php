<?php

namespace Poc\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';
    public $timestamps = false;
    protected $fillable = [
        'Id',
        'SubmissionId',
        'ProductId',
        'Title',
        'ReviewText',
        'Rating',
        'UserNickname',
        'UserLocation',
        'SubmissionTime',
        'Professionalism',
        'Knowledge',
        'Responsiveness',
        'LevelOfService',
        'RatesHonored',
        'IsRecommended',
        'ClientResponses',
        'ModerationStatus',
        'LastModificationTime',
        'IsRatingsOnly',
        'TotalCommentCount',
        'CampaignId',
        'RatingRange',
        'TotalFeedbackCount',
        'TotalPositiveFeedbackCount',
        'TotalNegativeFeedbackCount',
        'ContentLocale',
        'IsFeatured',
        'LastModeratedTime',
        'AuthorId',
        'IsSyndicated',
        'AdvertiserId',
        'AdvertiserName',
        'UserEmail',
        'UserIP',
        'Notes'
    ];

    public function responses()
    {
        return $this->hasMany('Poc\Models\Response', 'ReviewId', 'Id');
    }

}
