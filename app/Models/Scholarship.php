<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'logo',
        'open_registration',
        'deadline',
        'description',
    ];

    // Relasi many-to-many dengan tabel users
    public function users()
    {
        return $this->belongsToMany(User::class, 'scholarship_user');
    }
}