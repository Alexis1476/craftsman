<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Visitor extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'anonymousID',
        'firstName',
        'lastName',
        'phoneNumber',
        'email',
        'password'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function newActivities()
    {
        define('NB_ACTIVITIES', 5);

        // Si nombre d'activités finies n'est pas un multiple de 5
        $finishedActivities = count($this->activities()->where('finished', 1)->get());
        if ($finishedActivities % NB_ACTIVITIES != 0)
            return null;

        // Visiteur qui fini l'activité
        $visitorActivities = $this->activities->pluck('id'); // Pluck: Get seule les ids

        // Activités que le visiteur n'a pas encore fait
        $activities = Activity::whereNotIn('id', $visitorActivities)->select()->get()->pluck('id')->toArray();

        // Si le visiteur a déjà fait toutes les activités
        if (!$activities)
            return null;

        // Nombre d'activités maximales
        $nbMaxNewActivities = NB_ACTIVITIES;
        if (count($activities) < NB_ACTIVITIES)
            $nbMaxNewActivities = count($activities);

        // Selection de 5 activités random
        $keyActivities = array_rand($activities, $nbMaxNewActivities);

        // Enregistrement dans la base de données
        foreach ($keyActivities as $key) {
            $this->activities()->attach($activities[$key]);
        }

        return $this->activities;
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'visitor_activities')->withTimestamps();
    }
}
