<?php

namespace App\Models;

use App\Notifications\NadaConstaSolicitado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Biblioteca extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['nome'];

    /**
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail($notification)
    {
        $bibliotecaEmails = $this->emails->pluck('email')->toArray();
        array_push($bibliotecaEmails, $this->email);

        if ($notification instanceof NadaConstaSolicitado && $this->email_nada_consta != null) {
            $emails[] = $this->email_nada_consta;
        }
        
        return $emails;
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
