<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    public function score()
    {
        $score = User::join('user_activities', 'users.id', '=', 'user_activities.user_id')
            ->join('activities', 'activities.id', '=', 'user_activities.activity_id')
            ->select(DB::raw('SUM(points) AS total'))->where('users.anonymousID', $this->anonymousID)->where('finished', 1)
            ->groupBy('users.anonymousID')->orderBy('total', 'desc')->limit(10)->get()
            ->map(function ($result) {
                return $result->total;
            })->first();

        return $score;
    }

    public function newActivities()
    {
        define('NB_ACTIVITIES', 5);
        // Nombre d'activités disponibles
        $currentActivities = count($this->activities()->get());

        // Si nombre d'activités finies n'est pas un multiple de 5
        $finishedActivities = count($this->activities()->where('finished', 1)->get());
        if ($currentActivities !== $finishedActivities) {
            return null;
        }

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
        return $this->belongsToMany(Activity::class, 'user_activities')->withTimestamps();
    }
}
