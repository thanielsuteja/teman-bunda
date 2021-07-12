<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caretaker;
use App\Models\User;

class Notification extends Model
{
    use HasFactory;

    public function Caretaker() {
        return $this->belongsTo(Caretaker::class);
    }
    public function User() {
        return $this->belongsTo(User::class);
    }

    protected $table = "Notifications";

    protected $primaryKey = 'notification_id';
}
