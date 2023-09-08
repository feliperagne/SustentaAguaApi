<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Estado extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'num_habitante'
    ];





}
