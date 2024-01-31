<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $allowedFields = [
        'konsultasi_id', 'konsultasi_user', 'kepuasan', 'kemudahan', 'feedback'
    ];
}
