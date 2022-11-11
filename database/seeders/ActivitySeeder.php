<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Activités cartes Culture
        $culture = Category::where('name', 'Culture')->first();

        Activity::factory()->createMany([[
            'name' => 'Lean Talk',
            'description' => 'Participez à un des workshops proprosés sur differents thèmes',
            'why' => 'C’est un espace d’échange sur différentes sujets où les élèves peuvent
                        partager leur connaissance et expériences.',
            'points' => 8,
            'laboratory' => 'INF',
            'category_id' => $culture->id
        ], [
            'name' => 'Positif Feedback',
            'description' => 'Donnez un feedback positif sur un projet, une equipe, un élève, ou un
                                autre sujet durant votre visite.',
            'why' => 'C\'est un outil extrêmement important pour aider à l\’amélioration de
                        chacun.\n Soyez spécifique, essayez de faire un lien positif avec un comportement
                        et un résultat.',
            'points' => 3,
            'laboratory' => 'INF',
            'category_id' => $culture->id
        ], [
            'name' => 'Conference',
            'description' => 'Suivez la conférence de la section informatique.\n
                                Les horaires:',
            'why' => 'Elle permet de comprendre le cursus du métier, répondre à des
                        questions et avoir une idée plus claire des options que s\'offrent à vous.',
            'points' => 10,
            'laboratory' => 'INF',
            'category_id' => $culture->id
        ]]);

        // Activités cartes Challenge
        $challenge = Category::where('name', 'Challenge')->first();

        Activity::factory()->createMany([[
            'name' => 'Foreign Language',
            'description' => 'Si vous parlez une autre langue que le français, trouvez un élève qui
                                parle la même langue, et discutez avec lui sur un sujet de l\'informatique',
            'why' => 'Etablir des liens / amitiés interculturelles.\n Donner un coup de boost à notre cerveau',
            'points' => 3,
            'laboratory' => 'INF',
            'category_id' => $challenge->id
        ], [
            'name' => 'Prendre un selfie',
            'description' => 'Prenez une photo originale sur un projet, avec des élèves ou les profs,
                                soyez créatif! Publiez votre photo sur….',
            'why' => 'Pour garder un souvenir de votre passage au Portes Ouvertes',
            'points' => 5,
            'laboratory' => 'INF',
            'category_id' => $challenge->id
        ], [
            'name' => 'Tech Radar',
            'description' => 'Testez vos connaissances sur les outils et le monde digital. Créez votre
                                radar des compétences informatiques!',
            'why' => 'Avoir une vision globale sur nos connaissances permet d\'identifier nos
                        forces et compétences.',
            'points' => 10,
            'laboratory' => 'INF',
            'category_id' => $challenge->id
        ]]);

        // Activités cartes Proj-Inno
        $projinno = Category::where('name', 'Proj-inno')->first();

        Activity::factory()->createMany([[
            'name' => 'Product Review',
            'description' => 'Visitez un labo, posez une question à un des élèves. Essayez de
                                challenger sa réponse, approfondissez le sujet, donnez votre opinion',
            'why' => 'N\'ayez jamais peur de poser des questions. Donnez votre avis!',
            'points' => 7,
            'laboratory' => 'INF',
            'category_id' => $projinno->id
        ], [
            'name' => 'Source Control',
            'description' => 'Apprenez à utiliser GiTHub pour comparer des fichiers, faire un pull
                                request, merge, etc..',
            'why' => 'Les systèmes de contrôle de version vous permettent de :
                        • Comparer des fichiers
                        • Identifier les différences
                        • Fusionnez les modifications si nécessaire avant de valider un code
                        • Gardez une trace des versions d\'application en étant capable
                        d\'identifier quelle version est actuellement en développement, QA et
                        production',
            'points' => 5,
            'laboratory' => 'INF',
            'category_id' => $projinno->id
        ], [
            'name' => 'Retrospective',
            'description' => 'Identifiez les actions et améliorations sur un projet exposé.',
            'why' => 'Nous voulons toujours nous améliorer, il est donc très important de
                        pouvoir engager cette discussion.',
            'points' => 9,
            'laboratory' => 'INF',
            'category_id' => $projinno->id
        ], [
            'name' => 'Agilite - User Story',
            'description' => 'Avec l\'aide d\'un élève, apprenez à écrire une User Story',
            'why' => 'L\'importance de comprendre et bien définir les besoins du client',
            'points' => 5,
            'laboratory' => 'INF',
            'category_id' => $projinno->id
        ], [
            'name' => 'Serious Game',
            'description' => 'Participez à un jeu sur l\'agilité et décrouvrez cette methode de gestion
                                de projet',
            'why' => 'A définir selon le jeu choisi',
            'points' => 10,
            'laboratory' => 'INF',
            'category_id' => $projinno->id
        ]]);

        // Activités cartes Prog-Devops
        $prog = Category::where('name', 'Prog-Devops')->first();

        Activity::factory()->createMany([[
            'name' => 'TDD - Test Driven Developpement',
            'description' => 'A partir d\'une fonctionnalité, pensez à écrire comment elle pourrait être
                                testé et ensuite essayez de l\'implémenter.',
            'why' => 'Pour implémenter une fonctionnalité, on se concentre sur sa valeur.',
            'points' => 8,
            'laboratory' => 'INF',
            'category_id' => $prog->id
        ], [
            'name' => 'Clean Code',
            'description' => 'Avec l\'aide d\'un élève, écrivez une partie de code et testez votre
                                fonctionnalité.',
            'why' => 'Un code propre est un code facile à comprendre et facile à modifier.\n
                        Facile à comprendre signifie que le code est facile à lire, qu\'il s\'agisse
                        d’un lecteur est l\'auteur original du code ou quelqu\'un d\'autre.',
            'points' => 5,
            'laboratory' => 'INF',
            'category_id' => $prog->id
        ]]);
    }
}
