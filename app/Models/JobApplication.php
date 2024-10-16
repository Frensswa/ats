<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'applicantID',
        'jobOpeningID'
    ];

    /**
     * @return BelongsTo<Applicant>
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class, 'applicantID');
    }

    /**
     * @return BelongsTo<JobOpening>
     */
    public function jobOpening(): BelongsTo
    {
        return $this->belongsTo(JobOpening::class, 'jobOpeningID');
    }
}
